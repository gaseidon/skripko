<div class="container">
    <? $i = 0;
    if (!empty($_SESSION['cart'])):
        foreach ($_SESSION['cart'] as $item):
            $id = array_keys($_SESSION['cart'])[$i];
            ?>
            <div class="prods" data-id="<?= $id ?>">
                <div class="name">
                    <?= $item['name'] ?>
                </div>
                <div class="count_add">Добавить</div>
                <div class="count">
                    <?= $item['count'] ?>
                </div>
                <div class="count_min">Убавить</div>
            </div>
            <? $i++;
        endforeach; ?>
        <input class="submit_yes" type="submit" value="Подтвердить">
        <!-- <input type="password" name="pas" class="password" id=""> -->
    <? else: ?>
        <div class="empty">
            <p>Корзина пуста</p>
        </div>
    <? endif; ?>

    <form onsubmit="return false" class="form_pas" method="post">
        <input class="password" type="password" name="pas" placeholder="Введите пароль для подтверждения">
        <input class="submit" type="submit" value="Оформить заказ">
    </form>

</div>