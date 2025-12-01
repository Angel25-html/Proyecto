<?php
header('Content-Type: text/plain');
require_once "conexion.php";

if (isset($_POST['id_usuario'])) {
    $id = $_POST['id_usuario'];

    // Consulta para eliminar el registro
    $sql = "DELETE FROM usuarios WHERE id_usuario = $1";
    $result = pg_query_params($conexion, $sql, [$id]);

    if ($result) {
        echo "ok";
    } else {
        echo "error";
    }
} else {
    echo "error";
}

// Cierra la conexión
pg_close($conexion);
?>
