<?php

namespace app\models;


class User extends Record
{
    public $id;
    public $name;
    public $login;
    public $password;
    public $email;
    public $address;
    public $phone;

    public static function getTableName():string
    {
        return 'users';
    }
}