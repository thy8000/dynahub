<?php

/**
 * Header Component
 *
 * @package Dynahub
 */
?>

<header class="bg-white border-b-2 border-blue-500">
    <div class="container">
        <nav class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="h-8 w-px bg-gray-300 mr-4"></div>
                <img src="<?php echo get_template_directory_uri(); ?>/src/images/logo.png" alt="Logo" class="w-24 h-auto">
                <div class="h-8 w-px bg-gray-300 ml-4"></div>
            </div>
            <div class="flex items-center flex-1 ml-6">
                <?php

                wp_nav_menu(array(
                    'theme_location' => 'main_menu',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'menu_class'     => 'flex items-center space-x-6',
                    'fallback_cb'    => false,
                ));

                ?>
            </div>
        </nav>
    </div>
</header>