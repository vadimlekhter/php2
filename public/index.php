<?php

use \app\models\Product;
use \app\services\Db;
use \app\services\Autoloader;

include '../services/Autoloader.php';
include '../config/main.php';
spl_autoload_register([new Autoloader(), 'loadClass']);

$product = new Product(new Db());
var_dump($product);
