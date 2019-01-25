<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 21.01.2019
 * Time: 19:41
 */

namespace app\models;


use app\models\repositories\ProductRepository;
use app\services\Request;
use app\services\Session;


class Cart extends Record
{
    public $id;
    public $user_id;
    public $good_id;

    /**
     * Cart constructor.
     * @param $id
     * @param $user_id
     * @param $good_id
     */
    public function __construct($id = null, $user_id = null, $good_id = null)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->good_id = $good_id;
    }

    public function getAll()
    {
        $session = (new Session())->get('cart');
        $cart = [];
        if (!empty ($session)) {
            $productsIds = array_keys($session);
            $products = (new ProductRepository())->getProductsByIds($productsIds);
            foreach ($products as $product) {
                $cart [] = [
                    'product' => $product,
                    'count' => $session[$product->id]
                ];
            }
        }
        return $cart;
    }

    public function add($productId, $productQty)
    {
        $session = new Session();
        $cart = $session->get('cart');
        if (isset ($cart[$productId])) {
            $cart[$productId] += (int)$productQty;
        } else {
            $cart[$productId] = (int)$productQty;
        }
        $session->set('cart', $cart);
    }

    public function delete ($productId) {
        $session = new Session();
        $cart = $session->get('cart');
        unset($cart[$productId]);
        $session->set('cart', $cart);
    }
}