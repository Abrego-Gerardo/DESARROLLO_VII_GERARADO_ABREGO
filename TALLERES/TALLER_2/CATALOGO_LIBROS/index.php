<?php
require_once 'includes/funciones.php';
include 'includes/header.php';

$libros = obtenerLibros();
?>

<main>
    <?php 
    foreach ($libros as $libro): 
    ?>
        <?= 
        mostrarDetallesLibro($libro); 
        ?>
    <?php 
    endforeach; 
    ?>
</main>

<?php 
include 'includes/footer.php'; 
?>