<?php
// 1. Crear un patrón de triángulo rectángulo usando asteriscos (*) con un bucle for.
echo "<h2>Patrón de triángulo rectángulo:</h2>";
$filas = 5;
for ($i = 1; $i <= $filas; $i++) {
    echo str_repeat("*", $i) . "<br>";
}
echo "<br>";

// 2. Generar una secuencia de números del 1 al 20, pero solo mostrar los números impares usando un bucle while.
echo "<h2>Números impares del 1 al 20:</h2>";
$numero = 1;
while ($numero <= 20) {
    if ($numero % 2 != 0) {
        echo "$numero ";
    }
    $numero++;
}
echo "<br><br>";

// 3. Crear un contador regresivo desde 10 hasta 1, pero saltar el número 5 usando un bucle do-while.
echo "<h2>Contador regresivo desde 10 hasta 1, saltando el número 5:</h2>";
$contador = 10;
do {
    if ($contador == 5) {
        $contador--;
        continue;
    }
    echo "$contador ";
    $contador--;
} while ($contador >= 1);
?>