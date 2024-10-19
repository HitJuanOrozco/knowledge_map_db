<?php 
require_once 'BaseController.php';

class Usuario extends BaseController {

    // Obtener todos los usuarios
    public function getAll() {
        $sql = "SELECT * FROM usuario WHERE deleted_at IS NULL";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Crear un nuevo usuario
    public function create($nombre, $usuario, $contrasena) {
        try {
            // Verificar si el usuario ya existe
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM usuario WHERE usuario = :usuario AND deleted_at IS NULL");
            $stmt->execute(['usuario' => htmlspecialchars($usuario)]);
            if ($stmt->fetchColumn() > 0) {
                return "El usuario ya existe.";
            }

            // Crear un nuevo usuario
            $stmt = $this->db->prepare("INSERT INTO usuario (nombre, usuario, contrasena) VALUES (:nombre, :usuario, :contrasena)");
            return $stmt->execute([
                'nombre' => htmlspecialchars($nombre),
                'usuario' => htmlspecialchars($usuario),
                'contrasena' => password_hash($contrasena, PASSWORD_BCRYPT)
            ]) ? "Usuario registrado correctamente." : "Error al registrar el usuario.";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Autenticación de usuario
    public function authenticate($usuario, $contrasena) {
        try {
            $stmt = $this->db->prepare("SELECT contrasena FROM usuario WHERE usuario = :usuario AND deleted_at IS NULL");
            $stmt->execute(['usuario' => htmlspecialchars($usuario)]);
            $hash = $stmt->fetchColumn();

            return ($hash && password_verify($contrasena, $hash)) ? true : false;
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Buscar usuario por ID
    public function findById($id) {
        try {
            $stmt = $this->db->prepare("SELECT id, nombre, usuario FROM usuario WHERE id = :id AND deleted_at IS NULL");
            $stmt->execute(['id' => htmlspecialchars($id)]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Actualizar un usuario
    public function update($id, $nombre, $usuario, $contrasena = null) {
        try {
            $sql = "UPDATE usuario SET nombre = :nombre, usuario = :usuario";
            $params = [
                'nombre' => htmlspecialchars($nombre),
                'usuario' => htmlspecialchars($usuario),
                'id' => htmlspecialchars($id)
            ];

            if ($contrasena) {
                $sql .= ", contrasena = :contrasena";
                $params['contrasena'] = password_hash($contrasena, PASSWORD_BCRYPT);
            }

            $sql .= " WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute($params) ? "Usuario modificado correctamente." : "Error al modificar el usuario.";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Borrado lógico de un usuario
    public function delete($id) {
        try {
            $stmt = $this->db->prepare("UPDATE usuario SET deleted_at = NOW() WHERE id = :id");
            return $stmt->execute(['id' => htmlspecialchars($id)]) ? "Usuario eliminado correctamente." : "Error al eliminar el usuario.";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
?>