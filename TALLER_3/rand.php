<?php
// Ejemplo básico de rand()
echo "Número aleatorio: " . rand() . "
";

// Generar número aleatorio en un rango específico
$min = 1;
$max = 10;
echo "Número aleatorio entre $min y $max: " . rand($min, $max) . "
";

// Ejercicio: Simular el lanzamiento de un dado
function lanzarDado() {
    return rand(1, 6);
}

echo "
Lanzamiento de dado: " . lanzarDado() . "
";

// Simular múltiples lanzamientos
$lanzamientos = 10;
echo "Resultados de $lanzamientos lanzamientos:
";
for ($i = 0; $i < $lanzamientos; $i++) {
    echo lanzarDado() . " ";
}
echo "
";

// Bonus: Generar una contraseña aleatoria
function generarContraseña($longitud = 8) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $contraseña = '';
    for ($i = 0; $i < $longitud; $i++) {
        $contraseña .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
    return $contraseña;
}

echo "
Contraseña aleatoria: " . generarContraseña() . "
";
echo "Contraseña aleatoria (12 caracteres): " . generarContraseña(12) . "
";

// Extra: Seleccionar elemento aleatorio de un array
$frutas = ['manzana', 'banana', 'naranja', 'uva', 'pera'];
$frutaAleatoria = $frutas[rand(0, count($frutas) - 1)];
echo "
Fruta seleccionada aleatoriamente: $frutaAleatoria
";

// Desafío: Implementar un generador de lotería
function generarNumerosLoteria($cantidadNumeros, $minimo, $maximo) {
    $numeros = [];
    while (count($numeros) < $cantidadNumeros) {
        $numero = rand($minimo, $maximo);
        if (!in_array($numero, $numeros)) {
            $numeros[] = $numero;
        }
    }
    sort($numeros);
    return $numeros;
}

$numerosLoteria = generarNumerosLoteria(6, 1, 49);
echo "
Números de lotería generados: " . implode(", ", $numerosLoteria) . "
";

// Ejemplo adicional: Simular probabilidades
function simularProbabilidad($probabilidad) {
    return rand(1, 100) <= $probabilidad;
}

$intentos = 1000;
$exitos = 0;
$probabilidad = 30; // 30% de probabilidad

for ($i = 0; $i < $intentos; $i++) {
    if (simularProbabilidad($probabilidad)) {
        $exitos++;
    }
}

echo "
Simulación de probabilidad ($probabilidad%):
";
echo "Éxitos: $exitos de $intentos intentos (" . ($exitos / $intentos * 100) . "%)
";
?>