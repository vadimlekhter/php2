<?php

namespace app\interfaces;

interface IModel
{
    function getOne(int $id);

    function getAll();

    function insert ();

    function update ();

    function delete (int $id);

    function getTableName() : string ;
}