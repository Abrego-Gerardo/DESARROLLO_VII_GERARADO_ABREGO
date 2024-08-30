<?php
// Ejemplo básico de array_map()
$numeros = [1, 2, 3, 4, 5];
$cuadrados = array_map(function($n) {
    return $n * $n;
}, $numeros);

echo "Números originales: " . implode(", ", $numeros) . "
";
echo "Cuadrados: " . implode(", ", $cuadrados) . "
";

// Ejemplo con una función nombrada
function duplicar($n) {
    return $n * 2;
}

$duplicados = array_map('duplicar', $numeros);
echo "Números duplicados: " . implode(", ", $duplicados) . "
";

// Ejercicio: Convierte un array de strings a mayúsculas
$frutas = ["manzana", "banana", "cereza", "dátil"];
$frutasMayusculas = array_map('strtoupper', $frutas);

echo "
Frutas originales: " . implode(", ", $frutas) . "
";
echo "Frutas en mayúsculas: " . implode(", ", $frutasMayusculas) . "
";

// Bonus: Usar array_map() con múltiples arrays
$nombres = ["Ana", "Carlos", "Beatriz"];
$apellidos = ["García", "Rodríguez", "López"];
$nombresCompletos = array_map(function($nombre, $apellido) {
    return $nombre . " " . $apellido;
}, $nombres, $apellidos);

echo "
Nombres completos:
";
foreach ($nombresCompletos as $nombreCompleto) {
    echo "- $nombreCompleto
";
}

// Extra: Transformar un array asociativo
$productos = [
    ["nombre" => "Laptop", "precio" => 800],
    ["nombre" => "Teléfono", "precio" => 500],
    ["nombre" => "Tablet", "precio" => 300]
];

$productosConDescuento = array_map(function($producto) {
    $producto['precio_descuento'] = $producto['precio'] * 0.9; // 10% de descuento
    return $producto;
}, $productos);

echo "
Productos con descuento:
";
foreach ($productosConDescuento as $producto) {
    echo "- {$producto['nombre']}: Precio original: {$producto['precio']}, ";
    echo "Precio con descuento: {$producto['precio_descuento']}
";
}

// Desafío: Crear una función que aplique diferentes operaciones a cada elemento
function aplicarOperaciones($array, $operaciones) {
    return array_map(function($valor, $operacion) {
        return $operacion($valor);
    }, $array, $operaciones);
}

$valores = [1, 2, 3, 4, 5];
$operaciones = [
    function($n) { return $n * 2; },
    function($n) { return $n * $n; },
    function($n) { return $n + 10; },
    function($n) { return $n / 2; },
    function($n) { return $n % 3; }
];

$resultados = aplicarOperaciones($valores, $operaciones);

echo "
Resultados de operaciones personalizadas:
";
foreach ($valores as $index => $valor) {
    echo "Valor original: $valor, Resultado: {$resultados[$index]}
";
}
?>