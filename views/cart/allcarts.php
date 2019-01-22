<?php   /** @var \app\models\Cart $cart */?>
<?php foreach ($cart as $item): ?>
<span><?=$item->id?></span>
<span><?=$item->user_id?></span>
<span><?=$item->good_id?></span>
<hr>
<?php endforeach ?>