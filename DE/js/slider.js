$('.btn-left').click(function () {
    $('.wrapper picture:last-child').prependTo('.wrapper');
});

$('.btn-right').click(function () {
    $('.wrapper picture:first-child').appendTo('.wrapper');
});