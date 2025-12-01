<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include("conexion.php");

// Validar campos vacíos
if (empty($_POST['nombre_usuario']) || empty($_POST['password'])) {
    header("Location: ../index.php?msg=empty");
    exit();
}

$usuario = trim($_POST['nombre_usuario']);
$password = trim($_POST['password']);

// Consulta segura
$query = "SELECT * FROM usuarios WHERE nombre_usuario = $1 LIMIT 1";
$result = pg_query_params($conexion, $query, array($usuario));

if (!$result || pg_num_rows($result) == 0) {
    header("Location: ../index.php?msg=nouser");
    exit();
}

$row = pg_fetch_assoc($result);

// Validar contraseña (sin hash por ahora)
if ($password !== trim($row['password'])) {
    header("Location: ../index.php?msg=wrongpass");
    exit();
}

// Crear sesión
$_SESSION['nombre_usuario'] = $row['nombre_usuario'];
$_SESSION['rol'] = trim($row['rol']); // alumno, docente, administrador

// Redirección según rol
switch ($_SESSION['rol']) {
    case 'Administrador':
        header("Location: ../Table_Usuarios.php");
        break;
    case 'Alumno':
        header("Location: ../Alumnos/index.html");
        break;
    case 'Docente':
        header("Location: ../Table_Docente.php");
        break;
    default:
        header("Location: ../index.php?msg=unknown");
}
exit();
?>
