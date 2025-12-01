<?php
header('Content-Type: text/plain');
require_once "conexion.php";

if (isset($_POST['idAlumno'], $_POST['Nombre'], $_POST['ApellidoPaterno'], $_POST['ApellidoMaterno'], $_POST['Genero'], $_POST['Telefono'], $_POST['Ncontrol'])) {
    $id = $_POST['idAlumno'];
    $nombre = $_POST['Nombre'];
    $apaterno = $_POST['ApellidoPaterno'];
    $amaterno = $_POST['ApellidoMaterno'];
    $genero = $_POST['Genero'];
    $telefono = $_POST['Telefono'];
    $ncontrol = $_POST['Ncontrol'];

    $sql = 'UPDATE alumnos 
            SET "Nombre"=$1, "ApellidoPaterno"=$2, "ApellidoMaterno"=$3, "Genero"=$4, "Telefono"=$5, "Ncontrol"=$6
            WHERE "idAlumno"=$7';
    $result = pg_query_params($conexion, $sql, [$nombre, $apaterno, $amaterno, $genero, $telefono, $ncontrol, $id]);

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
