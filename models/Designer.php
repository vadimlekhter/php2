<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 11.01.2019
 * Time: 15:05
 */

namespace app\models;


class Designer extends Model
{
    public $id;
    public $designer;

    public function getTableName():string    {
        return 'designers';
    }
}