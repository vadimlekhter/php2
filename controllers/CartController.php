<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 22.01.2019
 * Time: 10:59
 */

namespace app\controllers;

use app\base\App;
use app\models\Cart;

class CartController extends Controller
{
    public function actionIndex()
    {
        $class_name = $this->getclass();
        echo $this->render($class_name . '/allcarts', ['cart' => (new Cart())->getAll()]);
    }

    public function actionAdd()
    {
        $request = App::call()->request;
        if ($request->isPost()) {
            $productId = (int)$request->getParams()['id'];
            $productQty = (int)$request->getParams()['qty'] ?: 1;
            (new Cart())->add($productId, $productQty);
            header("Location: {$request->getReferer()}");
            //echo json_encode(['success' => 'ok', 'message' => 'Товар успешно добавлен']);
        }
    }

    public function actionDelete () {
        $request = App::call()->request;
        if ($request->isGet()) {
            $productId = (int)$request->getParams()['id'];
            (new Cart())->delete($productId);
            header("Location: {$request->getReferer()}");
            //echo json_encode(['success' => 'ok', 'message' => 'Item deleted succefully']);
        }
    }






    /*public function actionOnecart()
    {
        $id = (new Request())->getParams()['id'];
        if (is_null($id) || !is_numeric($id)) {
            throw new GetOneException ("Неверный запрос.");
        }
        $cart = (new CartRepository())->getOne($id);
        if (is_null($cart)) {
            throw new GetOneException ("Неверный запрос.");
        }
        $str = get_class($this);
        $class_name = strtolower(str_replace('Controller', '', end(explode('\\', $str))));
        echo $this->render($class_name . '/onecart', ['cart' => $cart]);
    }*/
}