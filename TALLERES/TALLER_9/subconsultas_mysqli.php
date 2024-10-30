<?php
require_once "config_mysqli.php";

$sql = "SELECT p.nombre, p.precio
        FROM productos p
        LEFT JOIN detalles_venta dv ON p.id = dv.producto_id
        WHERE dv.producto_id IS NULL";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<h3>Productos que nunca se han vendido:</h3>";
    mysqli_free_result($result);
}

$sql = "SELECT c.nombre AS categoria, COUNT(p.id) AS num_productos, SUM(p.precio * p.stock) AS valor_inventario
        FROM categorias c
        LEFT JOIN productos p ON c.id = p.categoria_id
        GROUP BY c.id";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<h3>Categorías con el número de productos y el valor total del inventario:</h3>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Categoría: {$row['categoria']}, Número de Productos: {$row['num_productos']}, ";
    }
    mysqli_free_result($result);
}

$categoria_id = 1;
$sql = "SELECT c.nombre, c.email
        FROM clientes c
        WHERE NOT EXISTS (
            SELECT 1
            FROM productos p
            WHERE p.categoria_id = $categoria_id
            AND p.id NOT IN (
                SELECT dv.producto_id
                FROM ventas v
                JOIN detalles_venta dv ON v.id = dv.venta_id
                WHERE v.cliente_id = c.id
            )
        )";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<h3>Clientes que han comprado todos los productos de la categoría ID $categoria_id:</h3>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Cliente: {$row['nombre']}, Email: {$row['email']}<br>";
    }
    mysqli_free_result($result);
}

$sql = "SELECT p.nombre, 
               (SUM(dv.cantidad * dv.precio_unitario) / (SELECT SUM(cantidad * precio_unitario) FROM detalles_venta) * 100) AS porcentaje_ventas
        FROM productos p
        JOIN detalles_venta dv ON p.id = dv.producto_id
        GROUP BY p.id";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<h3>Porcentaje de ventas de cada producto respecto al total de ventas:</h3>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Producto: {$row['nombre']}, Porcentaje de Ventas: {$row['porcentaje_ventas']}%<br>";
    }
    mysqli_free_result($result);
}

mysqli_close($conn);
?>
