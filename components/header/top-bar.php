<?php

if (!defined('ABSPATH')) {
    exit;
}

?>

<div class="bg-blue-600 hidden md:block">
    <div class="container">
        <div class="flex items-center justify-between py-8">
            <div class="flex items-center">
                <?php get_template_part('components/social-links'); ?>
            </div>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center space-x-2">
                <h1 class="text-3xl font-bold text-stone-100">DynaHub</h1>
            </a>
            <div class="max-w-3xs">
                <?php get_template_part('components/search-form'); ?>
            </div>
        </div>
    </div>
</div>