<?php
// Ejemplo básico de in_array()
$frutas = ["manzana", "banana", "naranja", "uva"];
$buscar = "banana";

if (in_array($buscar, $frutas)) {
    echo "$buscar está en la lista de frutas.";
} else {
    echo "$buscar no está en la lista de frutas.";
}

// Ejemplo con comparación estricta
$numeros = [1, "2", 3, "4", 5];
$buscarNumero = "2";

echo "Buscando '$buscarNumero' en el array de números:";
echo "Comparación normal: " . (in_array($buscarNumero, $numeros) ? "Encontrado" : "No encontrado") . "";
echo "Comparación estricta: " . (in_array($buscarNumero, $numeros, true) ? "Encontrado" : "No encontrado") . "";

// Ejercicio: Verifica si un color está en la lista de colores primarios
$coloresPrimarios = ["rojo", "azul", "amarillo"];
$colorUsuario = "Negro"; // Cambia este color para probar diferentes resultados

echo "¿$colorUsuario es un color primario? " . (in_array(strtolower($colorUsuario), $coloresPrimarios) ? "Sí" : "No") . "";

// Bonus: Función para verificar múltiples elementos
function elementosEnArray($elementos, $array) {
    $resultados = [];
    foreach ($elementos as $elemento) {
        $resultados[$elemento] = in_array($elemento, $array);
    }
    return $resultados;
}

$diasSemana = ["lunes", "martes", "miércoles", "jueves", "viernes", "sábado", "domingo"];
$diasBuscar = ["lunes", "sábado", "festivo", "laborales", "libres", "habiles"];

$resultadosDias = elementosEnArray($diasBuscar, $diasSemana);
echo "Resultados de búsqueda de días:";
foreach ($resultadosDias as $dia => $encontrado) {
    echo "$dia: " . ($encontrado ? "Encontrado" : "No encontrado") . "";
}

// Extra: Uso de in_array() con arrays multidimensionales
$personas = [
    ["nombre" => "Juan", "edad" => 25],
    ["nombre" => "María", "edad" => 30],
    ["nombre" => "Carlos", "edad" => 22]
];

$buscarPersona = ["nombre" => "María", "edad" => 30];

echo "Buscando persona en el array:";
echo in_array($buscarPersona, $personas) ? "Persona encontrada" : "Persona no encontrada";

// Desafío: Crear una función de búsqueda case-insensitive
function in_array_case_insensitive($needle, $haystack) {
    return in_array(strtolower($needle), array_map('strtolower', $haystack));
}

$lenguajes = ["PHP", "Java", "Python", "JavaScript"];
$buscarLenguaje = "php";

echo "Buscando '$buscarLenguaje' en lenguajes de programación:";
echo in_array_case_insensitive($buscarLenguaje, $lenguajes) ? "Encontrado" : "No encontrado";
?>