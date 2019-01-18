<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 17.01.2019
 * Time: 16:44
 */

namespace app\interfaces;


interface IRenderer
{
    public function render($template, $params = []);
}