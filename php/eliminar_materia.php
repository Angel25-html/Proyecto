<?php
header('Content-Type: text/plain');
require_once "conexion.php";

// Assumes POST field: idMateria
if (isset($_POST['idMateria'])) {
    $id = $_POST['idMateria'];

    $sql = 'DELETE FROM materia WHERE "idMateria" = $1';
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