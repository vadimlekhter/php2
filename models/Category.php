<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 11.01.2019
 * Time: 15:01
 */

namespace app\models;


class Category extends Model
{
    public $id;
    public $category;

    public function getTableName():string    {
        return 'categories';
    }
}