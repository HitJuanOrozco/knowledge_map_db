<?php
require_once 'BaseController.php';

class Proyecto extends BaseController {

    // Obtener todos los proyectos
    public function getAll() {
        $sql = "SELECT * FROM proyecto WHERE deleted_at IS NULL";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Crear un nuevo proyecto
    public function create($nombre, $descripcion) {
        try {
            $stmt = $this->db->prepare("INSERT INTO proyecto (nombre, descripcion) VALUES (:nombre, :descripcion)");
            return $stmt->execute([
                'nombre' => htmlspecialchars($nombre),
                'descripcion' => htmlspecialchars($descripcion)
            ]) ? "Proyecto registrado correctamente." : "Error al registrar el proyecto.";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Buscar proyecto por ID
    public function findById($id) {
        try {
            $stmt = $this->db->prepare("SELECT id, nombre, descripcion FROM proyecto WHERE id = :id AND deleted_at IS NULL");
            $stmt->execute(['id' => htmlspecialchars($id)]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Actualizar un proyecto
    public function update($id, $nombre, $descripcion) {
        try {
            $stmt = $this->db->prepare("UPDATE proyecto SET nombre = :nombre, descripcion = :descripcion WHERE id = :id AND deleted_at IS NULL");
            return $stmt->execute([
                'nombre' => htmlspecialchars($nombre),
                'descripcion' => htmlspecialchars($descripcion),
                'id' => htmlspecialchars($id)
            ]) ? "Proyecto modificado correctamente." : "Error al modificar el proyecto.";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Borrado lógico de un proyecto
    public function delete($id) {
        try {
            $stmt = $this->db->prepare("UPDATE proyecto SET deleted_at = NOW() WHERE id = :id");
            return $stmt->execute(['id' => htmlspecialchars($id)]) ? "Proyecto eliminado correctamente." : "Error al eliminar el proyecto.";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
?>