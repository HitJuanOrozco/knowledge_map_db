<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/styles.css">
    <title>Áreas de Conocimiento</title>
</head>
<body>
    <h1>Listado de Áreas de Conocimiento</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($areas as $area): ?>
                <tr>
                    <td><?= $area['id']; ?></td>
                    <td><?= $area['nombre']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>