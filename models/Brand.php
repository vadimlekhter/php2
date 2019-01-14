<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 11.01.2019
 * Time: 15:04
 */

namespace app\models;


class Brand extends Record
{
    public $id;
    public $brand;

    public static function getTableName():string    {
        return 'brands';
    }
}
