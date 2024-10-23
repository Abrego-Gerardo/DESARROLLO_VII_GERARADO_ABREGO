<?php
session_start();

// Verificar si el usuario es un profesor
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'profesor') {
    header('Location: login.php');
    exit();
}

// Array de calificaciones de los estudiantes (nombre => calificación)
$calificaciones_estudiantes = [
    'Estudiante 1' => 85,
    'Estudiante 2' => 90,
    'Estudiante 3' => 78,
    'Estudiante 4' => 92,
    'Estudiante 5' => 88,
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard del Profesor</title>
</head>
<body>
    <h2>Bienvenido, Profesor</h2>
    <h3>Lista de Estudiantes y sus Calificaciones</h3>

    <table border="1">
        <tr>
            <th>Nombre del Estudiante</th>
            <th>Calificación</th>
        </tr>
        <?php foreach ($calificaciones_estudiantes as $estudiante => $calificacion): ?>
            <tr>
                <td><?php echo htmlspecialchars($estudiante); ?></td>
                <td><?php echo htmlspecialchars($calificacion); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <a href="logout.php">Cerrar Sesión</a>
</body>
</html>