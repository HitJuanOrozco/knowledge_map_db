<?php
require_once 'BaseController.php';

class Docente extends BaseController {

    // Obtener todos los docentes
    public function getAll() {
        $sql = "SELECT * FROM docente WHERE deleted_at IS NULL";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error al obtener los docentes: " . $e->getMessage();
        }
    }

    // Crear un nuevo docente
    public function create($nombre, $departamento, $correo) {
        try {
            // Verificar si el docente ya existe por su correo
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM docente WHERE correo = :correo AND deleted_at IS NULL");
            $stmt->execute(['correo' => htmlspecialchars($correo)]);
            if ($stmt->fetchColumn() > 0) {
                return "El docente ya existe.";
            }

            // Crear un nuevo docente
            $stmt = $this->db->prepare("INSERT INTO docente (nombre, departamento, correo) VALUES (:nombre, :departamento, :correo)");
            return $stmt->execute([
                'nombre' => htmlspecialchars($nombre),
                'departamento' => htmlspecialchars($departamento),
                'correo' => htmlspecialchars($correo)
            ]) ? "Docente registrado correctamente." : "Error al registrar el docente.";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Buscar un docente por ID
    public function findById($id) {
        try {
            $stmt = $this->db->prepare("SELECT id, nombre, departamento, correo FROM docente WHERE id = :id AND deleted_at IS NULL");
            $stmt->execute(['id' => htmlspecialchars($id)]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Actualizar un docente
    public function update($id, $nombre, $departamento, $correo) {
        try {
            $stmt = $this->db->prepare("UPDATE docente SET nombre = :nombre, departamento = :departamento, correo = :correo WHERE id = :id AND deleted_at IS NULL");
            return $stmt->execute([
                'nombre' => htmlspecialchars($nombre),
                'departamento' => htmlspecialchars($departamento),
                'correo' => htmlspecialchars($correo),
                'id' => htmlspecialchars($id)
            ]) ? "Docente actualizado correctamente." : "Error al actualizar el docente.";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Borrado lógico de un docente
    public function delete($id) {
        try {
            $stmt = $this->db->prepare("UPDATE docente SET deleted_at = NOW() WHERE id = :id");
            return $stmt->execute(['id' => htmlspecialchars($id)]) ? "Docente eliminado correctamente." : "Error al eliminar el docente.";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
?>