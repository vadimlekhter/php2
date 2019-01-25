<?php /** @var \app\models\Product $product */ ?>
<?php foreach ($product as $item): ?>
    <h2><?= $item->name ?></h2>
    <p><?= $item->description ?></p>
    <p>Price: <?= $item->price ?></p>
    <a href="/product/card/?id=<?=$item->id?>">К товару</a>
    <hr>
<?php endforeach ?>