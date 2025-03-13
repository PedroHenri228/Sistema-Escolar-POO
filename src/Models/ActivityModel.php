<?php 

namespace App\Models;

use App\Config\Connection;
use PDO;
use PDOException;

class ActivityModel {

    private $conn;

    public function __construct() {

        $db = new Connection();
        $this->conn = $db->conn();

    }

    public function getElementsById($id) {
        if (!$this->conn) {
            error_log("Erro: Conexão não inicializada.");
            return [];
        }

        try {
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmp = $this->conn->prepare("SELECT * FROM atividades WHERE turma_codigo = :id");
            $stmp->bindParam(':id', $id);
            $stmp->execute();

            return $stmp->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao buscar atividades: " . $e->getMessage());
            return [];
        }
    }



}
