<?
// include 'nav.php';
include '..\controllers\connect.php';
$stmt_prod = $conn->prepare("SELECT * FROM prod ORDER BY id DESC LIMIT 5");
$stmt_prod->execute();
$products = $stmt_prod->fetchAll(PDO::FETCH_ASSOC);
?>


<link rel="stylesheet" href="/css/slider.css">

<div class="wrapper">
    <? foreach ($products as $prod): ?>
        <picture><img src="<?= $prod['image_path'] ?>" alt="<?= $prod['image'] ?>"></picture>
    <? endforeach; ?>
    <button class="btn btn-left">left</button>
    <button class="btn btn-right">right</button>
</div>



<script src="/js/slider.js"></script>