const menuButton = document.querySelector('.menu-btn')
const menuNav = document.querySelector('.menu-nav')

menuButton.addEventListener('click', toogleMenu)

function toogleMenu() {
    if (menuButton.classList.contains('open')) {
        menuButton.classList.remove('open')
        menuNav.classList.remove('open')
        closeSubMenu();
    } else {
        menuButton.classList.add('open')
        menuNav.classList.add('open')
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

    if (selectedMenuItem.classList.contains('open')) {
        closeSubMenu();
    } else {
        closeSubMenu();
        selectedMenuItem.classList.add('open')
        menuNav.classList.add('wide-open')
    }
}

function closeSubMenu() {
    document.querySelectorAll('.menu-nav__item').forEach((item) => {
        item.classList.remove('open')
        menuNav.classList.remove('wide-open')
    })
}