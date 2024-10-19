<!-- views/editar_facultad.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Facultad</title>
    <link rel="stylesheet" href="public/CSS/styles.css"> <!-- Asegúrate de que el enlace CSS esté correcto -->
</head>
<body>
    <h1>Editar Facultad</h1>

    <?php if (!empty($facultad)): ?>
        <form action="index.php?controller=Facultad&action=update&id=<?php echo $facultad['id']; ?>" method="POST">
            <label for="nombre">Nombre de la Facultad:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $facultad['nombre']; ?>" required>

            <button type="submit">Actualizar</button>
        </form>
    <?php else: ?>
        <p>No se encontró la facultad solicitada.</p>
    <?php endif; ?>

    <a href="index.php?controller=Facultad&action=index">Volver al listado</a>
</body>
</html>