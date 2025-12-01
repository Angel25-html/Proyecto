<?php
header('Content-Type: text/plain');
require_once "conexion.php";

if (isset($_POST['idMaestro'])) {
    $id = $_POST['idMaestro'];

    $sql = 'DELETE FROM maestros WHERE "idMaestro" = $1';
    $result = pg_query_params($conexion, $sql, [$id]);

    if ($result) {
        echo "ok";
    } else {
        echo "error";
    }
} else {
    echo "error";
}

pg_close($conexion);
?>