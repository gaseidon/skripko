<?
include 'nav.php';
include '../php/cataloge_get.php';
?>

<link rel="stylesheet" href="\css\cataloge.css">

<body>
    <main>
        <div class="container">
            <div class="filtration">
                <a class="reset" href="#sort-default">Все</a>
                <a href="#sort-alpha">По алфавиту</a>
                <a href="#sort-price">По цене</a>
                <a href="#sort-date">По дате</a>
                <select name="taskOption">
                    <option value="default">Выберите категорию</option>
                    <? foreach ($category as $categ): ?>
                        <option value="<?= $categ['id'] ?>">
                            <?= $categ['name'] ?>
                        </option>
                    <? endforeach; ?>
                </select>
            </div>

            <?
            include __DIR__ . '/cataloge_products.php';
            ?>

        </div>
    </main>
</body>

<script src="/js/cataloge.js"></script>