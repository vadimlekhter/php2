<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 27.01.2019
 * Time: 15:39
 */

class DbTest extends \PHPUnit\Framework\TestCase
{
    public function testGetConnection()
    {
        $driver = 'mysql';
        $host= 'localhost';
        $login = 'root';
        $password = '';
        $database = 'proekt_oop';
        $charset = 'utf8';

        $db = new \app\services\Db($driver, $host, $login, $password, $database, $charset);
        $result = $db->getConnection();
        $this->assertTrue($result == true);
    }
}