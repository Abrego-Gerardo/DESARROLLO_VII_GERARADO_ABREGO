<?php
session_start();

// Verificar si el usuario es un estudiante
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'estudiante') {
    header('Location: login.php');
    exit();
}

// Array de calificaciones (nombre de usuario => calificación)
$calificaciones_estudiantes = [
    'estudiante1' => 85,
    'estudiante2' => 90,
];

// Obtener el nombre del estudiante actual
$usuario_actual = $_SESSION['usuario'];
$calificacion = isset($calificaciones_estudiantes[$usuario_actual]) ? $calificaciones_estudiantes[$usuario_actual] : 'No disponible';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard del Estudiante</title>
</head>
<body>
    <h2>Bienvenido, <?php echo htmlspecialchars($usuario_actual); ?></h2>
    <h3>Tu Calificación</h3>

    <p>Calificación: <?php echo htmlspecialchars($calificacion); ?></p>

    <br>
    <a href="logout.php">Cerrar Sesión</a>
</body>
</html>