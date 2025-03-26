<?php
namespace App\Config;

use PDO;
use PDOException;

class Database
{
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $conn;

    public function __construct()
    {
        $this->host = getenv('DB_HOST') ?: 'mysql';
        $this->db_name = getenv('DB_NAME') ?: 'todo_db';
        $this->username = getenv('DB_USER') ?: 'todo_user';
        $this->password = getenv('DB_PASS') ?: 'todo_password';
    }

    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("set names utf8");
        } catch(PDOException $e) {
            echo "接続エラー: " . $e->getMessage();
        }

        return $this->conn;
    }
} 