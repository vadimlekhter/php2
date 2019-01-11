<?php

namespace app\services;

use \app\interfaces\IDb;
use \app\traits\TSingltone;

class Db implements IDb
{
    use TSingltone;

    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'proekt_oop',
        'charset' => 'utf8'
    ];


    private $conn = null;

    public $lastId;

    private function getConnection()
    {
        if (is_null($this->conn)) {
            echo "New connection";
            $this->conn = new \PDO(
                $this->prepareDsnString(),
                $this->config['login'],
                $this->config['password']
            );
            $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        }
        return $this->conn;
    }

    private function prepareDsnString()
    {
        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );
    }

    private function query(string $sql, array $params = [])
    {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        $this->lastId = $this->getConnection()->lastInsertId();
        var_dump($this->lastId);
        return $pdoStatement;
    }

    public function execute(string $sql, array $params = [])
    {
        $this->query($sql, $params);
        return true;
    }

    public function queryOne(string $sql, array $params = [])
    {
        return $this->queryAll($sql, $params)[0];
    }

    public function queryAll(string $sql, array $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }
}