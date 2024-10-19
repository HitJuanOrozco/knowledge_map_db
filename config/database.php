<?php
// config/database.php

/**
 * Clase Database para manejar la conexión a la base de datos usando PDO.
 */
class Database {
    private $host = 'localhost'; // Cambia esto si tu base de datos está en otro host
    private $db_name = 'knowledge_map_db'; // Nombre de la base de datos
    private $username = 'root'; // Cambia esto si tu usuario de MySQL es diferente
    private $password = ''; // Cambia esto si tu contraseña de MySQL es diferente
    private $conn;

    /**
     * Método para establecer la conexión a la base de datos.
     *
     * @return PDO|null La instancia de la conexión PDO o null si hay un error.
     */
    public function connect() {
        $this->conn = null;

        try {
            // Crear una nueva conexión a la base de datos usando PDO
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name};charset=utf8", 
                $this->username, 
                $this->password
            );

            // Configurar el modo de error de PDO a excepción
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Modo de fetch predeterminado
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }

        return $this->conn;
    }
}
?>