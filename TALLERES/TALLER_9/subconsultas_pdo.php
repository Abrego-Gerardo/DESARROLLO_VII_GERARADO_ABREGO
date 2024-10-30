<?php
require_once "config_pdo.php";

try {
    // 1. Productos que nunca se han vendido
    $sql = "SELECT p.nombre, p.precio
            FROM productos p
            LEFT JOIN detalles_venta dv ON p.id = dv.producto_id
            WHERE dv.producto_id IS NULL";

    $stmt = $pdo->query($sql);
    echo "<h3>Productos que nunca se han vendido:</h3>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "Producto: {$row['nombre']}, Precio: ${$row['precio']}<br>";
    }

    // 2. Categorías con el número de productos y el valor total del inventario
    $sql = "SELECT c.nombre AS categoria, COUNT(p.id) AS num_productos, SUM(p.precio * p.stock) AS valor_inventario
            FROM categorias c
            LEFT JOIN productos p ON c.id = p.categoria_id
            GROUP BY c.id";

    $stmt = $pdo->query($sql);
    echo "<h3>Categorías con el número de productos y el valor total del inventario:</h3>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "Categoría: {$row['categoria']}, Número de Productos: {$row['num_productos']}, ";
        echo "Valor Total del Inventario: ${$row['valor_inventario']}<br>";
    }

    // 3. Clientes que han comprado todos los productos de una categoría específica
    $categoria_id = 1; // Cambiar según la categoría deseada
    $sql = "SELECT c.nombre, c.email
            FROM clientes c
            WHERE NOT EXISTS (
                SELECT 1
                FROM productos p
                WHERE p.categoria_id = :categoria_id
                AND p.id NOT IN (
                    SELECT dv.producto_id
                    FROM ventas v
                    JOIN detalles_venta dv ON v.id = dv.venta_id
                    WHERE v.cliente_id = c.id
                )
            )";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['categoria_id' => $categoria_id]);
    echo "<h3>Clientes que han comprado todos los productos de la categoría ID $categoria_id:</h3>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "Cliente: {$row['nombre']}, Email: {$row['email']}<br>";
    }

    // 4. Porcentaje de ventas de cada producto respecto al total de ventas
    $sql = "SELECT p.nombre, 
                   (SUM(dv.cantidad * dv.precio_unitario) / (SELECT SUM(cantidad * precio_unitario) FROM detalles_venta) * 100) AS porcentaje_ventas
            FROM productos p
            JOIN detalles_venta dv ON p.id = dv.producto_id
            GROUP BY p.id";

    $stmt = $pdo->query($sql);
    echo "<h3>Porcentaje de ventas de cada producto respecto al total de ventas:</h3>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "Producto: {$row['nombre']}, Porcentaje de Ventas: {$row['porcentaje_ventas']}%<br>";
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>
