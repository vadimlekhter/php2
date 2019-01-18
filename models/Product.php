<?php

namespace app\models;

class Product extends Record
{
    public $id;
    public $name;
    public $description;
    public $category;
    public $brand;
    public $designer;
    public $image_1;
    public $image_2;
    public $image_3;
    public $price;

    public static function getTableName():string    {
        return 'products';
    }
}