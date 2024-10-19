<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Docentes</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <header>
        <h1>Listado de Docentes</h1>
    </header>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $docente): ?>
                <tr>
                    <td><?= $docente['nombre'] ?></td>
                    <td><?= $docente['email'] ?></td>
                    <td>
                        <a href="index.php?controller=Docente&action=edit&id=<?= $docente['id'] ?>">Editar</a>
                        <a href="index.php?controller=Docente&action=delete&id=<?= $docente['id'] ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>