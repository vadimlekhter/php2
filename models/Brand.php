<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 11.01.2019
 * Time: 15:04
 */

namespace app\models;


class Brand extends Record
{
    public $id;
    public $brand;

    /**
     * Brand constructor.
     * @param $id
     * @param $brand
     */
    public function __construct($id = null, $brand = null)
    {
        $this->id = $id;
        $this->brand = $brand;
    }


}
