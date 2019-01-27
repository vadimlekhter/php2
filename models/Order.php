<?php

namespace app\models;

use app\services\Session;
use app\models\repositories\OrderRepository;

class Order extends Record
{
    public $id;
    public $user_id;
    public $good_id;
    public $color;
    public $size;
    public $count;
    public $shipping;

    /**
     * Order constructor.
     * @param $id
     * @param $user_id
     * @param $good_id
     * @param $color
     * @param $size
     * @param $count
     * @param $shipping
     */
    public function __construct($id = null, $user_id = null, $good_id = null, $color = null, $size = null, $count = null,
                                $shipping = null)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->good_id = $good_id;
        $this->color = $color;
        $this->size = $size;
        $this->count = $count;
        $this->shipping = $shipping;
    }

    public function addorder()
    {
        $session = (new Session())->get('cart');
        $userId = (new Session())->get('userid');
        foreach ($session as $key => $value) {
            if ($key != 0) {
                $order = new Order();
                $order->id = null;
                $order->user_id = $userId;
                $order->session_id = session_id();
                $order->good_id = $key;
                $order->count = $value;
                $orderAdd = new OrderRepository();
                $orderAdd->save($order);
            }
        }
        (new Session())->delete('cart');
    }

    public function getorder()
    {
        $order = new OrderRepository();
        $session = new Session;
        $id = $session->get('userid');

        if (!is_null($id)) {
            $result = $order->getOrderbyId($id);
        } else {
            $sessionId = session_id();
            $result = $order->getOrderbySession($sessionId);
        }
        return $result;
    }
}