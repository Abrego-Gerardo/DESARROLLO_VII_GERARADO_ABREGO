<?php
session_start();

$usuarios = [
    'Griffind' => '12345',  // Usuario profesor
    'Gerardo' => 'abcd1234',  // Usuario estudiante 1
    'Hugo' => '56789',  // Usuario estudiante 2
    'Carlos' => '2002345',  // Usuario estudiante 3
    'Victor' => '77764',  // Usuario estudiante 4
];

// Comprobar si ya existe una sesión activa
if (isset($_SESSION['usuario'])) {
    if ($_SESSION['rol'] === 'profesor') {
        header('Location: dashboard_profesor.php');
    } else {
        header('Location: dashboard_estudiante.php');
    }
    exit();
}

// Procesar el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    
    // Validar el nombre de usuario y la contraseña
    if (preg_match('/^[a-zA-Z0-9]{3,}$/', $usuario) && strlen($contrasena) >= 5) {
        if (isset($usuarios[$usuario]) && $usuarios[$usuario] === $contrasena) {
            // Autenticación exitosa
            $_SESSION['usuario'] = $usuario;
            $_SESSION['rol'] = ($usuario === 'profesor') ? 'profesor' : 'estudiante';

            // Redirigir según el rol
            if ($_SESSION['rol'] === 'profesor') {
                header('Location: dashboard_profesor.php');
            } else {
                header('Location: dashboard_estudiante.php');
            }
            exit();
        } else {
            $error = "Usuario o contraseña incorrectos.";
        }
    } else {
        $error = "Validación fallida: Nombre de usuario o contraseña no válidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label for="usuario">Usuario:</label><br>
        <input type="text" id="usuario" name="usuario" required><br><br>

        <label for="contrasena">Contraseña:</label><br>
        <input type="password" id="contrasena" name="contrasena" required><br><br>

        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>
