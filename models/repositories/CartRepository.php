<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 21.01.2019
 * Time: 19:44
 */

namespace app\models\repositories;

use app\models\Cart;
class CartRepository extends Repository
{
    public function getTableName(): string
    {
        return 'carts';
    }

    public function getRecordClass()
    {
        return Cart::class;
    }
}