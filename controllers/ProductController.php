<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 12.01.2019
 * Time: 19:49
 */

namespace app\controllers;

use app\models\repositories\ProductRepository;
use app\services\Request;

class ProductController extends Controller
{
    public function actionIndex()
    {
        $product = (new ProductRepository())->getAll();
        echo $this->render('product/catalog', ['product' => $product]);
    }

    public function actionCard()
    {



        $id = (new Request())->getParams()['id'];
        if (is_null($id)) {
            throw new GetOneException ("Неверный запрос");
        }
        $product = (new ProductRepository())->getOne($id);
        echo $this->render((new Request())->getControllerName() . '/card', ['product' => $product]);
    }
}