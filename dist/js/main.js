const menuButton = document.querySelector('.menu-btn')
const menuNav = document.querySelector('.menu-nav')

menuButton.addEventListener('click', toogleMenu)

function toogleMenu() {
    if (menuButton.classList.contains('menu-btn--open')) {
        menuButton.classList.remove('menu-btn--open')
        menuNav.classList.remove('menu-nav--open')
        closeSubMenu();
    } else {
        menuButton.classList.add('menu-btn--open')
        menuNav.classList.add('menu-nav--open')
    }
}

document.querySelectorAll('.menu-nav__toogle').forEach((toogle) => {
    toogle.addEventListener('click', toogleSubMenu)
})

document.querySelectorAll('.menu-nav__link').forEach((link) => {
    link.addEventListener('click', closeSubMenu)
})

function toogleSubMenu() {
    let selectedMenuItem = this.parentNode;

    if (selectedMenuItem.classList.contains('menu-nav--open')) {
        closeSubMenu();
    } else {
        closeSubMenu();
        selectedMenuItem.classList.add('menu-nav--open')
        menuNav.classList.add('menu-nav--wide-open')
    }
}

function closeSubMenu() {
    document.querySelectorAll('.menu-nav__item').forEach((item) => {
        item.classList.remove('menu-nav--open')
        menuNav.classList.remove('menu-nav--wide-open')
    })
}