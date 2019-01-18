<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 14.01.2019
 * Time: 14:04
 */

namespace app\controllers;

use app\models\User;

class UserController extends Controller
{
    public function actionIndex()
    {
        $product = User::getAll();
        $this->useLayout = false;
        $content ='';
        foreach ($product as $item) {
            //$content .= $this->render($_GET['c'].'/allusers', ['user' => $item]);
            $content .= $this->render($_GET['c'].'/allusers_twig.html', ['user' => $item]);
        }
        $this->contentRenderer->renderContent($content, $this->layout);
    }

    public function actionOneuser()
    {
        $id = $_GET['id'];
        $user = User::getOne($id);
        echo $this->render($_GET['c'].'/oneuser', ['user' => $user]);
    }
}