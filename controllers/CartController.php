<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 22.01.2019
 * Time: 10:59
 */

namespace app\controllers;

use app\models\repositories\CartRepository;
use app\services\Request;
class CartController extends Controller
{
    public function actionIndex()
    {
        $cart = (new CartRepository())->getAll();
        echo $this->render((new Request())->getControllerName() . '/allcarts', ['cart' => $cart]);
    }

    public function actionOnecart()
    {
        $id = (new Request())->getParams()['id'];
        if (is_null($id)) {
            throw new GetOneException ("Неверный запрос");
        }
        $cart = (new CartRepository())->getOne($id);
        echo $this->render((new Request())->getControllerName() . '/onecart', ['cart' => $cart]);
    }
}