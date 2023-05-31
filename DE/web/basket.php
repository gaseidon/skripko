<?

include '../controllers/connect.php';
session_start();
include 'nav.php';
?>

<link rel="stylesheet" href="/css/basket.css">

<main class="main">

    <?

    include __DIR__ . '/modal_basket.php';

    ?>

</main>


<script src="/js/cataloge.js"></script>