<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 23.01.2019
 * Time: 20:23
 */

namespace app\services;


class Session
{
    /**
     * Session constructor.
     */
    public function __construct()
    {
        session_start();
    }

    public function get($key)
    {
        return $_SESSION[$key];
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function delete ($key) {
        unset($_SESSION[$key]);
    }
}