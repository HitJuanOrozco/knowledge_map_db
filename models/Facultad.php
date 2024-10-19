<?php
require_once 'BaseController.php';

class Facultad extends BaseController {

    // Obtener todas las facultades
    public function getAll() {
        $sql = "SELECT * FROM facultad WHERE deleted_at IS NULL";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error al obtener las facultades: " . $e->getMessage();
        }
    }

    // Crear una nueva facultad
    public function create($nombre) {
        try {
            // Verificar si la facultad ya existe
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM facultad WHERE nombre = :nombre AND deleted_at IS NULL");
            $stmt->execute(['nombre' => htmlspecialchars($nombre)]);
            if ($stmt->fetchColumn() > 0) {
                return "La facultad ya existe.";
            }

            // Crear una nueva facultad
            $stmt = $this->db->prepare("INSERT INTO facultad (nombre) VALUES (:nombre)");
            return $stmt->execute([
                'nombre' => htmlspecialchars($nombre)
            ]) ? "Facultad registrada correctamente." : "Error al registrar la facultad.";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Buscar facultad por ID
    public function findById($id) {
        try {
            $stmt = $this->db->prepare("SELECT id, nombre FROM facultad WHERE id = :id AND deleted_at IS NULL");
            $stmt->execute(['id' => htmlspecialchars($id)]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Actualizar una facultad
    public function update($id, $nombre) {
        try {
            $stmt = $this->db->prepare("UPDATE facultad SET nombre = :nombre WHERE id = :id AND deleted_at IS NULL");
            return $stmt->execute([
                'nombre' => htmlspecialchars($nombre),
                'id' => htmlspecialchars($id)
            ]) ? "Facultad actualizada correctamente." : "Error al actualizar la facultad.";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Borrado lógico de una facultad
    public function delete($id) {
        try {
            $stmt = $this->db->prepare("UPDATE facultad SET deleted_at = NOW() WHERE id = :id");
            return $stmt->execute(['id' => htmlspecialchars($id)]) ? "Facultad eliminada correctamente." : "Error al eliminar la facultad.";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
?>