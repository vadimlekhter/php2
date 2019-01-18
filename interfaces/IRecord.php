<?php

namespace app\interfaces;

interface IRecord
{
    static function getOne(int $id);

    static function getAll();

    function insert ();

    function update ();

    function delete ();

    static function getTableName() : string ;
}