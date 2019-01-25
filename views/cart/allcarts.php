<h3>Корзина</h3>
<?php if (empty($cart)): ?>
    <div>Корзина пуста</div>
<?php else: ?>
    <?php foreach ($cart as $item): ?>
        <div><?= $item['product']->name ?> :
            <?= $item['count'] ?>

            <a href="/cart/delete?id=<?= $item['product']->id ?>">Удалить</a>
            <!--<button data-id="<?= $item['product']->id ?>" id='delete_from_cart'>Удалить</button>-->

        </div>
    <?php endforeach; ?>

    <a href="/order/addorder">Оформить заказ</a>
    <!--<button id='add_order'>Оформить заказ</button>-->

<?php endif; ?>

<script>
    $(function () {
        $("#delete_from_cart").on('click', function () {
            let id = $(this).data('id');
            $.ajax({
                url: "/cart/delete",
                type: "GET",
                data: {
                    id: id
                },
                success: function (response) {
                    response = JSON.parse(response);
                    if (response.success == "ok") {
                        alert(response.message);
                    }
                }
            })
        });
    });

    $(function () {
        $("#add_order").on('click', function () {
            $.ajax({
                url: "/order/addorder",
                success: function (response) {
                    response = JSON.parse(response);
                    if (response.success == "ok") {
                        alert(response.message);
                    }
                }
            })
        });
    });
</script>