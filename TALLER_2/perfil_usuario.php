<?php
$nombre_completo = "Gerardo Ignacio Abrego Valderrama";
$edad = 22;
$correo = "abrego010802@gmail.com";
$telefono = "61317547";

define("OCUPACION", "Desempleado");

echo "Nombre Completo: " . $nombre_completo . "<br>";
print("Edad: $edad años<br>");
printf("Correo Electrónico: %s<br>", $correo);
echo "Teléfono: $telefono<br>";
print("Ocupación: " . OCUPACION . "<br>");

echo "<br>Información de debugging:<br>";
var_dump($nombre_completo);
echo "<br>";
var_dump($edad);
echo "<br>";
var_dump($correo);
echo "<br>";
var_dump($telefono);
echo "<br>";
var_dump(OCUPACION);
echo "<br>";
?>
