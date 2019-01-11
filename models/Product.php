<?php

namespace app\models;

class Product extends Model
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

    public function getTableName():string    {
        return 'products';
    }
}