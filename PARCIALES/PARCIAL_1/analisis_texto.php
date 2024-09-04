<?php
include 'utilidades_texto.php';

$frases = [
    "Desarrollo de Software", "Redes De Computradora.", "El que depende de otros."
];

echo "<table border='1'>
<tr>
<th>Frase</th>
<th>Número de palabras</th>
<th>Número de vocales</th>
<th>Frase invertida</th>
</tr>";

foreach ($frases as $frase) {
    echo "<tr>";
    echo "<td>$frase</td>";
    echo "<td>" . contar_palabras($frase) . "</td>";
    echo "<td>" . contar_vocales($frase) . "</td>";
    echo "<td>" . invertir_palabras($frase) . "</td>";
    echo "</tr>";
}

echo "</table>";
?>

