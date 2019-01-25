<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 11.01.2019
 * Time: 16:03
 */

namespace app\models;


class Color extends Record
{
    public $id;
    public $color;

    /**
     * Color constructor.
     * @param $id
     * @param $color
     */
    public function __construct($id = null, $color = null)
    {
        $this->id = $id;
        $this->color = $color;
    }
}