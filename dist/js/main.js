const menuButtons = document.querySelectorAll('.menu-btn')
const menuNav = document.querySelector('.menu-nav')

menuButtons.forEach((menuButton) => {
    menuButton.addEventListener('click', toogleMenu)
})

document.querySelectorAll('.menu-nav__toogle').forEach((toogle) => {
    toogle.addEventListener('click', toogleSubMenu)
})

document.querySelectorAll('.menu-nav__link').forEach((link) => {
    link.addEventListener('click', closeSubMenu)
})

function toogleMenu() {
    if (isMenuOpen()) {
        closeMenu()
    } else {
        openMenu()
    }
}

function toogleSubMenu() {
    let selectedMenuItem = this.parentNode.parentNode;

    if (selectedMenuItem.classList.contains('menu-nav--open')) {
        closeSubMenu();
    } else {
        closeSubMenu();
        selectedMenuItem.classList.add('menu-nav--open')
    }
}

function closeSubMenu() {
    document.querySelectorAll('.menu-nav__item-group').forEach((item) => {
        item.classList.remove('menu-nav--open')
    })
}

function isMenuOpen() {
    return menuNav.classList.contains('menu-nav--open')
}

function closeMenu() {
    menuButtons.forEach((menuButton) => {
        menuButton.classList.remove('menu-btn--open')
    })
    closeSubMenu();
    menuNav.classList.remove('menu-nav--open')
}

function openMenu() {
    menuButtons.forEach((menuButton) => {
        menuButton.classList.add('menu-btn--open')
    })
    menuNav.classList.add('menu-nav--open')
}
