<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 11.01.2019
 * Time: 15:05
 */

namespace app\models;


class Designer extends Record
{
    public $id;
    public $designer;

    /**
     * Designer constructor.
     * @param $id
     * @param $designer
     */
    public function __construct($id=null, $designer=null)
    {
        $this->id = $id;
        $this->designer = $designer;
    }
}