<?php
include '../includes/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    $query = "INSERT INTO usuarios (nombre, correo, telefono, direccion)
              VALUES ('$nombre', '$correo', '$telefono', '$direccion')";
    pg_query($conexion, $query);
    header("Location: mostrar_usuarios.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>➕ Agregar Usuario</h2>
    <form method="POST" class="mt-4">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Correo</label>
            <input type="email" name="correo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Dirección</label>
            <textarea name="direccion" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="mostrar_usuarios.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
