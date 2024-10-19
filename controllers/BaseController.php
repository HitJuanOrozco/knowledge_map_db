<?php
require_once __DIR__ . '/../config/database.php';

/**
 * Clase BaseController que gestiona la conexión a la base de datos.
 */
class BaseController {
    protected $db;

    /**
     * Constructor de BaseController.
     *
     * @param PDO $pdo Conexión PDO a la base de datos.
     */
    public function __construct(PDO $pdo) {
        $this->db = $pdo;
    }

    /**
     * Método para ejecutar una consulta SQL.
     *
     * @param string $sql La consulta SQL a ejecutar.
     * @param array $params Parámetros de la consulta.
     * @return mixed Resultado de la consulta.
     */
    protected function executeQuery($sql, $params = []) {
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Manejo de errores
            return ["error" => "Error al ejecutar la consulta: " . $e->getMessage()];
        }
    }
}
?>