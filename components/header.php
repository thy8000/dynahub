<?php

/**
 * Header Component
 *
 * @package Dynahub
 */
?>

<header class="bg-white">
    <!-- Top Strip -->
    <div class="bg-teal-800 h-1"></div>

    <!-- Main Navigation -->
    <div class="bg-stone-100">
        <div class="container">
            <nav class="flex items-center justify-between py-4">
                <!-- Logo -->
                <div class="shrink-0">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center space-x-2">
                        <h1 class="text-3xl font-bold text-black">DynaHub</h1>
                    </a>
                </div>

                <!-- Navigation Menu -->
                <div class="flex justify-center">
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
            </nav>
        </div>
    </div>
</header>