<?php
class Estudiante {
    private $id;
    private $nombre;
    private $edad;
    private $carrera;
    private $materias;

    public function __construct($id, $nombre, $edad, $carrera) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->carrera = $carrera;
        $this->materias = [];
    }

    public function agregarMateria($materia, $calificacion) {
        $this->materias[$materia] = $calificacion;
    }

    public function obtenerPromedio() {
        if (empty($this->materias)) return 0;
        return array_sum($this->materias) / count($this->materias);
    }

    public function obtenerDetalles() {
        return [
            "id" => $this->id,
            "nombre" => $this->nombre,
            "edad" => $this->edad,
            "carrera" => $this->carrera,
            "materias" => $this->materias,
            "promedio" => $this->obtenerPromedio()
        ];
    }

    public function __toString() {
        return "{$this->nombre} (ID: {$this->id}) - Promedio: " . number_format($this->obtenerPromedio(), 2);
    }
}

class SistemaGestionEstudiantes {
    private $estudiantes;
    private $graduados;

    public function __construct() {
        $this->estudiantes = [];
        $this->graduados = [];
    }

    public function agregarEstudiante(Estudiante $estudiante) {
        $this->estudiantes[$estudiante->obtenerDetalles()['id']] = $estudiante;
    }

    public function obtenerEstudiante($id) {
        return $this->estudiantes[$id] ?? null;
    }

    public function listarEstudiantes() {
        return $this->estudiantes;
    }

    public function calcularPromedioGeneral() {
        if (empty($this->estudiantes)) return 0;
        $promedioTotal = array_reduce($this->estudiantes, function($carry, $est) {
            return $carry + $est->obtenerPromedio();
        }, 0);
        return $promedioTotal / count($this->estudiantes);
    }

    public function obtenerEstudiantesPorCarrera($carrera) {
        return array_filter($this->estudiantes, function($est) use ($carrera) {
            return $est->obtenerDetalles()['carrera'] === $carrera;
        });
    }

    public function obtenerMejorEstudiante() {
        return array_reduce($this->estudiantes, function($mejor, $est) {
            return ($mejor === null || $est->obtenerPromedio() > $mejor->obtenerPromedio()) ? $est : $mejor;
        });
    }

    public function graduarEstudiante($id) {
        if (isset($this->estudiantes[$id])) {
            $this->graduados[] = $this->estudiantes[$id];
            unset($this->estudiantes[$id]);
        }
    }

    public function generarRanking() {
        usort($this->estudiantes, function($a, $b) {
            return $b->obtenerPromedio() <=> $a->obtenerPromedio();
        });
        return $this->estudiantes;
    }

    public function generarReporteRendimiento() {
        $reporte = [];
        foreach ($this->estudiantes as $estudiante) {
            foreach ($estudiante->obtenerDetalles()['materias'] as $materia => $calificacion) {
                if (!isset($reporte[$materia])) {
                    $reporte[$materia] = ["total" => 0, "count" => 0, "max" => $calificacion, "min" => $calificacion];
                }
                $reporte[$materia]["total"] += $calificacion;
                $reporte[$materia]["count"]++;
                $reporte[$materia]["max"] = max($reporte[$materia]["max"], $calificacion);
                $reporte[$materia]["min"] = min($reporte[$materia]["min"], $calificacion);
            }
        }

        foreach ($reporte as $materia => &$datos) {
            $datos["promedio"] = $datos["total"] / $datos["count"];
        }

        return $reporte;
    }
}

$sistema = new SistemaGestionEstudiantes();

$estudiante1 = new Estudiante(1, "Ana", 20, "Ingeniería");
$estudiante1->agregarMateria("Matemáticas", 90);
$estudiante1->agregarMateria("Física", 85);

$estudiante2 = new Estudiante(2, "Juan", 22, "Derecho");
$estudiante2->agregarMateria("Derecho Civil", 78);
$estudiante2->agregarMateria("Derecho Penal", 88);

$estudiante3 = new Estudiante(3, "María", 21, "Medicina");
$estudiante3->agregarMateria("Anatomía", 95);
$estudiante3->agregarMateria("Fisiología", 92);

$sistema->agregarEstudiante($estudiante1);
$sistema->agregarEstudiante($estudiante2);
$sistema->agregarEstudiante($estudiante3);

echo "Estudiantes registrados:\n";
foreach ($sistema->listarEstudiantes() as $estudiante) {
    echo $estudiante . "\n";
}

echo "Promedio general del sistema: " . number_format($sistema->calcularPromedioGeneral(), 2) . "\n";

$sistema->graduarEstudiante(1);

echo "Ranking de estudiantes:\n";
foreach ($sistema->generarRanking() as $ranked) {
    echo $ranked . "\n";
}

$reporte = $sistema->generarReporteRendimiento();
echo "Reporte de rendimiento:\n";
foreach ($reporte as $materia => $datos) {
    echo "$materia - Promedio: " . number_format($datos['promedio'], 2) . ", Máx: {$datos['max']}, Mín: {$datos['min']}\n";
}
?>