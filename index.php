<?php

echo "<br><br>";
echo "Задание 1-4";
echo "<br><br>";

class Product
{
    public function __construct($id = null, $name = null, $image = null, $description = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        $this->description = $description;
    }

    protected static $brand = "My Shop";

    public function display()
    {
        echo $this->displayBrand();
        echo $this->displayName();
        echo $this->displayImage();
        echo $this->displayDescription();
    }

    protected static function displayBrand()
    {
        echo "<hr>";
        return self::$brand;
    }

    protected function displayName()
    {
        return "<h3>Наименование: {$this->name}</h3>";
    }

    protected function displayImage()
    {
        return "<h2>{$this->image}</h2>";
    }

    protected function displayDescription()
    {
        return "<span>Описание: {$this->description}</span><br><br>";
    }


}

class ProductPriceCountTotal extends Product
{
    public function __construct($id = null, $name = null, $image = null, $description = null, $price = null, $count = null)
    {
        parent::__construct($id, $name, $description, $image);
        $this->price = $price;
        $this->count = $count;
        $this->sum = $this->price * $this->count;
    }

    protected static $brand = "My Shop";

    public function display()
    {
        parent::display();
        echo $this->displayPrice();
        echo $this->displayCount();
        echo $this->displaySum();
    }


    protected function displayPrice()
    {
        return "<span>Цена: {$this->price} руб.</span><br><br>";
    }

    protected function displayCount()
    {
        return "<span>Количество: {$this->count}</span><br><br>";
    }

    protected function displaySum()
    {
        return "<span>Итого: {$this->sum} руб.</span>";
    }
}


$item = new Product(1, 'iPhone', 'Фото', 'iPhone X 128MB');
$item->display();

$itemPriceCountTotal = new ProductPriceCountTotal(1, 'iPhone', 'Фото', 'iPhone X 128MB', 60000, 53);
$itemPriceCountTotal->display();

echo "<hr>";
echo "<br>";
echo "Задание 5";
echo "<br><br>";
echo "Выводится 1 2 3 4, так как переменная х статическая, она принадлежит классу, а не объектам, поэтому при каждом
вызове функции foo из любого объекта будет происходить увеличение значения переменной х на 1. При первом вызове выводится 1,
так как оператор инкремента стоит перед значением переменной, а не после.";
echo "<br><br>";

class A
{
    public function foo()
    {
        static $x = 0;
        echo ++$x;
    }
}

$a1 = new A();
$a2 = new A();
$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();

echo "<hr>";
echo "<br>";
echo "Задание 6";
echo "<br><br>";
echo "Выводится 1 1 2 2, так как класс С является потомком класса В и при вызове функции foo из их объектов переменная х
меняет своё значение в каждом из классов отдельно друг от друга. Другими словами переменая х в классе В и переменная х
 в классе С это две разные, не связанные между собой переменные.";
echo "<br><br>";

class B
{
    public function foo()
    {
        static $x = 0;
        echo ++$x;
    }
}

class C extends B
{
}

$b1 = new B();
$c1 = new C();
$b1->foo();
$c1->foo();
$b1->foo();
$c1->foo();

echo "<hr>";
echo "<br>";
echo "Задание 7";
echo "<br><br>";
echo "Выводится 1 1 2 2, так же, как и в предыдущем примере. Отличие этих примеров в том, что в данном случае 
после названия класса нет скобок, то есть нет передаваемых данных, но так как внутри класса нет функции-конструктора
 и динамических свойств, это ни на что не влияет и переменная х принимает те же значения, что и в задании 6.";
echo "<br><br>";

class D
{
    public function foo()
    {
        static $x = 0;
        echo ++$x;
    }
}

class E extends D
{
}

$d1 = new D;
$e1 = new E;
$d1->foo();
$e1->foo();
$d1->foo();
$e1->foo();