<?
include '../php/cataloge_get.php';
?>


<div class="products">
    <? foreach ($products as $prod): ?>
        <div class="prod_block" data-category="<?= $prod['category_id'] ?>">
            <a href="prod_page.php?id=<? echo urlencode($prod['id']) ?>">
                <picture><img src="<?= $prod['image_path'] ?>" alt="<?= $prod['image'] ?>"></picture>
            </a>
            <div class="name">
                <a href="prod_page.php?id=<? echo urlencode($prod['id']) ?>">
                    <?= $prod['name'] ?>
                </a>
            </div>
            <div class="price">
                <?= $prod['price'] ?> Руб.
            </div>
            <div class="date">
                <? $time = strtotime($prod['date']);
                $time = date('Y.m.d', $time);
                echo $time; ?>
            </div>
            <input class="cart" type="submit" value="В корзину" data-id="<?= $prod['id'] ?>">
        </div>
    <? endforeach; ?>
</div>