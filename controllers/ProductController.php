<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 12.01.2019
 * Time: 19:49
 */

namespace app\controllers;

use app\base\App;
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
        $id = (App::call()->request)->getParams()['id'];
        if (is_null($id) || !is_numeric($id)) {
            throw new GetOneException ("Неверный запрос.");
        }
        $product = (new ProductRepository())->getOne($id);
        if (is_null($product)) {
            throw new GetOneException ("Неверный запрос.");
        }
        $class_name = $this->getclass();
        echo $this->render($class_name . '/card', ['product' => $product]);
    }
}