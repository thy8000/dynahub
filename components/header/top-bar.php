<?php

if (!defined('ABSPATH')) {
    exit;
}

?>

<div class="bg-blue-900 hidden md:block">
    <div class="container">
        <div class="flex items-center justify-between py-3">
            <div class="flex items-center">
                <?php get_template_part('components/social-links'); ?>
            </div>
            <div class="w-80">
                <?php get_template_part('components/search-form'); ?>
            </div>
        </div>
    </div>
</div>