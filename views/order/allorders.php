<?php   /** @var \app\models\Order $order */?>
<?php foreach ($order as $item): ?>
<span><?=$item->id?></span>
<span><?=$item->user_id?></span>
<span><?=$item->session_id?></span>
<span><?=$item->good_id?></span>
<span><?=$item->color?></span>
<span><?=$item->size?></span>
<span><?=$item->count?></span>
<span><?=$item->shipping?></span>
<hr>
<?php endforeach ?>