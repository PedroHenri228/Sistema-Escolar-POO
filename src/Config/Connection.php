<?php

namespace App\Config;

use PDO;
use PDOException;

class Connection
{
    private string $servername;
    private string $username;
    private string $password;
    private string $dbname;
    private ? PDO $connection = null;

    public function __construct()
    {
        $this->servername = $_ENV['DB_HOST'] ?? 'localhost';
        $this->username = $_ENV['DB_USER'] ?? 'root';
        $this->password = $_ENV['DB_PASS'] ?? '';
        $this->dbname = $_ENV['DB_NAME'] ?? 'escola_bd';
    }

    public function conn(): ? PDO
    {
        if ($this->connection === null) {
            try {
                $this->connection = new PDO(
                    "mysql:host={$this->servername};dbname={$this->dbname};charset=utf8",
                    $this->username,
                    $this->password,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false,
                    ]
                );


            } catch (PDOException $e) {
                error_log("Database connection error: " . $e->getMessage());
                throw new PDOException("Erro ao conectar ao banco de dados." . $e->getMessage());
            }
        }

        return $this->connection;
    }
}