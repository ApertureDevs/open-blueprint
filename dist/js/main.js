const menuButton = document.querySelector('.menu-btn');
const menuNav = document.querySelector('.menu-nav');

menuButton.addEventListener('click', toogleMenu)

function toogleMenu() {
    if (menuButton.classList.contains('open')) {
        menuButton.classList.remove('open')
        menuNav.classList.remove('open')
    } else {
        menuButton.classList.add('open')
        menuNav.classList.add('open')
    }
}