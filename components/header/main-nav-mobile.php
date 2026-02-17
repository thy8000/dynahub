<?php

if (!defined('ABSPATH')) {
    exit;
}

?>

<div id="mobile-nav-drawer" class="mobile-nav-drawer fixed inset-y-0 left-0 z-50 w-80 px-4 bg-white shadow-xl transform -translate-x-full transition-transform duration-300 ease-in-out" aria-hidden="true">
    <div class="flex flex-col h-full">
        <div class="px-6 py-8 border-b border-gray-200">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="flex flex-col items-center space-y-2 mobile-nav-logo">
                <h1 class="text-3xl font-bold text-black">DynaHub</h1>
            </a>
        </div>

        <nav class="flex-1 overflow-y-auto px-6 py-6">
            <?php

            wp_nav_menu(array(
                'theme_location' => 'main_menu',
                'menu_id'        => 'mobile-menu',
                'container'      => false,
                'menu_class'     => 'mobile-nav-menu flex flex-col space-y-1',
                'fallback_cb'    => false,
            ));

            ?>
        </nav>

        <?php

        get_template_part('components/search-form');

        get_template_part('components/social-links');

        ?>
    </div>

    <button id="mobile-menu-close" class="absolute top-4 right-4 flex items-center justify-center w-10 h-10 rounded-lg hover:bg-gray-100 transition-colors" aria-label="Fechar menu">
        <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>
</div>

<div id="mobile-nav-overlay" class="mobile-nav-overlay fixed inset-0 bg-black bg-opacity-50 z-40 opacity-0 invisible transition-opacity duration-300" aria-hidden="true"></div>