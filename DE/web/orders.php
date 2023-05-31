<?
include __DIR__ . '/nav.php';
include '../controllers/connect.php';
session_start();

$stmt = $conn->prepare("SELECT * FROM orders WHERE user_id = :user_id");
$stmt->execute(['user_id' => $_SESSION['user_id']]);

?>

<link rel="stylesheet" href="/css/order.css">

<body>
    <main>
        <? foreach ($stmt as $item): ?>

            <div class="order_block">
                <span id="votes_number" hidden></span>
                <div class="order_detail">
                    <?= $item['order_detail'] ?>
                </div>
                <div class="order_status">
                    <?= $item['status'] ?>
                </div>
                <? if ($item['status'] == 'Новый'): ?>
                    <form onsubmit="return false" method="post">

                        <input data-id="<?= $item['order_id'] ?>" class="order_del" type="submit" value="Удалить">

                    </form>
                <? endif; ?>
                <div class="order_reason">
                    Причина:
                    <?= $item['reason'] ?>
                </div>
            </div>

        <? endforeach ?>
    </main>
</body>

<script src="/js/cataloge.js"></script>