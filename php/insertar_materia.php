<?php
header('Content-Type: application/json');
require_once "conexion.php";

// Assumes POST fields from frontend: Nombre (maps to NombreMateria), Descripcion (maps to Carrera), Creditos
$response = ["status" => "error", "msg" => "Datos incompletos"];

if (isset($_POST['Nombre'], $_POST['Descripcion'], $_POST['Creditos'])) {
    $nombre = $_POST['Nombre'];
    $descripcion = $_POST['Descripcion']; // we'll store this in "Carrera"
    $creditos = $_POST['Creditos'];

    // Simple duplicate check by NombreMateria
    $sql_check = 'SELECT 1 FROM materia WHERE "NombreMateria" = $1 LIMIT 1';
    $check = pg_query_params($conexion, $sql_check, [$nombre]);

    if ($check && pg_num_rows($check) > 0) {
        $response = ["status" => "existe", "msg" => "La materia ya está registrada"];
    } else {
        // Insert mapping to real columns: NombreMateria, Carrera, Creditos
        $sql = 'INSERT INTO materia("NombreMateria", "Carrera", "Creditos") VALUES ($1, $2, $3)';
        $result = pg_query_params($conexion, $sql, [$nombre, $descripcion, $creditos]);

        if ($result) {
            $response = ["status" => "ok", "msg" => "Materia creada correctamente"];
        } else {
            $response = ["status" => "error", "msg" => pg_last_error($conexion)];
        }
    }
}

echo json_encode($response);
pg_close($conexion);
?>