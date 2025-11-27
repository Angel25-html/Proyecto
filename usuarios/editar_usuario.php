<?php
include '../includes/conexion.php';
$id = $_GET['id'];
$resultado = pg_query($conexion, "SELECT * FROM usuarios WHERE idusuario = $id");
$usuario = pg_fetch_assoc($resultado);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    $query = "UPDATE usuarios 
              SET nombre='$nombre', correo='$correo', telefono='$telefono', direccion='$direccion'
              WHERE idusuario=$id";
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
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>✏️ Editar Usuario</h2>
    <form method="POST" class="mt-4">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($usuario['nombre']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Correo</label>
            <input type="email" name="correo" class="form-control" value="<?= htmlspecialchars($usuario['correo']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="<?= htmlspecialchars($usuario['telefono']) ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Dirección</label>
            <textarea name="direccion" class="form-control"><?= htmlspecialchars($usuario['direccion']) ?></textarea>
        </div>
        <button type="submit" class="btn btn-warning">Actualizar</button>
        <a href="mostrar_usuarios.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
