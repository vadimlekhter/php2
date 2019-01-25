<?php   /** @var \app\models\Product $product */?>
<h1><?=$product->name?></h1>
<p><?=$product->description?></p>
<p>Price: <?=$product->price?></p>

<form action="/cart/add" method="post">
    <input type="hidden" name="id" value="<?=$product->id?>">
    <input type="text" id='qty_input' name="qty">
    <input type="submit"  value="Добавить">
</form>

<!--<div>
<input type="text" id='qty_input'>
<button data-id="<?=$product->id?>" id='add_to_cart'>Добавить в корзину</button>
</div>-->


<script>
    $(function() {
        $("#add_to_cart").on('click', function(){
            let id =$(this).data('id');
            let qty = $('#qty_input').val();
            $.ajax ({
                url: "/cart/add",
                type: "POST",
                data: {
                    id: id,
                    qty: qty
                },
                success: function (response) {
                    response = JSON.parse(response);
                    if(response.success=="ok") {
                        alert(response.message);
                    }
                }
            })
        });
    });
</script>