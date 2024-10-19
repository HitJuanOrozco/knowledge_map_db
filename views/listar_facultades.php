<!-- views/listar_facultades.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Facultades</title>
    <link rel="stylesheet" href="public/CSS/styles.css"> <!-- Asegúrate de que el enlace CSS esté correcto -->
</head>
<body>
    <h1>Listado de Facultades</h1>

    <?php if (!empty($data)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $facultad): ?>
                    <tr>
                        <td><?php echo $facultad['id']; ?></td>
                        <td><?php echo $facultad['nombre']; ?></td>
                        <td>
                            <a href="index.php?controller=Facultad&action=edit&id=<?php echo $facultad['id']; ?>">Editar</a>
                            <a href="index.php?controller=Facultad&action=delete&id=<?php echo $facultad['id']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay facultades registradas.</p>
    <?php endif; ?>

    <a href="index.php?controller=Facultad&action=create">Crear nueva Facultad</a>
</body>
</html>