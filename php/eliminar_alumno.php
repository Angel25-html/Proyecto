<?php
header('Content-Type: text/plain');
require_once "conexion.php";

if (isset($_POST['idAlumno'])) {
    $id = $_POST['idAlumno'];

    $sql = 'DELETE FROM alumnos WHERE "idAlumno" = $1';
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
