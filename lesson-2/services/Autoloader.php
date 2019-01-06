<?php

namespace app\services;

class Autoloader
{

    public function loadClass($className)
    {
        $filename = $_SERVER['DOCUMENT_ROOT'] . preg_replace('/^(.*?)\\\\/', '/../', $className) . ".php";
        include $filename;
        //var_dump(get_included_files());
    }
}