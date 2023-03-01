<?php

namespace App;

class DB
{
    private $pdo;
    private const DB_NAME = "test_db";
    private const HOST = "localhost";
    private const USER = "root";
    private const PWD = "";

    public function __construct()
    {
        $dsn = "mysql:host=" . self::HOST . ";dbname=" . self::DB_NAME;
        $this->pdo = new \PDO($dsn, self::USER, self::PWD);
    }

    public function select(string $query, ?array $params = null)
    {
        $stmt = $this->pdo->prepare($query);

        $stmt->execute($params);

        return $stmt->rowCount() ? $stmt->fetchAll(\PDO::FETCH_ASSOC) : null;
    }
    public function insert(string $query, ?array $params = null)
    {

        $stmt = $this->pdo->prepare($query);

        $stmt->execute($params);

        return $stmt->rowCount() ? $this->pdo->lastInsertId() : null;
    }
    public function update(string $query, ?array $params = null)
    {
        $stmt = $this->pdo->prepare($query);

        $stmt->execute($params);

        return $stmt->rowCount() ?? null;
    }
    public function delete(string $query, ?array $params = null)
    {
        $stmt = $this->pdo->prepare($query);

        $stmt->execute($params);

        return $stmt->rowCount() ?? null;
    }

    private static $instance = null;
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new DB();
        }
        return self::$instance;
    }


}