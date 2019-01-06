<?php

namespace app\models;


class Order extends Model
{
    public $id_user;
    public $id_good;
    public $color;
    public $size;
    public $count;
    public $shipping;

    public function getTableName():string
    {
        return 'orders';
    }
}