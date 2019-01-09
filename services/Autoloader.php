<?php

namespace app\services;

class Autoloader
{

    public function loadClass($className)
    {
        $filename = $_SERVER['DOCUMENT_ROOT'] . preg_replace('/^(.*?)\\\\/', '/../', $className) . ".php";
        $filename = str_replace('\\', '/', $filename);
        if (file_exists($filename))
            include $filename;
        //var_dump(get_included_files());
    }
}