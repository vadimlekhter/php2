<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 11.01.2019
 * Time: 16:03
 */

namespace app\models;


class Size extends Record
{
    public $id;
    public $size;

    /**
     * Size constructor.
     * @param $id
     * @param $size
     */
    public function __construct($id=null, $size=null)
    {
        $this->id = $id;
        $this->size = $size;
    }
}