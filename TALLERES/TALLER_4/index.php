<?php
require_once 'Gerente.php';
require_once 'Desarrollador.php';
require_once 'Empresa.php';

$empresa = new Empresa();

$gerente = new Gerente("Ana Pérez", 1, 5000, "Ventas");
$desarrollador = new Desarrollador("Juan García", 2, 4000, "PHP", "Senior");

$gerente->asignarBono(1000);

$empresa->agregarEmpleado($gerente);
$empresa->agregarEmpleado($desarrollador);

$empresa->listarEmpleados();

echo "Nómina total: " . $empresa->calcularNominaTotal() . "\n";

$empresa->evaluarDesempenioEmpleados();
?>
