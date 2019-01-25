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

    public function getOrderbyId($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE user_id = :user_id";
        return $this->find($sql, [":user_id" => $id]);
    }

    public function getOrderbySession($sessionId)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE session_id = :session_id";
        return $this->find($sql, [":session_id" => $sessionId]);
    }
}