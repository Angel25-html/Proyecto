<?php
header('Content-Type: application/json');
require_once "conexion.php"; // Conexión a la base de datos

try {
    // Verificar si la tabla existe
    $check_table = pg_query($conexion, "SELECT to_regclass('public.usuarios')");
    $table_exists = pg_fetch_result($check_table, 0, 0);
    
    if ($table_exists === null) {
        throw new Exception("La tabla 'usuarios' no existe en la base de datos");
    }

    // Consulta a la tabla usuarios
    $sql = 'SELECT 
                id_usuario AS "ID",
                nombre_usuario AS "Usuario",
                nombre AS "Nombre",
                e_mail AS "Correo",
                rol AS "Rol"
            FROM usuarios
            ORDER BY id_usuario ASC';
    
    $result = pg_query($conexion, $sql);
    
    if (!$result) {
        throw new Exception(pg_last_error($conexion));
    }

    // Convertir resultados a arreglo asociativo
    $rows = [];
    while ($row = pg_fetch_assoc($result)) {
        $rows[] = $row;
    }

    // Enviar respuesta en formato JSON
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
