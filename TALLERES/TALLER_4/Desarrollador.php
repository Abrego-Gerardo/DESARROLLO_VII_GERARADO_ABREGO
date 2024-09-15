<?php
require_once 'Evaluable.php';

class Desarrollador extends Empleado implements Evaluable {
    private $lenguajePrincipal;
    private $nivelExperiencia;

    public function __construct($nombre, $idEmpleado, $salarioBase, $lenguajePrincipal, $nivelExperiencia) {
        parent::__construct($nombre, $idEmpleado, $salarioBase);
        $this->lenguajePrincipal = $lenguajePrincipal;
        $this->nivelExperiencia = $nivelExperiencia;
    }

    public function getLenguajePrincipal() {
        return $this->lenguajePrincipal;
    }

    public function getNivelExperiencia() {
        return $this->nivelExperiencia;
    }

    public function evaluarDesempenio() {
        return "Evaluación del Desarrollador {$this->getNombre()} con experiencia en {$this->getLenguajePrincipal()} realizada.";
    }
}
?>
