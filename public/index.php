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

include '../services/Autoloader.php';
include '../config/main.php';
spl_autoload_register([new Autoloader(), 'loadClass']);

$product = new Product(Db::getInstance());

$user = new User(Db::getInstance());

$order = new Order(Db::getInstance());

$feedback = new Feedback(Db::getInstance());

$brand = new Brand(Db::getInstance());

$designer = new Designer(Db::getInstance());

$category = new Category(Db::getInstance());

$color = new Color(Db::getInstance());

$size = new Size (Db::getInstance());


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
$user->login = 'jim';
$user->password = 'jim';
$user->name = 'Jim Beam';
$user->email = 'j@j.ru';
$user->address = 'Paris';
$user->phone = '+33(333)333-33-33';
$user->insert();*/

/*$product->id = 5;
$product->category = 2;
$product->brand = 2;
$product->designer = 2;*/
//$product->update();

//$product->delete(6);
//var_dump($product->getOne(1));

$size->size = 'XXXL';
$size->insert();
var_dump($size->getAll());