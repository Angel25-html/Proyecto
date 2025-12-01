<?php
header('Content-Type: application/json');
require_once "conexion.php";

$response = ["status" => "error", "msg" => "Datos incompletos"];

if (isset($_POST['Nombre'], $_POST['ApellidoPaterno'], $_POST['ApellidoMaterno'], $_POST['Genero'], $_POST['Telefono'], $_POST['Ncontrol'])) {
    $nombre = $_POST['Nombre'];
    $apaterno = $_POST['ApellidoPaterno'];
    $amaterno = $_POST['ApellidoMaterno'];
    $genero = $_POST['Genero'];
    $telefono = $_POST['Telefono'];
    $ncontrol = $_POST['Ncontrol'];

    // Verificar duplicado
    $sql_check = 'SELECT 1 FROM maestros WHERE "Ncontrol" = $1 LIMIT 1';
    $check = pg_query_params($conexion, $sql_check, [$ncontrol]);

    if ($check && pg_num_rows($check) > 0) {
        $response = ["status" => "existe", "msg" => "El número de control ya está registrado"];
    } else {
        $sql = 'INSERT INTO maestros("Nombre", "ApellidoPaterno", "ApellidoMaterno", "Genero", "Telefono", "Ncontrol")
                VALUES ($1, $2, $3, $4, $5, $6)';
        $result = pg_query_params($conexion, $sql, [$nombre, $apaterno, $amaterno, $genero, $telefono, $ncontrol]);

        if ($result) {
            $response = ["status" => "ok", "msg" => "Docente creado correctamente"];
        } else {
            $response = ["status" => "error", "msg" => pg_last_error($conexion)];
        }
    }
}

echo json_encode($response);
pg_close($conexion);