<?php
include '../includes/conexion.php';
$id = $_GET['id'];

$query = "DELETE FROM usuarios WHERE idusuario = $id";
pg_query($conexion, $query);

header("Location: mostrar_usuarios.php");
exit;
?>
