<?php /** @var \app\models\User $user */  ?>
<?php foreach ($user as $item): ?>
<p><?=$item->id?></p>
<h3>Login: <?=$item->login?></h3>
<p>Name: <?=$item->name?></p>
<p>E-mail: <?=$item->email?></p>
<p>Address: <?=$item->address?></p>
<p>Phone: <?=$item->phone?></p>
<hr>
<?php endforeach ?>