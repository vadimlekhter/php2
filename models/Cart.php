<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 21.01.2019
 * Time: 19:41
 */

namespace app\models;


class Cart extends Record
{
    public $id;
    public $user_id;
    public $good_id;
}