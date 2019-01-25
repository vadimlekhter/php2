<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 24.01.2019
 * Time: 18:12
 */

namespace app\base;


class Storage
{
    private $items = [];

    public function set($key, $object)
    {
        $this->items[$key] = $object;
    }

    public function get($key)
    {
        if (!isset($this->items[$key])) {
            $this->items[$key] = App::call()->createComponent($key);
        }
        return $this->items[$key];
    }
}