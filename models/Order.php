<?php

namespace app\models;


class Order extends Model
{
    public $id;
    public $user_login;
    public $good_id;
    public $color;
    public $size;
    public $count;
    public $shipping;

    public function getTableName():string
    {
        return 'orders';
    }
}