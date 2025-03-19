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

        if ($id == null) {
            return [];
        }else {
            $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        }

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

    public function insert($data) {
            
            if (!$this->conn) {
                error_log("Erro: Conexão não inicializada.");
                return false;
            }
    
            try {
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmp = $this->conn->prepare("INSERT INTO atividades (descricao, data, turma_codigo) VALUES (:descricao, :data, :turma_codigo)");
                $stmp->bindParam(':descricao', $data['descricao']);
                $stmp->bindParam(':data', $data['date']);
                $stmp->bindParam(':turma_codigo', $_POST['turma_codigo']);
                $stmp->execute();
    
                return true;
            } catch (PDOException $e) {
                error_log("Erro ao inserir atividade: " . $e->getMessage());
                return false;
            }
    }



}
