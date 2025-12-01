<?php
header('Content-Type: text/plain');
require_once "conexion.php";

// Assumes POST fields: idMateria, Nombre (maps to NombreMateria), Descripcion (maps to Carrera), Creditos
if (isset($_POST['idMateria'], $_POST['Nombre'], $_POST['Descripcion'], $_POST['Creditos'])) {
    $id = $_POST['idMateria'];
    $nombre = $_POST['Nombre'];
    $descripcion = $_POST['Descripcion']; // stored in "Carrera"
    $creditos = $_POST['Creditos'];

    $sql = 'UPDATE materia
            SET "NombreMateria"=$1, "Carrera"=$2, "Creditos"=$3
            WHERE "idMateria"=$4';
    $result = pg_query_params($conexion, $sql, [$nombre, $descripcion, $creditos, $id]);

    if ($result) {
        echo "ok";
    } else {
        // For debugging you can return pg_last_error($conexion)
        echo pg_last_error($conexion);
    }
} else {
    echo "error";
}

pg_close($conexion);
?>