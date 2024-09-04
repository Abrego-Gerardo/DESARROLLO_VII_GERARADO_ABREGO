<?php
include 'funciones_tienda.php';

$productos = [
    'camisa' => 50,
    'pantalon' => 70,
    'zapatos' => 80,
    'calcetines' => 10,
    'gorra' => 25
];

$carrito = [
    'camisa' => 2,
    'pantalon' => 1,
    'zapatos' => 1,
    'calcetines' => 3,
    'gorra' => 0
];

$subtotal = 0;
foreach ($carrito as $producto => $cantidad) {
    if ($cantidad > 0) {
        $subtotal += $productos[$producto] * $cantidad;
    }
}

$descuento = calcular_descuento($subtotal);

$impuesto = aplicar_impuesto($subtotal);

$total = calcular_total($subtotal, $descuento, $impuesto);

echo "<h1>Resumen de la compra</h1>";
echo "<table border='1'>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Precio Total</th>
        </tr>";

foreach ($carrito as $producto => $cantidad) {
    if ($cantidad > 0) {
        echo "<tr>
                <td>$producto</td>
                <td>$cantidad</td>
                <td>\$" . number_format($productos[$producto], 2) . "</td>
                <td>\$" . number_format($productos[$producto] * $cantidad, 2) . "</td>
              </tr>";
    }
}

echo "</table>";

echo "<strong>Subtotal:</strong> \$" . number_format($subtotal, 2);
echo "<strong>Descuento:</strong> -\$" . number_format($descuento, 2);
echo "<strong>Impuesto:</strong> +\$" . number_format($impuesto, 2);
echo "<strong>Total a pagar:</strong> \$" . number_format($total, 2);
?>
