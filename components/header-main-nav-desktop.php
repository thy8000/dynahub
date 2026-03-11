<?php

if (!defined('ABSPATH')) {
    exit;
}

?>

<div class="bg-blue-500 lg:block hidden">
    <div class="container">
        <nav class="flex items-center justify-center gap-20 py-4">
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
        </nav>
    </div>
</div>