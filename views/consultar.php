<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header class="text-center mt-4">
        <h1>Consultar Usuario</h1>
    </header>

    <main class="container mt-5">
        <form action="index.php?action=consultar" method="POST" class="border p-4 rounded">
            <div class="form-group">
                <label for="id">ID del Usuario:</label>
                <input type="text" id="id" name="id" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-info btn-block">Consultar Usuario</button>
        </form>

        <?php if (isset($usuario)): ?>
            <div class="mt-4">
                <h4>Datos del Usuario:</h4>
                <p><strong>ID:</strong> <?= htmlspecialchars($usuario['id']); ?></p>
                <p><strong>Nombre:</strong> <?= htmlspecialchars($usuario['nombre']); ?></p>
                <p><strong>Usuario:</strong> <?= htmlspecialchars($usuario['usuario']); ?></p>
            </div>
        <?php elseif (isset($mensajeError)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($mensajeError); ?></div>
        <?php endif; ?>
    </main>

    <footer class="text-center mt-5">
        <p>&copy; <?= date("Y"); ?> Universidad. Todos los derechos reservados.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>