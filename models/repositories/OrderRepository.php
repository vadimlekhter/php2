<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 21.01.2019
 * Time: 19:42
 */

namespace app\models\repositories;

use app\models\Order;
class OrderRepository extends Repository
{
    public function getTableName(): string
    {
        return 'orders';
    }

    public function getRecordClass()
    {
        return Order::class;
    }
}