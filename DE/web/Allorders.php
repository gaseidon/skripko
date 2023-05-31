<?
include __DIR__ . '/nav.php';
include '../controllers/connect.php';
session_start();

$stmt = $conn->prepare("SELECT * FROM orders ORDER BY order_id DESC");
$stmt->execute();
$stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);

$users = $conn->prepare("SELECT * FROM users");
$users->execute();
$users = $users->fetchAll(PDO::FETCH_ASSOC);
?>

<link rel="stylesheet" href="/css/order.css">

<body>
    <main>
        <div class="container">
            <div class="filtration">
                <a class="reset" href="#sort-default">Все</a>
                <select name="taskOption">
                    <option value="default">Выберите категорию</option>
                    <option value="Новый">
                        Новые
                    </option>
                    <option value="Отклонён">
                        Отклонённые
                    </option>
                    <option value="Подтверждён">
                        Подтверждённые
                    </option>

                </select>
            </div>
        </div>
        <div class="products">
            <?

            include __DIR__ . '/Allorders_orders.php';

            ?>
        </div>
    </main>
</body>

<script src="/js/cataloge.js"></script>