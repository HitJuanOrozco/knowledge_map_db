<?php
require_once 'BaseController.php';

class InnovacionCurricularController extends BaseController {

    public function listar() {
        $stmt = $this->db->query("SELECT * FROM area_conocimiento");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear($data) {
        $sql = "INSERT INTO area_conocimiento (nombre) VALUES (:nombre)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nombre', $data['nombre']);
        return $stmt->execute();
    }
}
?>