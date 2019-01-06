<?php

namespace app\models;

class Product extends Model
{
    public $id_good;
    public $name_good;
    public $description;
    public $color;
    public $size;
    public $category;
    public $brand;
    public $designer;
    public $image_1;
    public $image_2;
    public $image_3;
    public $image_4;
    public $image_5;
    public $image_6;
    public $image_7;
    public $image_8;
    public $price;

    public function getTableName():string    {

        return 'products';
    }


}