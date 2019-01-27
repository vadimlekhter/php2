<?php

namespace app\interfaces;

interface IDb
{
    //public function queryOne(string $sql, array $params = []);
    public function queryObj(string $sql, array $params = [], $className);
    //public function queryAll(string $sql, array $params = [], $className);
    //public function execute(string $sql, array $params = []);

}