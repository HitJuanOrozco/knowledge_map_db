<?php
// config/session.php

session_start();

// Función para verificar la sesión del usuario
function checkSession() {
    if (!isset($_SESSION['user_id'])) {
        // Redireccionar a la página de inicio de sesión si no hay sesión activa
        header("Location: login.php");
        exit();
    }
}

// Función para iniciar sesión
function login($user_id, $nombre) {
    $_SESSION['user_id'] = $user_id;
    $_SESSION['nombre'] = $nombre;
}

// Función para cerrar sesión
function logout() {
    session_start();
    session_unset(); // Eliminar todas las variables de sesión
    session_destroy(); // Destruir la sesión
    header("Location: login.php");
    exit();
}
?>