<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 22.01.2019
 * Time: 11:17
 */

namespace app\controllers;

use app\base\App;
use app\models\Order;
use app\models\repositories\OrderRepository;
use app\services\Request;
class OrderController extends Controller
{
    /*public function actionIndex()
    {
        $order = (new OrderRepository())->getAll();
        $str = get_class($this);
        $class_name = strtolower(str_replace('Controller', '', end(explode('\\', $str))));
        echo $this->render($class_name . '/allorders', ['order' => $order]);
    }*/

    public function actionIndex()
    {
        $order = (new Order())->getorder();
        $class_name = $this->getclass();
        echo $this->render($class_name . '/allorders', ['order' => $order]);
    }

    public function actionAddorder () {
        $request = App::call()->request;
        (new Order())->addOrder();
        header("Location: {$request->getReferer()}");
        //echo json_encode(['success' => 'ok', 'message' => 'Заказ оформлен']);
    }

    /*public function actionOneorder()
    {
        $id = (new Request())->getParams()['id'];
        if (is_null($id) || !is_numeric($id)) {
            throw new GetOneException ("Неверный запрос.");
        }
        $order = (new OrderRepository())->getOne($id);
        if (is_null($order)) {
            throw new GetOneException ("Неверный запрос.");
        }
        $str = get_class($this);
        $class_name = strtolower(str_replace('Controller', '', end(explode('\\', $str))));
        echo $this->render($class_name . '/oneorder', ['order' => $order]);
    }*/


}