<?php
class Autenticacion {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Autenticación de usuario
    public function login($usuario, $contrasena) {
        try {
            $stmt = $this->pdo->prepare("SELECT contrasena FROM usuario WHERE usuario = :usuario AND deleted_at IS NULL");
            $stmt->execute(['usuario' => htmlspecialchars($usuario)]);
            $hash = $stmt->fetchColumn();

            if ($hash && password_verify($contrasena, $hash)) {
                return true; // Autenticación exitosa
            } else {
                return "Usuario o contraseña incorrectos.";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Cierre de sesión
    public function logout() {
        session_start();
        session_destroy();
        return "Sesión cerrada correctamente.";
    }
}
?>