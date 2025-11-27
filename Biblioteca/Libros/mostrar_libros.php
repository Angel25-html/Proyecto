<?php
include '../includes/conexion.php';
$query = "SELECT * FROM libros";
$resultado = pg_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros | Biblioteca Virtual</title>
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
            <h2>📘 Lista de Libros</h2>
            <a href="agregar_libro.php" class="btn btn-success">➕ Agregar Libro</a>
        </div>

        <table class="table table-striped table-bordered shadow">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Categoría</th>
                    <th>Año</th>
                    <th>Disponible</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($fila = pg_fetch_assoc($resultado)) {
                    echo "<tr>
                        <td>{$fila['idlibro']}</td>
                        <td>{$fila['titulo']}</td>
                        <td>{$fila['autor']}</td>
                        <td>{$fila['categoria']}</td>
                        <td>{$fila['anio_publicacion']}</td>
                        <td>" . ($fila['disponible'] ? 'Sí' : 'No') . "</td>
                        <td>
                            <a href='editar_libro.php?id={$fila['idlibro']}' class='btn btn-warning btn-sm'>✏️ Editar</a>
                            <a href='eliminar_libro.php?id={$fila['idlibro']}' class='btn btn-danger btn-sm' onclick=\"return confirm('¿Estás seguro de eliminar este libro?');\">🗑️ Eliminar</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <footer class="text-center mt-5 py-3 bg-white border-top">
        <p class="text-muted mb-0">© 2025 Biblioteca Virtual | Módulo de Libros</p>
    </footer>
</body>
</html>
