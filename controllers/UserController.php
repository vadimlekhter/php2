<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 14.01.2019
 * Time: 14:04
 */

namespace app\controllers;

use app\models\repositories\UserRepository;
use app\services\Request;
class UserController extends Controller
{
    public function actionIndex()
    {
        $user = (new UserRepository())->getAll();
        echo $this->render((new Request())->getControllerName() . '/allusers', ['user' => $user]);
    }

    public function actionOneuser()
    {
        $id = (new Request())->getParams()['id'];
        if (is_null($id)) {
            throw new GetOneException ("Неверный запрос");
        }
        $user = (new UserRepository())->getOne($id);
        echo $this->render((new Request())->getControllerName() . '/oneuser', ['user' => $user]);
    }
}