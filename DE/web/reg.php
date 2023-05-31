<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/reg_auth.css">
    <link rel="stylesheet" href="/css/fonts.css">
    <title>Регистрация</title>
</head>

<body>
    <form id="regform" onsubmit="return false" method="post">
        <span>Регистрация</span>
        <p id="name">Разрешены только русские буквы</p>
        <input id="name_input" class="input" type="text" name="name" placeholder="Введите имя" required>
        <p id="surname">Разрешены только русские буквы</p>
        <input id="surname_input" class="input" type="text" name="surname" placeholder="Введите фамилию" required>
        <p id="patronymic">Разрешены только русские буквы</p>
        <input id="patronymic_input" class="input" type="text" name="patronymic" placeholder="Введите отчество"
            title="Необязательное поле">
        <p id="login">Разрешены только латинские буквы, цифры, тире</p>
        <p id="login_taken">Логин занят</p>
        <input id="login_input" class="input" type="text" name="login" placeholder="Введите логин" required>
        <input id="email_input" class="input" type="email" name="email" placeholder="Введите почту" required>
        <p id="pas">Минимальная длинна 6 символов</p>
        <input id="pas_input" class="input" type="password" name="pas" placeholder="Введите пароль" required>
        <p id="pas_rep">Пароли не совпадают</p>
        <input id="pas_rep_input" class="input" type="password" name="pas_rep" placeholder="Повторите пароль" required>
        <div class="form_el">
            <span>Вы согласны с правилами регистрации?</span><input type="checkbox" required>
        </div>
        <input class="btn" type="submit" value="Зарегистрироваться">
        <div class="form_el">
            <span>Уже есть аккаунт? <a href="auth.php">Авторизоваться</a> </span>
        </div>
    </form>
</body>

</html>

<script src="/js/jquery.js"></script>
<script src="/js/reg.js"></script>