<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div class="header">Это Хедер
    <a href="/">Каталог</a>
    <a href="/user/checkuserpage">Войти</a>
    <a href="/user/newuserpage">Регистрация</a>
    <a href="/user/exituser">Выйти</a>
    <a href="/cart/">Корзина</a>
    <a href="/order/">Заказ</a>
</div>
<div class="container">
    <?=$content?>
</div>
<div class="footer">Это футер</div>
</body>
</html>