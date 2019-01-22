<?php

namespace app\models;


class Order extends Record
{
    public $id;
    public $user_id;
    public $good_id;
    public $color;
    public $size;
    public $count;
    public $shipping;

    /*public static function getTableName():string
    {
        return 'orders';
    }*/
}