<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/reg_auth.css">
    <link rel="stylesheet" href="/css/fonts.css">
    <title>Авторизация</title>
</head>

<?php
session_start();
?>

<body>
    <form id="authform" onsubmit="return false" method="post">
        <span>Авторизация</span>
        <p id="alert"> Неверный логин или пароль</p>
        <input id="login_auth" class="input" type="text" name="login_auth" placeholder="Введите логин" required>
        <input id="pas_auth" class="input" type="password" name="pas_auth" placeholder="Введите пароль" required>
        <input id="submit_auth" class="btn" type="submit" value="Авторизоваться">
        <div class="form_el">
            <span>Нет аккаунта? <a href="reg.php">Зарегистрироваться</a> </span>
        </div>
    </form>
</body>

</html>
<script src="/js/jquery.js"></script>
<script src="/js/reg.js"></script>