<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 14.01.2019
 * Time: 14:04
 */

namespace app\controllers;

use app\base\App;
use app\models\User;
use app\models\repositories\UserRepository;
class UserController extends Controller
{
    public function actionIndex()
    {
        /*$user = (new UserRepository())->getAll();
        $str = get_class($this);
        $class_name = strtolower(str_replace('Controller', '', end(explode('\\', $str))));
        echo $this->render($class_name . '/allusers', ['user' => $user]);*/
    }

    /*public function actionOneuser()
    {
        $id = (App::call()->request)->getParams()['id'];
        if (is_null($id) || !is_numeric($id)) {
            throw new GetOneException ("Неверный запрос.");
        }
        $user = (new UserRepository())->getOne($id);
        if (is_null($user)) {
            throw new GetOneException ("Неверный запрос.");
        }
        $str = get_class($this);
        $class_name = strtolower(str_replace('Controller', '', end(explode('\\', $str))));
        echo $this->render($class_name . '/oneuser', ['user' => $user]);
    }*/


    public function actionNewuserpage () {
        $class_name = $this->getclass();
        echo $this->render($class_name . '/newuserpage', []);
    }

    public function actionCheckuserpage () {
        $class_name = $this->getclass();
        echo $this->render($class_name . '/checkuserpage', []);
    }

    public function actionNewuser ()
    {
        $request = App::call()->request;
        if ($request->isPost()) {
            $login = $request->getParams()['login'];
            $password = $request->getParams()['password'];
            $name = $request->getParams()['name'];
            $email = $request->getParams()['email'];
            $address = $request->getParams()['address'];
            $phone = $request->getParams()['phone'];
            (new User())->add($login, $password, $name, $email, $address, $phone);
        }
    }

    public function actionCheckuser () {
        $request = App::call()->request;
        if ($request->isPost()) {
            $name = $request->getParams()['login'];
            $password = $request->getParams()['password'];
            (new User())->check($name, $password);
        }
    }

    public function actionExituser () {
        (new User())->exit();
        header("Location: /");
    }
}