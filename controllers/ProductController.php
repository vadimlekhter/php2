<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 12.01.2019
 * Time: 19:49
 */

namespace app\controllers;

use app\models\Product;

class ProductController extends Controller
{
    public function actionIndex()
    {
        $product = Product::getAll();
        $this->useLayout = false;
        $content ='';
        foreach ($product as $item) {
            //$content .= $this->render('product/catalog', ['product' => $item]);
            $content .= $this->render('/product/catalog_twig.html', ['product' => $item]);
        }
        $this->contentRenderer->renderContent($content, $this->layout);
    }

    public function actionCard()
    {
        $id = $_GET['id'];
        $product = Product::getOne($id);
        echo $this->render($_GET['c'].'/card', ['product' => $product]);
    }
}