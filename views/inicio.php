<!-- views/inicio.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <header class="text-center py-4">
        <h1>Bienvenido a la Universidad</h1>
        <nav class="d-flex justify-content-center mt-4">
            <a href="index.php?action=login" class="btn btn-primary mx-2">Iniciar Sesión</a>
            <a href="index.php?action=registro" class="btn btn-success mx-2">Registrarse</a>
            <button class="btn btn-warning mx-2" data-toggle="modal" data-target="#modalModificar">Modificar</button>
            <a href="index.php?action=consultar" class="btn btn-info mx-2">Consultar</a>
        </nav>
    </header>

    <main class="container mt-5">
        <!-- Mensaje de éxito -->
        <?php if (isset($mensajeExito)): ?>
            <div class="alert alert-success"><?= $mensajeExito ?></div>
        <?php endif; ?>

        <h2 class="text-center">Usuarios</h2>
        <?php if (!empty($usuarios)): ?>
            <table class="table table-striped table-hover mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Usuario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?= htmlspecialchars($usuario['id']); ?></td>
                            <td><?= htmlspecialchars($usuario['nombre']); ?></td>
                            <td><?= htmlspecialchars($usuario['usuario']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="alert alert-warning">No hay usuarios registrados.</p>
        <?php endif; ?>
    </main>

    <footer class="text-center py-4 mt-5">
        <p>&copy; <?= date("Y"); ?> Universidad. Todos los derechos reservados.</p>
    </footer>

    <!-- Modal para solicitar ID de usuario antes de modificar -->
    <div class="modal fade" id="modalModificar" tabindex="-1" aria-labelledby="modalModificarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalModificarLabel">Modificar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="index.php?action=modificar" method="GET">
                        <div class="form-group">
                            <label for="usuarioID">Ingrese el ID del usuario a modificar:</label>
                            <input type="number" class="form-control" id="usuarioID" name="id" required>
                        </div>
                        <button type="submit" class="btn btn-warning">Modificar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JS de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="public/js/script.js"></script>
</body>
</html>