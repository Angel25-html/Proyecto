<?php
include '../includes/conexion.php';
$id = $_GET['id'];

$resultado = pg_query($conexion, "SELECT * FROM prestamos WHERE idprestamo = $id");
$prestamo = pg_fetch_assoc($resultado);

$libros = pg_query($conexion, "SELECT idlibro, titulo FROM libros ORDER BY titulo");
$usuarios = pg_query($conexion, "SELECT idusuario, nombre FROM usuarios ORDER BY nombre");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idLibro = $_POST['idlibro'];
    $idUsuario = $_POST['idusuario'];
    $fecha_prestamo = $_POST['fecha_prestamo'];
    $fecha_devolucion = $_POST['fecha_devolucion'];
    $estado = $_POST['estado'];

    $query = "
        UPDATE prestamos
        SET idlibro = $idLibro, idusuario = $idUsuario,
            fecha_prestamo = '$fecha_prestamo',
            fecha_devolucion = " . ($fecha_devolucion ? "'$fecha_devolucion'" : "NULL") . ",
            estado = '$estado'
        WHERE idprestamo = $id";
    pg_query($conexion, $query);

    if ($estado === 'Devuelto') {
        pg_query($conexion, "UPDATE libros SET disponible = TRUE WHERE idlibro = $idLibro");
    }

    header("Location: mostrar_prestamos.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Préstamo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>✏️ Editar Préstamo</h2>
    <form method="POST" class="mt-4">
        <div class="mb-3">
            <label class="form-label">Libro</label>
            <select name="idlibro" class="form-select" required>
                <?php while ($libro = pg_fetch_assoc($libros)) { ?>
                    <option value="<?= $libro['idlibro'] ?>" <?= $prestamo['idlibro'] == $libro['idlibro'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($libro['titulo']) ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Usuario</label>
            <select name="idusuario" class="form-select" required>
                <?php while ($usuario = pg_fetch_assoc($usuarios)) { ?>
                    <option value="<?= $usuario['idusuario'] ?>" <?= $prestamo['idusuario'] == $usuario['idusuario'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($usuario['nombre']) ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha de Préstamo</label>
            <input type="date" name="fecha_prestamo" class="form-control" value="<?= $prestamo['fecha_prestamo'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha de Devolución</label>
            <input type="date" name="fecha_devolucion" class="form-control" value="<?= $prestamo['fecha_devolucion'] ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Estado</label>
            <select name="estado" class="form-select">
                <option value="Activo" <?= $prestamo['estado'] == 'Activo' ? 'selected' : '' ?>>Activo</option>
                <option value="Devuelto" <?= $prestamo['estado'] == 'Devuelto' ? 'selected' : '' ?>>Devuelto</option>
            </select>
        </div>

        <button type="submit" class="btn btn-warning">Actualizar</button>
        <a href="mostrar_prestamos.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
