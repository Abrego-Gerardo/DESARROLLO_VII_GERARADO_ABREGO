<?php
$calificacion = 90;

if ($calificacion >= 90) {
    $letra = 'A';
} elseif ($calificacion >= 80) {
    $letra = 'B';
} elseif ($calificacion >= 70) {
    $letra = 'C';
} elseif ($calificacion >= 60) {
    $letra = 'D';
} else {
    $letra = 'F';
}

echo "Tu calificación es $letra.<br>";

$estado = ($letra != 'F') ? "Aprobado" : "Reprobado";
echo "$estado.<br>";

switch ($letra) {
    case 'A':
        echo "Excelente trabajo.<br>";
        break;
    case 'B':
        echo "Buen trabajo.<br>";
        break;
    case 'C':
        echo "Trabajo aceptable.<br>";
        break;
    case 'D':
        echo "Necesitas mejorar.<br>";
        break;
    case 'F':
        echo "Debes esforzarte más.<br>";
        break;
    default:
        echo "Calificación no válida.<br>";
}
?>
