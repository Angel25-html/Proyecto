<?php
include '../includes/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $categoria = $_POST['categoria'];
    $anio = $_POST['anio_publicacion'];
    $disponible = isset($_POST['disponible']) ? 'true' : 'false';

    $query = "INSERT INTO libros (titulo, autor, categoria, anio_publicacion, disponible) 
              VALUES ('$titulo', '$autor', '$categoria', $anio, $disponible)";
    pg_query($conexion, $query);
    header("Location: mostrar_libros.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">➕ Agregar Libro</h2>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Autor</label>
            <input type="text" name="autor" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Categoría</label>
            <input type="text" name="categoria" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Año de Publicación</label>
            <input type="number" name="anio_publicacion" class="form-control">
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" name="disponible" class="form-check-input" checked>
            <label class="form-check-label">Disponible</label>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="mostrar_libros.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
