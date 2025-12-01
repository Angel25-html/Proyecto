<?php
session_start();

// Si no hay sesión activa
if (!isset($_SESSION['rol'])) {
    header("Location: index.php?msg=nouser");
    exit();
}

// Función para verificar el rol requerido
function verificarRol($rolesPermitidos) {
    if (!in_array($_SESSION['rol'], $rolesPermitidos)) {
        header("Location: no_autorizado.php");
        exit();
    }
}
?>
