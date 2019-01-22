<?php

use \app\models\Product;
use \app\models\repositories\CartRepository;
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


require '../vendor/autoload.php';

$request = new \app\services\Request();

$controllerName = $request->getControllerName() ?: DEFAULT_CONTROLLER;
$actionName = $request->getActionName();

$controllerClass = CONTROLLER_NAMESPACE.ucfirst($controllerName).'Controller';

if (class_exists($controllerClass)) {

    $controller = new $controllerClass(
        new \app\services\renderers\TemplateRenderer()
    );

    /*$controller = new $controllerClass(
        new \app\services\renderers\TwigRenderer()
    );*/

    $controller->runAction($actionName);
} else {
    header('Location: http:/error_404.php');
}



//$product = new Product();
/*
$cart = new CartRepository();
$record->id = null;
$record->user_id = 2;
$record->good_id = 2;

var_dump($record);

$cart->insert($record);*/

//$user = new User();

//$order = new Order();

//$feedback = new Feedback();

//$brand = new Brand();

//$designer = new Designer();

//$category = new Category();

//$color = new Color();

//$size = new Size ();

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

//$designer->id = null;
//$designer->designer = "CK";
//$designer->insert();

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
$product->brand = 2;
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