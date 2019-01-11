<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 11.01.2019
 * Time: 16:03
 */

namespace app\models;


class Size extends Model
{
    public $id;
    public $size;

    public function getTableName():string    {
        return 'sizes';
    }
}