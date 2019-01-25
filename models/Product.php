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

    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $description
     * @param $category
     * @param $brand
     * @param $designer
     * @param $image_1
     * @param $image_2
     * @param $image_3
     * @param $price
     */
    public function __construct($id = null, $name = null, $description = null, $category = null, $brand = null,
                                $designer = null, $image_1 = null, $image_2 = null, $image_3 = null, $price = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->category = $category;
        $this->brand = $brand;
        $this->designer = $designer;
        $this->image_1 = $image_1;
        $this->image_2 = $image_2;
        $this->image_3 = $image_3;
        $this->price = $price;
    }
}

