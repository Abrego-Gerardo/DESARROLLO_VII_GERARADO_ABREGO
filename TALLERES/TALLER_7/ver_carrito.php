<?php
include 'config_sesion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
</head>
<body>
    <h2>Tu Carrito</h2>
    <?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0): ?>
        <ul>
            <?php $total = 0; ?>
            <?php foreach ($_SESSION['carrito'] as $id => $producto): ?>
                <li>
                    <?php echo htmlspecialchars($producto['nombre']) . " - $" . htmlspecialchars($producto['precio']) . " x " . htmlspecialchars($producto['cantidad']); ?>
                    <form method="post" action="eliminar_del_carrito.php" style="display:inline;">
                        <input type="hidden" name="producto_id" value="<?php echo $id; ?>">
                        <input type="submit" value="Eliminar">
                    </form>
                </li>
                <?php $total += $producto['precio'] * $producto['cantidad']; ?>
            <?php endforeach; ?>
        </ul>
        <p>Total: $<?php echo $total; ?></p>
        <a href="checkout.php">Finalizar Compra</a>
    <?php else: ?>
        <p>El carrito está vacío.</p>
    <?php endif; ?>
    <a href="productos.php">Seguir Comprando</a>
</body>
</html>