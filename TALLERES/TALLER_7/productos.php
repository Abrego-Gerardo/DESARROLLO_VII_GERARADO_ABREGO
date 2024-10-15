<?php
include 'config_sesion.php';
$productos = [
    1 => ["nombre" => "Producto A", "precio" => 10],
    2 => ["nombre" => "Producto B", "precio" => 15],
    3 => ["nombre" => "Producto C", "precio" => 20],
    4 => ["nombre" => "Producto D", "precio" => 25],
    5 => ["nombre" => "Producto E", "precio" => 30],
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
</head>
<body>
    <h2>Lista de Productos</h2>
    <ul>
        <?php foreach ($productos as $id => $producto): ?>
            <li>
                <?php echo htmlspecialchars($producto['nombre']) . " - $" . htmlspecialchars($producto['precio']); ?>
                <form method="post" action="agregar_al_carrito.php">
                    <input type="hidden" name="producto_id" value="<?php echo $id; ?>">
                    <input type="submit" value="Añadir al Carrito">
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="ver_carrito.php">Ver Carrito</a>
</body>
</html>