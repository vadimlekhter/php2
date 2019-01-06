<?php

namespace app\models;

use \app\interfaces\IDb;

class Db implements IDb
{
    public function queryOne(string $sql, array $params = [])
    {
        return [];
    }

    public function querySome(string $sql, array $params = [])
    {
        return [];
    }

    public function queryAll(string $sql, array $params = []){
        return [];
    }
}