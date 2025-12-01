<?php
header('Content-Type: application/json');
require_once "conexion.php";

$response = ["status" => "error", "msg" => "Datos incompletos"];

if (isset($_POST['nombre_usuario'], $_POST['nombre'], $_POST['password'], $_POST['e_mail'], $_POST['rol'])) {
    $nombre_usuario = $_POST['nombre_usuario'];
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    $e_mail = $_POST['e_mail'];
    $rol = $_POST['rol'];

    // Verificar si el usuario ya existe
    $sql_check = 'SELECT 1 FROM usuarios WHERE nombre_usuario = $1 LIMIT 1';
    $check = pg_query_params($conexion, $sql_check, [$nombre_usuario]);

    if ($check && pg_num_rows($check) > 0) {
        $response = ["status" => "existe", "msg" => "El nombre de usuario ya está registrado"];
    } else {
        // Insertar nuevo usuario
        $sql = 'INSERT INTO usuarios (nombre_usuario, nombre, password, e_mail, rol)
                VALUES ($1, $2, $3, $4, $5)';
        $result = pg_query_params($conexion, $sql, [$nombre_usuario, $nombre, $password, $e_mail, $rol]);

        if ($result) {
            $response = ["status" => "ok", "msg" => "Usuario creado correctamente"];
        } else {
            $response = ["status" => "error", "msg" => pg_last_error($conexion)];
        }
    }
}

echo json_encode($response);
pg_close($conexion);
?>
