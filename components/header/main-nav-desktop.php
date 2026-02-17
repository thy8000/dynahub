<?php

if (!defined('ABSPATH')) {
    exit;
}

?>

<div class="bg-stone-100">
    <div class="container">
        <nav class="flex items-center justify-between gap-20 py-4">
            <div class="shrink-0">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center space-x-2">
                    <h1 class="text-3xl font-bold text-black">DynaHub</h1>
                </a>
            </div>

            <div class="hidden md:flex justify-center">
                <?php

                wp_nav_menu(array(
                    'theme_location' => 'main_menu',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'menu_class'     => 'nav-menu flex items-center space-x-8',
                    'fallback_cb'    => false,
                ));

                ?>
            </div>

            <button id="mobile-menu-button" class="md:hidden flex items-center justify-center w-10 h-10 rounded-lg hover:bg-gray-200 transition-colors" aria-label="Abrir menu" aria-expanded="false">
                <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </nav>
    </div>
</div>