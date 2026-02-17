export function initMobileNav() {
    const menuButton = document.getElementById('mobile-menu-button');
    const drawer = document.getElementById('mobile-nav-drawer');
    const overlay = document.getElementById('mobile-nav-overlay');
    const closeButton = document.getElementById('mobile-menu-close');

    if (!menuButton || !drawer || !overlay) {
        return;
    }

    function openMobileNav() {
        drawer.classList.remove('-translate-x-full');
        drawer.setAttribute('aria-hidden', 'false');
        overlay.classList.remove('opacity-0', 'invisible');
        menuButton.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
    }

    function closeMobileNav() {
        drawer.classList.add('-translate-x-full');
        drawer.setAttribute('aria-hidden', 'true');
        overlay.classList.add('opacity-0', 'invisible');
        menuButton.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    }

    menuButton.addEventListener('click', openMobileNav);

    if (closeButton) {
        closeButton.addEventListener('click', closeMobileNav);
    }

    overlay.addEventListener('click', closeMobileNav);

    const mobileMenuItems = document.querySelectorAll('#mobile-menu .menu-item-has-children > a');

    if (mobileMenuItems.length > 0) {
        mobileMenuItems.forEach(function (item) {
            item.addEventListener('click', function (e) {
                e.preventDefault();

                const parent = this.parentElement;
                const isOpen = parent.classList.contains('open');

                const mobileMenuWithChildren = document.querySelectorAll('#mobile-menu .menu-item-has-children');

                mobileMenuWithChildren.forEach(function (menuItem) {
                    menuItem.classList.remove('open');
                });

                if (!isOpen) {
                    parent.classList.add('open');
                }
            });
        });
    }

    window.closeMobileNav = closeMobileNav;
}
