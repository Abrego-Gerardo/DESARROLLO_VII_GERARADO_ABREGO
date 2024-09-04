<?php
// Ejemplo básico de round()
$numero = 3.14159;
echo "Número original: $numero
";
echo "Redondeado: " . round($numero) . "
";

// Redondeo con precisión específica
echo "Redondeado a 2 decimales: " . round($numero, 2) . "
";
echo "Redondeado a 4 decimales: " . round($numero, 4) . "
";

// Redondeo de números negativos
$negativo = -5.7;
echo "
Número negativo: $negativo
";
echo "Redondeado: " . round($negativo) . "
";

// Ejercicio: Calcular el promedio de calificaciones y redondear
$calificaciones = [85.5, 92.3, 78.8, 89.9, 95.2];
$promedio = array_sum($calificaciones) / count($calificaciones);
echo "
Promedio de calificaciones: $promedio
";
echo "Promedio redondeado: " . round($promedio, 1) . "
";

// Bonus: Usar diferentes modos de redondeo
$numero = 5.5;
echo "
Número: $numero
";
echo "Redondeo normal: " . round($numero) . "
";
echo "Redondeo hacia abajo: " . round($numero, 0, PHP_ROUND_HALF_DOWN) . "
";
echo "Redondeo hacia arriba: " . round($numero, 0, PHP_ROUND_HALF_UP) . "
";
echo "Redondeo hacia par: " . round($numero, 0, PHP_ROUND_HALF_EVEN) . "
";
echo "Redondeo hacia impar: " . round($numero, 0, PHP_ROUND_HALF_ODD) . "
";

// Extra: Función para redondear precios
function redondearPrecio($precio) {
    return round($precio * 20) / 20;
}

$precios = [9.99, 10.49, 20.05, 5.75];
echo "
Precios originales y redondeados:
";
foreach ($precios as $precio) {
    echo "Original: $precio, Redondeado: " . redondearPrecio($precio) . "
";
}

// Desafío: Crear una función de redondeo personalizada
function redondeoPersonalizado($numero, $incremento = 0.5) {
    return round($numero / $incremento) * $incremento;
}

$valores = [3.2, 3.8, 4.3, 4.7];
echo "
Redondeo personalizado (incremento de 0.5):
";
foreach ($valores as $valor) {
    echo "Original: $valor, Redondeado: " . redondeoPersonalizado($valor) . "
";
}

// Ejemplo adicional: Redondeo en cálculos financieros
$cantidad = 10/3; // Esto resulta en un número periódico
echo "
División de 10/3:
";
echo "Resultado exacto: " . $cantidad . "
";
echo "Redondeado a 2 decimales (para moneda): " . round($cantidad, 2) . "
";
echo "Redondeado a 4 decimales (para cálculos más precisos): " . round($cantidad, 4) . "
";
?>