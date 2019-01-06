<?php

namespace app\models;

use \app\interfaces\IModel;
use \app\interfaces\IDb;

abstract class Model implements IModel
{
    protected $db;

    /**
     * User constructor.
     */
    public function __construct(IDb $db)
    //public function __construct($db)
    {
        $this->db = $db;
    }

    public function getOne(int $id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = {$id}";
        return $this->db->queryOne($sql);
    }

    public function getSome()
    {
        // TODO: Implement getSome() method.
    }


    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} ";
        return $this->db->queryAll($sql);
    }

    public function setOne()
    {
        // TODO: Implement setOne() method.
    }

    public function setSome()
    {
        // TODO: Implement setSome() method.
    }
}