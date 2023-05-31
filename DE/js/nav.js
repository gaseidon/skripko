let dropdown = document.querySelector('.admin');
var ul = document.querySelector("#dropdown");
dropdown.addEventListener('click', (e) => {
    if (ul.classList.contains('show')) {
        ul.classList.remove('show')
    } else {
        ul.classList.add('show')
    }
})