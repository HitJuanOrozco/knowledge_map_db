<?php
// config/config.php

// Definición de constantes de conexión a la base de datos
define('DB_DSN', 'mysql:host=localhost;dbname=knowledge_map_db;charset=utf8');
define('DB_USER', 'root'); // Cambia esto si tu usuario de MySQL es diferente
define('DB_PASS', ''); // Cambia esto si tu contraseña de MySQL es diferente

// Crear conexión a la base de datos
function getConnection() {
    try {
        $pdo = new PDO(DB_DSN, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Manejo de errores mediante excepciones
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Modo de fetch predeterminado
        return $pdo;
    } catch (PDOException $e) {
        // Manejo de errores de conexión
        die("Error al conectar a la base de datos: " . $e->getMessage());
    }
}
?>