<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <header>
        <h1>Crear Nuevo Usuario</h1>
    </header>

    <main>
        <?php if (isset($mensajeError)): ?>
            <div class="error"><?= $mensajeError; ?></div>
        <?php endif; ?>
        
        <form action="index.php?action=crear" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>

            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required>

            <button type="submit">Crear Usuario</button>
        </form>
    </main>

    <footer>
        <p>&copy; <?= date("Y"); ?> Universidad. Todos los derechos reservados.</p>
    </footer>

    <script src="public/js/script.js"></script>
</body>
</html>
