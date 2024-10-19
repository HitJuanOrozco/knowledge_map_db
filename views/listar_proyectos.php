<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Proyectos</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <h1>Lista de Proyectos</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Proyecto</th>
                <th>Descripción</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Fin</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($proyectos as $proyecto): ?>
            <tr>
                <td><?= $proyecto['id']; ?></td>
                <td><?= $proyecto['nombre']; ?></td>
                <td><?= $proyecto['descripcion']; ?></td>
                <td><?= $proyecto['fecha_inicio']; ?></td>
                <td><?= $proyecto['fecha_fin']; ?></td>
                <td><?= $proyecto['estado']; ?></td>
                <td>
                    <a href="index.php?action=editarProyecto&id=<?= $proyecto['id']; ?>">Editar</a>
                    <a href="index.php?action=eliminarProyecto&id=<?= $proyecto['id']; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este proyecto?');">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>