<?php
require_once "config_mysqli.php";

function mostrarProductosBajoStock($conn) {
    $sql = "SELECT * FROM vista_productos_bajo_stock";
    $result = mysqli_query($conn, $sql);

    echo "<h3>Productos con Bajo Stock:</h3>";
    echo "<table border='1'>";
    echo "<tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Stock</th>
            <th>Total Vendido</th>
            <th>Ingresos Totales</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['nombre']}</td>";
        echo "<td>{$row['stock']}</td>";
        echo "<td>{$row['total_vendido']}</td>";
        echo "<td>{$row['ingresos_totales']}</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
}

function mostrarHistorialClientes($conn) {
    $sql = "SELECT * FROM vista_historial_clientes";
    $result = mysqli_query($conn, $sql);

    echo "<h3>Historial Completo de Clientes:</h3>";
    echo "<table border='1'>";
    echo "<tr>
            <th>Cliente</th>
            <th>Email</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Subtotal</th>
            <th>Fecha de Venta</th>
            <th>Estado</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['cliente']}</td>";
        echo "<td>{$row['cliente_email']}</td>";
        echo "<td>{$row['producto']}</td>";
        echo "<td>{$row['cantidad']}</td>";
        echo "<td>\${$row['precio_unitario']}</td>";
        echo "<td>\${$row['subtotal']}</td>";
        echo "<td>{$row['fecha_venta']}</td>";
        echo "<td>{$row['estado']}</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
}

function mostrarRendimientoCategorias($conn) {
    $sql = "SELECT * FROM vista_rendimiento_categorias";
    $result = mysqli_query($conn, $sql);

    echo "<h3>Métricas de Rendimiento por Categoría:</h3>";
    echo "<table border='1'>";
    echo "<tr>
            <th>Categoría</th>
            <th>Cantidad de Productos</th>
            <th>Total Vendido</th>
            <th>Ingresos Totales</th>
            <th>Producto Más Vendido</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['categoria']}</td>";
        echo "<td>{$row['cantidad_productos']}</td>";
        echo "<td>{$row['total_vendido']}</td>";
        echo "<td>{$row['ingresos_totales']}</td>";
        echo "<td>{$row['producto_mas_vendido']}</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
}

function mostrarTendenciasVentas($conn) {
    $sql = "SELECT * FROM vista_tendencias_ventas";
    $result = mysqli_query($conn, $sql);

    echo "<h3>Tendencias de Ventas por Mes:</h3>";
    echo "<table border='1'>";
    echo "<tr>
            <th>Año</th>
            <th>Mes</th>
            <th>Cantidad de Ventas</th>
            <th>Total Ventas</th>
            <th>Ventas Mes Anterior</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['año']}</td>";
        echo "<td>{$row['mes']}</td>";
        echo "<td>{$row['cantidad_ventas']}</td>";
        echo "<td>\${$row['total_ventas']}</td>";
        echo "<td>\${$row['ventas_mes_anterior']}</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
}

// Mostrar los resultados
mostrarProductosBajoStock($conn);
mostrarHistorialClientes($conn);
mostrarRendimientoCategorias($conn);
mostrarTendenciasVentas($conn);

mysqli_close($conn);
?>