<?php

use \app\models\Product;
use \app\models\User;
use \app\models\Order;
use \app\models\Feedback;
use \app\models\Brand;
use \app\models\Category;
use \app\models\Designer;
use \app\models\Color;
use \app\models\Size;
use \app\services\Db;
use \app\services\Autoloader;
use \app\controllers\Controller;

include '../services/Autoloader.php';
include '../config/main.php';
spl_autoload_register([new Autoloader(), 'loadClass']);

$controllerName = $_GET['c']?: DEFAULT_CONTROLLER;
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE.ucfirst($controllerName).'Controller';

if (class_exists($controllerClass)) {
    $controller = new $controllerClass;
    $controller->runAction($actionName);
}



//$product = new Product();

//$user = new User();

/*$order = new Order();

$feedback = new Feedback();

$brand = new Brand();

$designer = new Designer();

$category = new Category();

$color = new Color();

$size = new Size ();

/*$color->color = "Белый";
$color->insert();
$color->color = "Черный";
$color->insert();
$color->color = "Зеленый";
$color->insert();
$color->color = "Коричневый";
$color->insert();*/

//$color->color = "Серый";
//$color->insert();


/*$size->size = "XS";
$size->insert();
$size->size = "S";
$size->insert();
$size->size = "M";
$size->insert();
$size->size = "L";
$size->insert();
$size->size = "XL";
$size->insert();
$size->size = "XXL";
$size->insert();*/


/*$designer->designer = "CK";
$designer->insert();
$designer->designer = "Gucci";
$designer->insert();*/

/*$brand->brand = "CK";
$brand->insert();
$brand->brand= "Gucci";
$brand->insert();*/


/*$product->name = 'Куртка';
$product->description = 'Куртка женская зимняя';
$product->category = 'Женская верхняя одежда';
$product->brand = 'Guess';
$product->designer = 'Guess';
$product->image_1 = '/.../';
$product->image_2 = '/.../';
$product->image_3 = '/.../';
$product->price = 350.00;

$product->insert();*/

/*$user = new User(Db::getInstance());
$user = $user->getOne(6);
$user->login = 'jim';
$user->password = 'jim';
$user->name = 'Jim Beam';
$user->email = 'j@j.ru';
$user->address = 'Roma';
$user->phone = '+33(333)333-33-33';
$user->save();*/

/*$product->id = 3;
$product = $product->getOne(2);
var_dump($product);
$product->brand = 2;
$product->designer = 1;
$product->update();*/

//$product->delete(6);
//var_dump($product->getOne(1));


//var_dump($size->getOne(3));
//$product = $product->getOne(5);
//var_dump($product);
//$product->delete();
//$user = $user->getOne(4);
//$user->delete();
//var_dump($user->getAll());

//var_dump($user::getOne(1));