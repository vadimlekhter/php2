<?php

namespace app\models;

use app\models\repositories\UserRepository;
use app\services\Db;
use app\services\Session;

class User extends Record
{
    public $id;
    public $name;
    public $login;
    public $password;
    public $email;
    public $address;
    public $phone;

    /**
     * User constructor.
     * @param $id
     * @param $name
     * @param $login
     * @param $password
     * @param $email
     * @param $address
     * @param $phone
     */
    public function __construct($id = null, $name = null, $login = null, $password = null, $email = null, $address = null,
                                $phone = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->address = $address;
        $this->phone = $phone;
    }

    public function add($login, $password, $name, $email, $address, $phone)
    {
        $session = new Session();
        $session->delete('userid');
        $session->delete('cart');
        session_regenerate_id();

        $user = new User();

        $user->login = $login;
        $user->password = hash('md5', $password);
        $user->name = $name;
        $user->email = $email;
        $user->address = $address;
        $user->phone = $phone;

        $userAdd = new UserRepository();

        $result = $userAdd->checkUser($user->login);

        if (is_null($result)) {
            $id = $userAdd->save($user);

            $session->set('userid', $id);

            echo "$login успешно зарегистрирован, переход в <a href=\"/\">Каталог</a>";
        } else echo "Такой логин уже существует, переход в <a href=\"/\">Каталог</a>";
    }

    public function check($login, $password)
    {
        $session = new Session();
        $session->delete('userid');
        $session->delete('cart');
        session_regenerate_id();

        $user = new User();
        $user->login = $login;

        $userCheck = new UserRepository();
        $result = $userCheck->checkUser($user->login);

        if ($result->login == $login && $result->password == hash('md5', $password)) {
            echo "Добро пожаловать, {$result->name}, переход в <a href=\"/\">Каталог</a>";
            $session = new Session();
            $session->set('userid', $result->id);
        } else {
            echo "Неверный логин или пароль, переход в <a href=\"/\">Каталог</a>";
        }
    }

    public function exit()
    {
        $session = new Session();
        $session->delete('userid');
        $session->delete('cart');
        session_regenerate_id();
    }
}