<?php

namespace app\models;

use \app\interfaces\IRecord;
//use \app\interfaces\IDb;
use app\services\Db;

abstract class Record implements IRecord
{
    protected $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    /**@return static */

    public static function getOne(int $id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObj($sql, [":id" => $id], get_called_class())[0];
    }

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryObj($sql, [], get_called_class());
    }

    public function insert()
    {
        $tableName = static::getTableName();
        //$arr = get_object_vars($this);
        //array_pop($arr);
        //array_shift($arr);
        $sql = "INSERT INTO {$tableName} SET";
        $params = [];
        //foreach ($arr as $key=>$value) {
        foreach ($this as $key=>$value) {
            if ($key !='id' & $key!='db') {
                $sql .= " {$key} = :{$key},";
                $params [':' . $key] = $value;
            }
        }
        $sql = substr($sql,0,-1);
        $this->db->execute($sql, $params);
        $this->id = $this->db->getLastInsertId();
    }

    public function update()
    {
        $tableName = static::getTableName();
        $sql = "UPDATE {$tableName} SET";
        $params = [":id" => $this->id];
        foreach ($this as $key=>$value) {
            if (($key!=='id'&$key!=='db')&($value != null || $value === '')) {
                $sql .= " {$key} = :{$key},";
                $params [':' . $key] = $value;
            }
        }
        $sql = substr($sql,0,-1);
        $sql .= ' WHERE id = :id';
        $this->db->execute($sql, $params);
    }

    /*public function update()
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
    }*/

    public function delete()
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->execute($sql, [":id" => $this->id]);
    }

    /*public function delete(int $id)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->execute($sql, [":id" => $id);
    }*/

    public function save () {
        if ($this->id == null) {
            $this->insert();
        }
        $this->update();
    }
}