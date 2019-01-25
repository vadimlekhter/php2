<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 21.01.2019
 * Time: 16:04
 */

namespace app\models\repositories;

use app\base\App;
use app\interfaces\IRepository;
use app\models\Record;
use app\services\Db;
use app\controllers;


class RecordException extends \Exception {}

abstract class Repository implements IRepository
{
    protected $db;

    public function __construct()
    {
        $this->db = $this->getDb();
    }

    protected function getDb()
    {
        $db = App::call()->db;
        if (empty($db)) {
            throw new RecordException ("Не удалось создать соединение с базой");
        }
        return $db;
    }

    public function find ($sql, $params =[]) {
        return $this->db->queryObj($sql, $params, $this->getRecordClass());
    }

    public function getOne(int $id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->find($sql, [":id" => $id])[0];
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->find($sql);
    }

    public function insert(Record $record)
    {
        $tableName = $this->getTableName();
        $sql = "INSERT INTO {$tableName} SET";
        $params = [];
        foreach ($record as $key => $value) {
            if ($key != 'db') {
                $sql .= " {$key} = :{$key},";
                $params [':' . $key] = $value;
            }
        }
        $sql = substr($sql, 0, -1);
        $this->db->execute($sql, $params);

    }

    public function update(Record $record)
    {
        $tableName = $this->getTableName();
        $sql = "UPDATE {$tableName} SET";
        $params = [":id" => $record->id];
        foreach ($this as $key => $value) {
            if (($key !== 'id' & $key !== 'db') & ($value != null || $value === '')) {
                $sql .= " {$key} = :{$key},";
                $params [':' . $key] = $value;
            }
        }
        $sql = substr($sql, 0, -1);
        $sql .= ' WHERE id = :id';
        $this->db->execute($sql, $params);
    }

    public function delete(Record $record)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->execute($sql, [":id" => $record->id]);
    }

    public function save(Record $record)
    {
        if ($record->id == null) {
            $this->insert($record);
            $record->id = $this->db->getLastInsertId();
            return $record->id;
        }
        $this->update($record);
    }


    abstract public function getRecordClass ();

}