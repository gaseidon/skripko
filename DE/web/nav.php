<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/fonts.css">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/nav.css">
</head>
<?
session_start();

// if ($_SESSION['role'] != 'admin') {
//     header('location:index.php');
// }
?>

<nav>

    <ul>
        <li><a href="index.php">
                <picture><img src="/img/logo.png" alt="logo"></picture>
            </a></li>
        <li><a href="index.php">О нас</a></li>
        <li><a href="cataloge.php">Каталог</a></li>
        <li><a href="contacts_page.php">Где нас найти?</a></li>
        <?php if ($_SESSION['role'] == 'admin'): ?>
            <li class="admin">Админ панель
                <ul id="dropdown">
                    <li class="dropdown-content"><a href="make_product.php"> Создать товары</a></li>
                    <li class="dropdown-content"><a href="Allorders.php"> Просмотреть все заказы</a></li>
                    <li class="dropdown-content"><a href="make_category.php"> Создать/Удалить категорию</a></li>
                </ul>
            </li>
        <?php endif; ?>
        <?php if (empty($_SESSION['role'])): ?>
            <li><a href="reg.php">Регистрация</a></li>
            <li><a href="auth.php">Вход</a></li>
        <?php endif; ?>
        <?php if ($_SESSION['role'] == 'user' || $_SESSION['role'] == 'admin'): ?>
            <li><a href="basket.php">Корзина</a></li>
            <li><a href="orders.php">Мои заказы</a></li>
            <li><a href="/controllers/exit.php">Выход</a></li>
        <?php endif; ?>
    </ul>

</nav>

<script src="/js/nav.js"></script>
<script src="/js/jquery.js"></script>