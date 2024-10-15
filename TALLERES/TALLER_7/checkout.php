<?php
include 'config_sesion.php';

if (!isset($_SESSION['carrito']) || count($_SESSION['carrito']) === 0) {
    header("Location: productos.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['carrito'] = [];
    
    setcookie("usuario", "Juan", [
        'expires' => time() + 86400,
        'path' => '/',
        'secure' => true,
        'httponly' => true,
        'samesite' => 'Strict'
    ]);

    echo "Gracias por tu compra, ¡te recordaremos la próxima vez!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
</head>
<body>
    <h2>Resumen de Compra</h2>
    <p>Tu compra ha sido exitosa.</p>
    <form method="post" action="">
        <input type="submit" value="Finalizar Compra">
    </form>
</body>
</html>