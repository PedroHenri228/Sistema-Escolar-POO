<?php

namespace App\Models;
use App\Config\Connection;
use PDO;
use PDOException;
class ClassModel
{

    private $conn;


    public function __construct()
    {

        $db = new Connection();
        $this->conn = $db->conn();

    }

    public function getElements()
    {
        if (!$this->conn) {
            error_log("Erro: Conexão não inicializada.");
            return [];
        }

        try {
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmp = $this->conn->prepare("SELECT * FROM turmas");
            $stmp->execute();

            return $stmp->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao buscar turmas: " . $e->getMessage());
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
            $stmp = $this->conn->prepare("INSERT INTO turmas (codigo, nome, professor_codigo) VALUES (:codigo, :nome, :professor_codigo)");
            $stmp->bindParam(':codigo', $data['codigo']);
            $stmp->bindParam(':nome', $data['nome']);
            $stmp->bindParam(':professor_codigo', $data['professor_codigo']);
            $stmp->execute();

            return true;
        } catch (PDOException $e) {
            error_log("Erro ao inserir turma: " . $e->getMessage());
            return false;
        }
    }

}