<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 11.01.2019
 * Time: 16:03
 */

namespace app\models;


class Size extends Record
{
    public $id;
    public $size;

    public static function getTableName():string    {
        return 'sizes';
    }
}