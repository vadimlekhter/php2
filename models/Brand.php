<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 11.01.2019
 * Time: 15:04
 */

namespace app\models;


class Brand extends Model
{
    public $id;
    public $brand;

    public function getTableName():string    {
        return 'brands';
    }
}
