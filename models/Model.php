<?php

namespace app\models;

use \app\interfaces\IModel;
use \app\interfaces\IDb;

abstract class Model implements IModel
{
    protected $db;

    public function __construct(IDb $db)
    {
        $this->db = $db;
    }

    public function getOne(int $id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->db->queryOne($sql, [":id" => $id]);
    }


    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }

    public function insert()
    {
        $tableName = $this->getTableName();
        $arr = get_object_vars($this);
        array_pop($arr);
        array_shift($arr);
        $sql = "INSERT INTO {$tableName} SET";
        $params = [];
        foreach ($arr as $key=>$value) {
            $sql .= " {$key} = :{$key},";
            $params [':'.$key] = $value;
        }
        $sql = substr($sql,0,-1);
        $this->db->execute($sql, $params);
    }

    public function update()
    {
        $tableName = $this->getTableName();
        $arr = get_object_vars($this);
        $id = $arr['id'];
        array_pop($arr);
        array_shift($arr);
        $sql = "UPDATE {$tableName} SET";
        $params = [":id" => $id];
        foreach ($arr as $key=>$value) {
            if ($value != null || $value === '') {
                $sql .= " {$key} = :{$key},";
                $params [':' . $key] = $value;
            }
        }
        $sql = substr($sql,0,-1);
        $sql .= ' WHERE id = :id';
        $this->db->execute($sql, $params);
    }

    public function delete(int $id)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->queryOne($sql, [":id" => $id]);
    }
}