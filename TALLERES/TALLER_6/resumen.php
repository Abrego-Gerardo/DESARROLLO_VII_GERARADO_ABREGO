<?php
$archivoDatos = 'registros.json';
$datosExistentes = [];

if (file_exists($archivoDatos)) {
    $datosExistentes = json_decode(file_get_contents($archivoDatos), true);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de Registros</title>
</head>
<body>
    <h2>Resumen de Registros</h2>

    <?php if (empty($datosExistentes)): ?>
        <p>No hay registros disponibles.</p>
    <?php else: ?>
        <table border="1">
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha de Nacimiento</th>
                <th>Edad</th>
                <th>Género</th>
                <th>Intereses</th>
                <th>Foto de Perfil</th>
            </tr>
            <?php foreach ($datosExistentes as $datos): ?>
                <tr>
                    <td><?php echo htmlspecialchars($datos['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($datos['email']); ?></td>
                    <td><?php echo htmlspecialchars($datos['fecha_nacimiento']); ?></td>
                    <td><?php echo htmlspecialchars($datos['edad']); ?></td>
                    <td><?php echo htmlspecialchars($datos['genero']); ?></td>
                    <td><?php echo implode(", ", $datos['intereses']); ?></td>
                    <td><?php if (isset($datos['foto_perfil'])): ?>
                        <img src="<?php echo $datos['foto_perfil']; ?>" width="100">
                    <?php endif; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <br><a href="formulario.html">Volver al formulario</a>
</body>
</html>
