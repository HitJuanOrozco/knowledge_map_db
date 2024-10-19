<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <header>
        <h1>Modificar Usuario</h1>
    </header>

    <main>
        <!-- Verificamos si el usuario ha sido cargado correctamente -->
        <?php if (isset($usuario)): ?>
            <form action="index.php?action=actualizar" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars($usuario['id']); ?>">

                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($usuario['nombre']); ?>" required>

                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuario" value="<?= htmlspecialchars($usuario['usuario']); ?>" required>

                <label for="contrasena">Nueva Contraseña (opcional):</label>
                <input type="password" id="contrasena" name="contrasena">

                <button type="submit">Modificar</button>
                <a href="index.php?action=listar">Cancelar</a>
            </form>
        <?php else: ?>
            <p>No se encontró el usuario.</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; <?= date("Y"); ?> Universidad. Todos los derechos reservados.</p>
    </footer>

    <script src="public/js/script.js"></script>
</body>
</html>