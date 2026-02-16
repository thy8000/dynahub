<?php

/**
 * Header Component
 *
 * @package Dynahub
 */
?>

<header class="bg-white border-b-2 border-blue-500">
    <div class="container">
        <nav>
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