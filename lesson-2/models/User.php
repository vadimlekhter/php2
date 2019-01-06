<?php

namespace app\models;


class User extends Model
{
    public $id_user;
    public $login;
    public $password;
    public $email;
    public $address;
    public $phone;

    public function getTableName():string
    {
        return 'users';
    }
}