<?php
require_once 'BaseController.php';

class AreaConocimiento extends BaseController {

    // Obtener todas las áreas de conocimiento
    public function getAll() {
        $sql = "SELECT * FROM area_conocimiento WHERE deleted_at IS NULL";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Crear una nueva área de conocimiento
    public function create($nombre) {
        try {
            // Verificar si el área ya existe
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM area_conocimiento WHERE nombre = :nombre AND deleted_at IS NULL");
            $stmt->execute(['nombre' => htmlspecialchars($nombre)]);
            if ($stmt->fetchColumn() > 0) {
                return "El área de conocimiento ya existe.";
            }

            // Crear una nueva área de conocimiento
            $stmt = $this->db->prepare("INSERT INTO area_conocimiento (nombre) VALUES (:nombre)");
            return $stmt->execute(['nombre' => htmlspecialchars($nombre)]) ? "Área de conocimiento registrada correctamente." : "Error al registrar el área de conocimiento.";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Buscar área por ID
    public function findById($id) {
        try {
            $stmt = $this->db->prepare("SELECT id, nombre FROM area_conocimiento WHERE id = :id AND deleted_at IS NULL");
            $stmt->execute(['id' => htmlspecialchars($id)]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Actualizar una área de conocimiento
    public function update($id, $nombre) {
        try {
            $stmt = $this->db->prepare("UPDATE area_conocimiento SET nombre = :nombre WHERE id = :id AND deleted_at IS NULL");
            return $stmt->execute([
                'nombre' => htmlspecialchars($nombre),
                'id' => htmlspecialchars($id)
            ]) ? "Área de conocimiento modificada correctamente." : "Error al modificar el área de conocimiento.";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Borrado lógico de un área de conocimiento
    public function delete($id) {
        try {
            $stmt = $this->db->prepare("UPDATE area_conocimiento SET deleted_at = NOW() WHERE id = :id");
            return $stmt->execute(['id' => htmlspecialchars($id)]) ? "Área de conocimiento eliminada correctamente." : "Error al eliminar el área de conocimiento.";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
?>