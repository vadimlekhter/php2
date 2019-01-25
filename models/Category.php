<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 11.01.2019
 * Time: 15:01
 */

namespace app\models;


class Category extends Record
{
    public $id;
    public $category;

    /**
     * Category constructor.
     * @param $id
     * @param $category
     */
    public function __construct($id = null, $category = null)
    {
        $this->id = $id;
        $this->category = $category;
    }
}