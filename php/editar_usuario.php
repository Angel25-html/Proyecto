<?php
header('Content-Type: text/plain');
require_once "conexion.php";

if (
    isset($_POST['id_usuario'], $_POST['nombre_usuario'], $_POST['nombre'], $_POST['password'], $_POST['e_mail'], $_POST['rol'])
) {
    $id = $_POST['id_usuario'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    $e_mail = $_POST['e_mail'];
    $rol = $_POST['rol'];

    // Consulta SQL para actualizar los datos
    $sql = "UPDATE usuarios 
            SET nombre_usuario = $1, 
                nombre = $2, 
                password = $3, 
                e_mail = $4, 
                rol = $5 
            WHERE id_usuario = $6";

    $params = [$nombre_usuario, $nombre, $password, $e_mail, $rol, $id];

    $result = pg_query_params($conexion, $sql, $params);

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
