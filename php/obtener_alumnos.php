<?php
header('Content-Type: application/json');

// Incluir conexión
require_once "conexion.php";

// Consulta con comillas dobles para respetar mayúsculas
$sql = 'SELECT "idAlumno", "Nombre", "ApellidoPaterno", "ApellidoMaterno", "Genero", "Telefono", "Ncontrol" FROM alumnos';
$result = pg_query($conexion, $sql);

$alumnos = [];
if ($result) {
    while ($row = pg_fetch_assoc($result)) {
        $alumnos[] = $row;
    }
}

// Respuesta en JSON
echo json_encode(["data" => $alumnos]);

// Cerrar conexión
pg_close($conexion);
?>
