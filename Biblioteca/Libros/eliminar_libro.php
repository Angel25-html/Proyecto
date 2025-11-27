<?php
include '../includes/conexion.php';
$id = $_GET['id'];

$query = "DELETE FROM libros WHERE idlibro = $id";
pg_query($conexion, $query);

header("Location: mostrar_libros.php");
exit;
?>
