<?php
include '../includes/conexion.php';

$query = "
    SELECT p.idprestamo, l.titulo, u.nombre, p.fecha_prestamo, p.fecha_devolucion, p.estado
    FROM prestamos p
    JOIN libros l ON p.idlibro = l.idlibro
    JOIN usuarios u ON p.idusuario = u.idusuario
    ORDER BY p.idprestamo;
";
$resultado = pg_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Préstamos | Biblioteca Virtual</title>
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
        <h2>📖 Lista de Préstamos</h2>
        <a href="agregar_prestamo.php" class="btn btn-success">➕ Agregar Préstamo</a>
    </div>

    <table class="table table-striped table-bordered shadow">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Libro</th>
                <th>Usuario</th>
                <th>Fecha Préstamo</th>
                <th>Fecha Devolución</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($fila = pg_fetch_assoc($resultado)) { ?>
            <tr>
                <td><?= $fila['idprestamo'] ?></td>
                <td><?= htmlspecialchars($fila['titulo']) ?></td>
                <td><?= htmlspecialchars($fila['nombre']) ?></td>
                <td><?= $fila['fecha_prestamo'] ?></td>
                <td><?= $fila['fecha_devolucion'] ?: 'Pendiente' ?></td>
                <td><?= $fila['estado'] ?></td>
                <td>
                    <a href="editar_prestamo.php?id=<?= $fila['idprestamo'] ?>" class="btn btn-warning btn-sm">✏️ Editar</a>
                    <a href="eliminar_prestamo.php?id=<?= $fila['idprestamo'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este préstamo?');">🗑️ Eliminar</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
