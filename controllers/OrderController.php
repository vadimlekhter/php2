<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 22.01.2019
 * Time: 11:17
 */

namespace app\controllers;

use app\models\repositories\OrderRepository;
use app\services\Request;
class OrderController extends Controller
{
    public function actionIndex()
    {
        $order = (new OrderRepository())->getAll();
        echo $this->render((new Request())->getControllerName() . '/allorders', ['order' => $order]);
    }

    public function actionOneorder()
    {
        $id = (new Request())->getParams()['id'];
        if (is_null($id)) {
            throw new GetOneException ("Неверный запрос");
        }
        $order = (new OrderRepository())->getOne($id);
        echo $this->render((new Request())->getControllerName() . '/oneorder', ['order' => $order]);
    }
}