<?php
include '../includes/conexion.php';
$query = "SELECT * FROM usuarios ORDER BY idusuario";
$resultado = pg_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios | Biblioteca Virtual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">📚 Biblioteca Virtual</a>
    </div>
</nav>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>👤 Lista de Usuarios</h2>
        <a href="agregar_usuario.php" class="btn btn-success">➕ Agregar Usuario</a>
    </div>

    <table class="table table-striped table-bordered shadow">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($fila = pg_fetch_assoc($resultado)) { ?>
            <tr>
                <td><?= $fila['idusuario'] ?></td>
                <td><?= htmlspecialchars($fila['nombre']) ?></td>
                <td><?= htmlspecialchars($fila['correo']) ?></td>
                <td><?= htmlspecialchars($fila['telefono']) ?></td>
                <td><?= htmlspecialchars($fila['direccion']) ?></td>
                <td>
                    <a href="editar_usuario.php?id=<?= $fila['idusuario'] ?>" class="btn btn-warning btn-sm">✏️ Editar</a>
                    <a href="eliminar_usuario.php?id=<?= $fila['idusuario'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este usuario?');">🗑️ Eliminar</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
