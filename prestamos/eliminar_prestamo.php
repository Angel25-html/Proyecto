<?php
include '../includes/conexion.php';
$id = $_GET['id'];

// Recuperar ID del libro para devolver disponibilidad
$consulta = pg_query($conexion, "SELECT idlibro FROM prestamos WHERE idprestamo = $id");
$prestamo = pg_fetch_assoc($consulta);
$idLibro = $prestamo['idlibro'];

// Eliminar préstamo
pg_query($conexion, "DELETE FROM prestamos WHERE idprestamo = $id");

// Devolver disponibilidad del libro
pg_query($conexion, "UPDATE libros SET disponible = TRUE WHERE idlibro = $idLibro");

header("Location: mostrar_prestamos.php");
exit;
?>
