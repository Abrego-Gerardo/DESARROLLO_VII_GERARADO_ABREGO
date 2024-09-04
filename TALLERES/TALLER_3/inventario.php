<?php
function leerInventario($archiv o) {
    $contenido = file_get_contents($archivo);
    return json_decode($contenido, true);
}

function ordenarInventarioPorNombre($inventario) {
    usort($inventario, function($a, $b) {
        return strcmp($a['nombre'], $b['nombre']);
    });
    return $inventario;
}

function mostrarResumenInventario($inventario) {
    echo "Resumen del Inventario:\n";
    echo str_pad("Nombre", 20) . str_pad("Precio", 10) . str_pad("Cantidad", 10) . "\n";
    echo str_repeat("-", 40) . "\n";
    foreach ($inventario as $producto) {
        echo str_pad($producto['nombre'], 20) . str_pad("$" . number_format($producto['precio'], 2), 10) . str_pad($producto['cantidad'], 10) . "\n";
    }
}

function calcularValorTotalInventario($inventario) {
    $valorTotal = array_sum(array_map(function($producto) {
        return $producto['precio'] * $producto['cantidad'];
    }, $inventario));
    return $valorTotal;
}

function generarInformeStockBajo($inventario) {
    $stockBajo = array_filter($inventario, function($producto) {
        return $producto['cantidad'] < 5;
    });

    if (count($stockBajo) > 0) {
        echo "\nInforme de Productos con Stock Bajo:\n";
        foreach ($stockBajo as $producto) {
            echo "Producto: " . $producto['nombre'] . " - Cantidad: " . $producto['cantidad'] . "\n";
        }
    } else {
        echo "\nNo hay productos con stock bajo.\n";
    }
}

$archivoInventario = "inventario.json";
$inventario = leerInventario($archivoInventario);
$inventarioOrdenado = ordenarInventarioPorNombre($inventario);
mostrarResumenInventario($inventarioOrdenado);
$valorTotal = calcularValorTotalInventario($inventarioOrdenado);
echo "\nValor Total del Inventario: $" . number_format($valorTotal, 2) . "\n";
generarInformeStockBajo($inventarioOrdenado);
?>

