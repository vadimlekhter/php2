<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 21.01.2019
 * Time: 16:49
 */

namespace app\models\repositories;


use app\models\User;

class UserRepository extends Repository
{
    public function getTableName(): string
    {
        return 'users';
    }

    public function getRecordClass()
    {
        return User::class;
    }

    public function checkUser($login)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE login = :login";
        return $this->find($sql, [":login" => $login])[0];
    }

}