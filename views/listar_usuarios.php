<!-- views/listar_usuarios.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <header class="text-center mt-4">
        <h1>Lista de Usuarios</h1>
        <p><a href="index.php?action=crear" class="btn btn-success">Crear Nuevo Usuario</a></p>
    </header>

    <main class="container mt-5">
        <?php if (isset($_SESSION['mensaje_exito'])): ?>
            <div class="alert alert-success"><?= $_SESSION['mensaje_exito']; unset($_SESSION['mensaje_exito']); ?></div>
        <?php endif; ?>

        <?php if (isset($mensajeError)): ?>
            <div class="alert alert-danger"><?= $mensajeError; ?></div>
        <?php endif; ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= htmlspecialchars($usuario['id']); ?></td>
                        <td><?= htmlspecialchars($usuario['nombre']); ?></td>
                        <td><?= htmlspecialchars($usuario['usuario']); ?></td>
                        <td>
                            <a href="index.php?action=modificar&id=<?= $usuario['id']; ?>" class="btn btn-warning">Modificar</a>
                            <a href="index.php?action=consultar&id=<?= $usuario['id']; ?>" class="btn btn-info">Consultar</a>
                            <a href="index.php?action=eliminar&id=<?= $usuario['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <footer class="text-center mt-5">
        <p>&copy; <?= date("Y"); ?> Universidad. Todos los derechos reservados.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>