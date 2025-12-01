<?php
// Archivo: php/conexion.php

// Configuración de conexión
$host = "localhost";
$port = "5432";
$dbname = "quintoisc";
$user = "postgres";
$password = "1234";

// Crear cadena de conexión
$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

// Conectar
$conexion = pg_connect($conn_string);

if (!$conexion) {
    die(json_encode([
        "data" => [],
        "error" => "Error de conexión a la base de datos"
    ]));
}
?>
