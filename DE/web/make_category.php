<link rel="stylesheet" href="/css/make.css">
<title>Категории</title>

<?
include 'nav.php';
include '..\controllers\connect.php';
$stmt = $conn->prepare("SELECT * FROM category");
$stmt->execute();
$category = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
    <main>
        <form action="/php/make_categ.php" method="post">
            <div class="make">
                <span>Создание категории</span>
                <input type="text" name="name" placeholder="Введите название">
                <button type="submit">Создать категорию</button>
            </div>
        </form>
        <form action="/php/del_categ.php" method="post">
            <div class="delete">
                <span>Удаление категории</span>
                <select name="taskOption">
                    <option value="default">Выберите категорию</option>
                    <? foreach ($category as $categ): ?>
                        <option value="<?= $categ['id'] ?>">
                            <?= $categ['name'] ?>
                        </option>
                    <? endforeach; ?>
                </select>
                <button type="submit" name="submit">Удалить категорию</button>
            </div>
        </form>
    </main>
</body>