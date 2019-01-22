<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 21.01.2019
 * Time: 16:51
 */

namespace app\interfaces;


interface IRepository
{
    function getOne(int $id);

    function getAll();

    function getTableName() : string ;
}