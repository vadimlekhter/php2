<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 17.01.2019
 * Time: 18:58
 */

namespace app\interfaces;


interface IContentRenderer
{
    public function renderContent ($content, $layout);
}