<?php
include '../includes/conexion.php';

// Obtener libros disponibles y usuarios
$libros = pg_query($conexion, "SELECT idlibro, titulo FROM libros WHERE disponible = TRUE ORDER BY titulo");
$usuarios = pg_query($conexion, "SELECT idusuario, nombre FROM usuarios ORDER BY nombre");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idLibro = $_POST['idlibro'];
    $idUsuario = $_POST['idusuario'];
    $fecha_prestamo = $_POST['fecha_prestamo'];
    $fecha_devolucion = $_POST['fecha_devolucion'];
    $estado = $_POST['estado'];

    $query = "
        INSERT INTO prestamos (idlibro, idusuario, fecha_prestamo, fecha_devolucion, estado)
        VALUES ($idLibro, $idUsuario, '$fecha_prestamo', " . 
        ($fecha_devolucion ? "'$fecha_devolucion'" : "NULL") . ", '$estado')";
    
    pg_query($conexion, $query);

    // Cambiar disponibilidad del libro
    pg_query($conexion, "UPDATE libros SET disponible = FALSE WHERE idlibro = $idLibro");

    header("Location: mostrar_prestamos.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Préstamo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>➕ Agregar Préstamo</h2>
    <form method="POST" class="mt-4">
        <div class="mb-3">
            <label class="form-label">Libro</label>
            <select name="idlibro" class="form-select" required>
                <option value="">Selecciona un libro</option>
                <?php while ($libro = pg_fetch_assoc($libros)) { ?>
                    <option value="<?= $libro['idlibro'] ?>"><?= htmlspecialchars($libro['titulo']) ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Usuario</label>
            <select name="idusuario" class="form-select" required>
                <option value="">Selecciona un usuario</option>
                <?php while ($usuario = pg_fetch_assoc($usuarios)) { ?>
                    <option value="<?= $usuario['idusuario'] ?>"><?= htmlspecialchars($usuario['nombre']) ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha de Préstamo</label>
            <input type="date" name="fecha_prestamo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha de Devolución</label>
            <input type="date" name="fecha_devolucion" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Estado</label>
            <select name="estado" class="form-select">
                <option value="Activo">Activo</option>
                <option value="Devuelto">Devuelto</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="mostrar_prestamos.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
