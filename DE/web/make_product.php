<?
include 'nav.php';
include '..\controllers\connect.php';
$stmt = $conn->prepare("SELECT * FROM category");
$stmt->execute();
$category = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="/css/make_prod.css">


<body>
    <main>
        <form class="upload" action="/php/add_prod.php" method="POST" enctype="multipart/form-data">
            <h5>Создание продукта</h5>
            <input type="text" id="name" name="name" placeholder="Введите название">
            <input type="text" id="count" name="count" placeholder="Введите количество">
            <input type="text" id="price" name="price" placeholder="Введите цену">
            <select id="category" name="taskOption">
                <option value="default">Выберите категорию</option>
                <? foreach ($category as $categ): ?>
                    <option value="<?= $categ['id'] ?>">
                        <?= $categ['name'] ?>
                    </option>
                <? endforeach; ?>
            </select>
            <span>Выберите изображение:</span>
            <input accept="image/png, image/jpg, image/jpeg" type="file" name="fileToUpload" id="fileToUpload">
            <input data-id="" class="submit_btn" type="submit" value="Загрузить" name="submit">
        </form>
    </main>
</body>
<script src="/js/cataloge.js"></script>