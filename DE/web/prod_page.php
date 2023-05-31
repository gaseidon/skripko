<?
include 'nav.php';
include '..\controllers\connect.php';
session_start();
$stmt_cat = $conn->prepare("SELECT * FROM category");
$stmt_cat->execute();
$category = $stmt_cat->fetchAll(PDO::FETCH_ASSOC);
$id = trim(urldecode($_GET['id']));
$stmt_prod = $conn->prepare("SELECT * FROM prod WHERE id = $id");
$stmt_prod->execute();
$products = $stmt_prod->fetch(PDO::FETCH_ASSOC);
?>

<link rel="stylesheet" href="/css/prod_page.css">

<body>
    <main>
        <? if ($_SESSION['role'] != 'admin'): ?>
            <div class="container">
                <picture><img src="<?= $products['image_path'] ?>" alt="<?= $products['image'] ?>"></picture>
                <div class="block_info">
                    <div class="name">Название:
                        <?= $products['name'] ?>
                    </div>
                    <div class="price">Цена:
                        <?= $products['price'] ?> Руб.
                    </div>
                    <? foreach ($category as $categ): ?>
                        <? if ($products['category_id'] == $categ['id']): ?>
                            <div class="category">Категория:
                                <?= $categ['name'] ?>
                            </div>
                        <? endif; ?>
                    <? endforeach; ?>
                    <? if ($_SESSION['role'] == 'user'): ?>
                        <input class="cart" type="submit" value="В корзину" data-id="<?= $products['id'] ?>">
                    <? endif; ?>
                    <input type="submit" value="Назад" onclick="history.back()">
                </div>
            </div>
        <? endif; ?>
        <div class="message">
            <?= (isset($_GET['message'])) ? $_GET['message'] : "" ?>
        </div>
        <? if ($_SESSION['role'] == 'admin'): ?>
            <div class="container">
                <picture><img id="image" src="<?= $products['image_path'] ?>" alt="<?= $products['image'] ?>"></picture>
                <div class="block_info">
                    <div hidden class="name">Название:
                        <?= $products['name'] ?>
                    </div>
                    <div hidden class="price">Цена:
                        <?= $products['price'] ?> Руб.
                    </div>
                    <? foreach ($category as $categ): ?>
                        <? if ($products['category_id'] == $categ['id']): ?>
                            <div hidden class="category">Категория:
                                <?= $categ['name'] ?>
                            </div>
                        <? endif; ?>
                    <? endforeach; ?>
                    <span>Название:</span>
                    <input type="text" name="name" id="name" value="<?= $products['name'] ?>">
                    <span>Цена:</span>
                    <input type="text" name="price" id="price" value="<?= $products['price'] ?>">
                    <span>Количество:</span>
                    <input type="text" name="count" id="count" value="<?= $products['count'] ?>">
                    <span>Категория:</span>
                    <select id="category" name="taskOption">

                        <? foreach ($category as $categ): ?>
                            <? if ($products['category_id'] == $categ['id']): ?>
                                <option value="<?= $categ['id'] ?>">
                                    <?= $categ['name'] ?>
                                </option>
                            <? endif; ?>
                        <? endforeach; ?>
                        <? foreach ($category as $categ): ?>
                            <option value="<?= $categ['id'] ?>">
                                <?= $categ['name'] ?>
                            </option>
                        <? endforeach; ?>
                    </select>
                    <span>Выберите изображение:</span>
                    <input type="file" multiple="multiple" accept="image/png, image/jpg, image/jpeg" id="fileToUpload">
                    <input type="submit" value="Назад" onclick="history.back()">
                    <input class="change_btn" name="submit" type="submit" value="Изменить" data-id="<?= $products['id'] ?>">
                    <input class="cart" type="submit" value="В корзину" data-id="<?= $products['id'] ?>">
                </div>
            </div>
        <? endif; ?>
    </main>
</body>

<script src="/js/cataloge.js"></script>