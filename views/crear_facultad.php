<!-- views/crear_facultad.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Facultad</title>
    <link rel="stylesheet" href="public/CSS/styles.css"> <!-- Asegúrate de que el enlace CSS esté correcto -->
</head>
<body>
    <h1>Crear Nueva Facultad</h1>

    <form action="index.php?controller=Facultad&action=store" method="POST">
        <label for="nombre">Nombre de la Facultad:</label>
        <input type="text" id="nombre" name="nombre" required>

        <button type="submit">Guardar</button>
    </form>

    <a href="index.php?controller=Facultad&action=index">Volver al listado</a>
</body>
</html>