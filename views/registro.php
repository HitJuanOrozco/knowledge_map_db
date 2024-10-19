<!-- views/registro.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <header class="text-center mt-4">
        <h1>Registrarse</h1>
    </header>

    <main class="container mt-5">
        <?php if (isset($mensajeError)): ?>
            <div class="alert alert-danger"><?= $mensajeError; ?></div>
        <?php endif; ?>
        
        <form action="index.php?action=registro" method="POST" class="border p-4 rounded">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuario" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success btn-block">Registrarse</button>
        </form>

        <p class="text-center mt-3"><a href="index.php?action=login" class="btn btn-link">¿Ya tienes una cuenta? Inicia sesión aquí.</a></p>
    </main>

    <footer class="text-center mt-5">
        <p>&copy; <?= date("Y"); ?> Universidad. Todos los derechos reservados.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="public/js/script.js"></script>
</body>
</html>