<?php
header('Content-Type: application/json');

require_once "conexion.php";

try {
    // Verificar si la tabla existe
    $check_table = pg_query($conexion, "SELECT to_regclass('public.materia')");
    $table_exists = pg_fetch_result($check_table, 0, 0);
    
    if ($table_exists === null) {
        throw new Exception("La tabla 'materia' no existe en la base de datos");
    }

    // Map real DB columns to the frontend expected keys (Nombre, Descripcion, Creditos)
    $sql = 'SELECT "idMateria", "NombreMateria" AS "Nombre", "Carrera" AS "Descripcion", "Creditos" FROM materia';
    $result = pg_query($conexion, $sql);
    
    if (!$result) {
        throw new Exception(pg_last_error($conexion));
    }

    $rows = [];
    while ($row = pg_fetch_assoc($result)) {
        $rows[] = $row;
    }

    echo json_encode([
        "data" => $rows,
        "error" => null
    ]);

} catch (Exception $e) {
    echo json_encode([
        "data" => [],
        "error" => $e->getMessage()
    ]);
} finally {
    if (isset($conexion)) {
        pg_close($conexion);
    }
}
?>