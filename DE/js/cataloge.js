$(document).ready(function () {
    $(window).on('click', function (e) {
        e.preventDefault
        if (e.target.className == 'cart') {
            $.ajax({
                type: "GET",
                url: "/php/add_to_basket.php",
                data: {
                    'id': $(e.target).data('id'),
                    'cart': 'add'
                },
                success: function (response) {
                    console.log(response);
                    var jsonData = JSON.parse(response);
                    if (jsonData.success == "0") {
                        alert("Больше товаров нет");
                    } else {
                        alert("Товар добавлен успешно")
                    }
                    // location.href = '/web/basket.php';
                },
                error: function (response) {
                    console.log(response);
                    alert(response);
                    var jsonData = JSON.parse(response);
                    if (jsonData.success == "0") {
                        alert("Больше товаров нет");
                    } else {
                        alert("Товар добавлен успешно")
                    }
                    console.log(response);
                }
            });
        }
        if ($(e.target).closest('.count_add')) {
            var count_add = $('div.count_add');
            var count_length = count_add.length;
            for (let i = 0; i < count_length; i++) {
                if (count_add[i] == e.target) {
                    let prods = $('.prods')[i];
                    $.ajax({
                        type: "GET",
                        url: "/php/add_to_basket.php",
                        data: {
                            'id': $(prods).data('id'),
                            'cart': 'add'
                        },
                        success: function (response) {
                            // console.log(response);
                            var jsonData = JSON.parse(response);
                            console.log(jsonData);
                            if (jsonData[0].success == "0") {
                                alert("Больше товаров нет");
                            } else {
                                alert("Товар добавлен успешно")
                            }
                            $('.main').empty().append(jsonData[1]['answer']);
                        },
                        error: function (response) {
                            alert(response)
                            console.log(response);
                        }
                    });
                }
            }
        }
        if ($(e.target).closest('.count_min')) {

            var count_add = $('div.count_min');
            var count_length = count_add.length;
            for (let i = 0; i < count_length; i++) {
                if (count_add[i] == e.target) {
                    let prods = $('.prods')[i];
                    $.ajax({
                        type: "GET",
                        url: "/php/add_to_basket.php",
                        data: {
                            'id': $(prods).data('id'),
                            'cart': 'minus'
                        },
                        success: function (response) {
                            response = JSON.parse(response);
                            $('.main').empty().append(response['answer']);
                        },
                        error: function (response) {
                            alert(response)
                            console.log(response);
                        }
                    });
                }
            }
        }
    });


    $('.submit_yes').on('click', function (e) {
        e.preventDefault;
        if ($('.form_pas').hasClass('form_pas_active')) {
            $('.form_pas').remove('.form_pas_active');
        } else {
            $('.form_pas').addClass('form_pas_active');
        }
    });

    $('.submit').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/php/makeordrer.php",
            data: {
                'pas': $('.password').val(),
            },
            success: function (response) {
                var jsonData = JSON.parse(response);
                if (jsonData.success == "1") {
                    alert("Заказ сформирован успешно");
                    location.href = '/web/orders.php';
                } else if (jsonData.success == "0") {
                    alert("Неверный пароль");
                    if ($('.password').hasClass('alert')) {
                        $('.password').removeClass('alert');
                    } else {
                        $('.password').addClass('alert');
                    }
                } else if (jsonData.success == "2") {
                    location.href = '/web/auth.php';
                }
            }
        });
    });

    $('.order_del').on('click', function (e) {
        e.preventDefault;
        $.ajax({
            type: "POST",
            url: "/php/order_del.php",
            data: {
                'data': $(e.target).data('id'),
            },
            success: function (data) {
                location.href = '/web/orders.php';
            }
        });
    });


    $('.order_change').on('click', function (e) {
        e.preventDefault;
        console.log(e.target);
        if ($('#status_change').hasClass('hide')) {
            $('#status_change').removeClass('hide');
        } else {
            $('#status_change').addClass('hide');
        }
    });

    $('#status_change').change(function () {
        if ($(this).val() == 'Подтверждён') {
            if ($('#last_confirm').hasClass('hide')) {
                $('#last_confirm').removeClass('hide');
                $('#reason_text').addClass('hide');
            } else {
                $('#reason_text').addClass('hide');
            }
        }
        if ($(this).val() == 'Умолч') {
            if ($('#last_confirm').hasClass('hide')) {
                $('#last_confirm').addClass('hide');
                $('#reason_text').addClass('hide');
            } else {
                $('#last_confirm').addClass('hide');
                $('#reason_text').addClass('hide');
            }
        }
        if ($(this).val() == 'Отклонён') {
            if ($('#reason_text').hasClass('hide')) {
                $('#last_confirm').removeClass('hide');
                $('#reason_text').removeClass('hide');
            } else {
                $('#last_confirm').removeClass('hide');
                $('#reason_text').removeClass('hide');
            }
        }
    });

    $('.last_confirm').on('click', function (e) {
        e.preventDefault;
        ad = $('#last_confirm').data('id');
        console.log(ad);
        $.ajax({
            type: "POST",
            url: "/php/order_update.php",
            data: {
                'data': $(e.target).data('id'),
                'status': $('#status_change').val(),
                'reason': $('#reason_text').val(),
            },
            success: function (data) {
                console.log(data);
                location.href = '/web/Allorders.php';
            }
        });
    });

    var files;

    $('input[type=file]').on('change', function () {
        files = this.files;
        console.log(files[0].size);
        // console.log(file);
        if (files[0].size > 1000000) {
            alert('max upload size is 1k');
            $("input[type=file]").val("");
        }
    });

    $('.change_btn').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $.ajax({
            url: '/php/product_update.php',
            type: 'POST',
            data: {
                'id': $(e.target).data('id'),
                'name': $('#name').val(),
                'price': $('#price').val(),
                'category': $('#category').val(),
                'count': $('#count').val(),
            },
            success: function (data) {
                console.log(JSON.stringify(data), "УСПЕШНО");
                location.reload();
            },
            error: function (data) {
                console.log(JSON.stringify(data), 'ОШИБКА');
            }
        });
        console.log(files);
        if (typeof files == 'undefined') return;
        // создадим данные файлов в подходящем для отправки формате
        var data = new FormData();
        $.each(files, function (key, value) {
            data.append(key, value);
        });
        console.log($(e.target).data('id'));
        data.append('id', $(e.target).data('id'));
        // добавим переменную идентификатор запроса
        data.append('my_file_upload', 1);
        $.ajax({
            url: '/php/product_update.php',
            type: 'POST',
            data: data, // передаем объект FormData напрямую
            cache: false,
            dataType: 'json',
            // отключаем обработку передаваемых данных, пусть передаются как есть
            processData: false,
            // отключаем установку заголовка типа запроса. Так jQuery скажет серверу что это строковой запрос
            contentType: false,
            success: function (response) {
                location.reload();
                console.log(JSON.stringify(response), 'EGDASDASDasdsafsa');
                if (response.hasOwnProperty('id')) {
                    console.log(response.id);
                }
            },
            error: function (response) {
                console.log((response), '8 bukov');
            }
        });

    });

    var files;

    $('.submit_btn').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $.ajax({
            url: '/php/add_prod.php',
            type: 'POST',
            data: {
                'name': $('#name').val(),
                'price': $('#price').val(),
                'category': $('#category').val(),
                'count': $('#count').val(),
            },
            success: function (data) {
                console.log(JSON.stringify(data), "УСПЕШНО");
                location.reload();
            },
            error: function (data) {
                console.log(JSON.stringify(data), 'ОШИБКА');
            }
        });
        console.log(files);
        if (typeof files == 'undefined') return;
        // создадим данные файлов в подходящем для отправки формате
        var data = new FormData();
        $.each(files, function (key, value) {
            data.append(key, value);
        });
        console.log($(e.target).data('id'));
        data.append('id', $(e.target).data('id'));
        // добавим переменную идентификатор запроса
        data.append('my_file_upload', 1);
        data.append('name', $('#name').val(),)
        data.append('price', $('#price').val(),)
        data.append('category', $('#category').val(),)
        data.append('count', $('#count').val(),)
        $.ajax({
            url: '/php/add_prod.php',
            type: 'POST',
            data: data, // передаем объект FormData напрямую
            cache: false,
            dataType: 'json',
            // отключаем обработку передаваемых данных, пусть передаются как есть
            processData: false,
            // отключаем установку заголовка типа запроса. Так jQuery скажет серверу что это строковой запрос
            contentType: false,
            success: function (response) {
                location.reload();
                console.log(JSON.stringify(response), 'EGDASDASDasdsafsa');
                if (response.hasOwnProperty('id')) {
                    console.log(response.id);
                }
            },
            error: function (response) {
                console.log(response);
                console.log((response), '8 bukov');
            }
        });

    });

    $('a[href="#sort-price"]' || 'a[href="#sort-date"]' || 'select[name="taskOption"]').on('click', function () {
        console.log(1);
        if ($('a[href="#sort-alpha"]').hasClass('clicked')) $('a[href="#sort-alpha"]').removeClass('clicked');
    });

    //сортировка по алфавиту:

    $('a[href="#sort-alpha"]').click(function (e) {
        e.preventDefault();
        console.log(1);
        if (!$(this).hasClass('clicked')) {
            $(this).addClass('clicked');
            console.log(this);
            var sortedProducts = $('.prod_block').sort(function (a, b) {
                var aName = $(a).find('.name a').text().toLowerCase();
                var bName = $(b).find('.name a').text().toLowerCase();
                return aName.localeCompare(bName);
            });
        } else {
            $(this).removeClass('clicked');
            console.log(this, "1");
            var sortedProducts = $('.prod_block').sort(function (b, a) {
                var aName = $(a).find('.name a').text().toLowerCase();
                var bName = $(b).find('.name a').text().toLowerCase();
                return aName.localeCompare(bName);
            });
        }
        $('.products').html(sortedProducts);
        return false;
    });

    // сортировка по цене:

    // $(document).ready(function () {
    $('a[href="#sort-price"]').click(function () {
        if (!$(this).hasClass('clicked')) {
            $(this).addClass('clicked');
            console.log(this);
            var sortedProducts = $('.prod_block').sort(function (a, b) {
                var aPrice = parseFloat($(a).find('.price').text());
                var bPrice = parseFloat($(b).find('.price').text());
                return aPrice - bPrice;
            });
        } else {
            $(this).removeClass('clicked');
            console.log(this, "1");
            var sortedProducts = $('.prod_block').sort(function (b, a) {
                var aPrice = parseFloat($(a).find('.price').text());
                var bPrice = parseFloat($(b).find('.price').text());
                return aPrice - bPrice;
            });
        };
        $('.products').html(sortedProducts);
        return false;
    });

    // сортировка по дате:

    // $(document).ready(function () {
    $('a[href="#sort-date"]').click(function () {
        if (!$(this).hasClass('clicked')) {
            $(this).addClass('clicked');
            console.log(this);
            var sortedProducts = $('.prod_block').sort(function (a, b) {
                var aDate = new Date($(a).find('.date').text());
                var bDate = new Date($(b).find('.date').text());
                return bDate - aDate;
            });
        } else {
            $(this).removeClass('clicked');
            console.log(this, "1");
            var sortedProducts = $('.prod_block').sort(function (b, a) {
                var aDate = new Date($(a).find('.date').text());
                var bDate = new Date($(b).find('.date').text());
                return bDate - aDate;
            });
        }
        $('.products').html(sortedProducts);
        return false;
    });

    // фильтрация по категории:

    // $(document).ready(function () {
    $('select[name="taskOption"]').change(function () {
        var categoryId = $(this).val();
        if (categoryId == 'default') {
            $('.prod_block').show();
        } else {
            $('.prod_block').hide();
            $('.prod_block[data-category="' + categoryId + '"]').show();
        }
    });
    // });

    // Сброс всех фильтров

    $('.reset').on('click', function (e) {
        // e.preventDefault();
        var url = 'cataloge_products.php';
        $('.products').load(url);
    });

    // фильтрация по категории:

    // $(document).ready(function () {
    $('select[name="taskOption"]').change(function () {
        var categoryId = $(this).val();
        if (categoryId == 'default') {
            $('.order_block').show();
        } else {
            $('.order_block').hide();
            $('.order_block[data-status="' + categoryId + '"]').show();
        }
    });
    // });

    // Сброс всех фильтров

    $('.reset').on('click', function (e) {
        // e.preventDefault();
        var url = 'Allorders_orders.php';
        $('.products').load(url);
    });



});