$(document).ready(function () {
    var reg_fio = /^[а-яА-ЯёЁ]+$/;
    var reg_login = /^[a-zA-Z0-9\-]+$/;
    var reg_password = /^[a-zA-Z0-9]{6,}$/;

    // Валидация имени
    $('#name_input').on('input', function () {
        if ($(this).val() != "") {
            var name = $(this).val();
            console.log(reg_fio.test(name));
            if (reg_fio.test(name) == false) {
                $('#name').addClass('alert');
                $(this).addClass('alert');
            } else {
                $('#name').removeClass('alert');
                $(this).removeClass('alert');
            }
        }

    });

    // Валидация фамилии
    $('#surname_input').on('input', function () {
        if ($(this).val() != "") {
            var surname = $(this).val();
            if (!reg_fio.test(surname)) {
                $('#surname').addClass('alert');
                $(this).addClass('alert');
            } else {
                $('#surname').removeClass('alert');
                $(this).removeClass('alert');
            }
        }
    });

    // Валидация отчества
    $('#patronymic_input').on('input', function () {
        if ($(this).val() != "") {
            var patronymic = $(this).val();
            if (patronymic && !reg_fio.test(patronymic)) {
                $('#patronymic').addClass('alert');
                $(this).addClass('alert');
            } else {
                $('#patronymic').removeClass('alert');
                $(this).removeClass('alert');
            }
        }
    });

    // Валидация логина
    $('#login_input').on('input', function () {
        if ($(this).val() != "") {
            var login = $(this).val();
            if (!reg_login.test(login)) {
                $('#login').addClass('alert');
                $(this).addClass('alert');
            } else {
                $('#login').removeClass('alert');
                $(this).removeClass('alert');
            }
        }
    });

    // Валидация пароля
    $('#pas_input').on('input', function () {
        if ($(this).val() != "") {
            var password = $(this).val();
            if (!reg_password.test(password)) {
                $('#pas').addClass('alert');
                $(this).addClass('alert');
            } else {
                $('#pas').removeClass('alert');
                $(this).removeClass('alert');
            }
        }
    });


    $('#regform').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '/php/regist.php',
            data: {
                name: $("#name_input").val(),
                surname: $('#surname_input').val(),
                patronymic: $('#patronymic_input').val(),
                login: $('#login_input').val(),
                email: $('#email_input').val(),
                password: $('#pas_input').val(),
                passwordCheck: $('#pas_rep_input').val(),
            },
            success: function (response) {
                console.log(response);
                var jsonData = JSON.parse(response);
                // user is registred successfully in the back-end 
                // let's redirect 
                if (jsonData.success == "1") {
                    location.href = '/web/auth.php';
                } else if (jsonData.success == "0") {
                    if ($('#pas_rep').hasClass('alert')) {
                        $('#pas_rep').removeClass('alert');
                        $('#pas_input').removeClass('alert');
                        $('#pas_rep_input').removeClass('alert');
                    } else {
                        $('#pas_rep').addClass('alert');
                        $('#pas_input').addClass('alert');
                        $('#pas_rep_input').addClass('alert');
                    }
                } else if (jsonData.success == "2") {
                    if ($('#login_taken').hasClass('alert')) {
                        $('#login_taken').removeClass('alert');
                        $('#login_input').removeClass('alert');
                    } else {
                        $('#login_taken').addClass('alert');
                        $('#login_input').addClass('alert');
                    }
                }
            }
        });
    });

    $('#submit_auth').on('click', function (e) {
        e.preventDefault();
        console.log(1);
        $.ajax({
            type: "POST",
            url: "/php/authr.php",
            data: {
                login: $('#login_auth').val(),
                password: $('#pas_auth').val(),
            },
            dataType: 'json',
            success: function (response) {
                console.log(response);
                var jsonData = response;
                console.log(jsonData);
                if (jsonData.success == "0") {
                    console.log('asdkljasld');
                    if ($('#alert').hasClass('alert')) {
                        $('#login_auth').removeClass('alert');
                        $('#pas_auth').removeClass('alert');
                        $('#alert').removeClass('alert');
                    } else {
                        $('#login_auth').addClass('alert');
                        $('#pas_auth').addClass('alert');
                        $('#alert').addClass('alert');
                    }
                } else {
                    console.log('lh;gl;jlh');
                    location.href = '/web/index.php';
                }
            }
        });
    });

});