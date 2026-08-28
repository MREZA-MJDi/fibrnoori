import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    const menuButton = document.querySelector('[data-mobile-menu-button]');
    const mobileMenu = document.querySelector('[data-mobile-menu]');

    if (!menuButton || !mobileMenu) {
        return;
    }

    menuButton.addEventListener('click', () => {
        const willOpen = mobileMenu.hasAttribute('hidden');

        mobileMenu.toggleAttribute('hidden', !willOpen);
        menuButton.setAttribute('aria-expanded', String(willOpen));
    });
});