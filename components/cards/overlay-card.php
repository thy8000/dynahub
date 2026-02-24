<?php

if (!defined('ABSPATH')) {
    exit;
}

use Dynahub\Post\Post;

$post = $args['post'] ?? null;

if (!$post) {
    return;
}

$Post = new Post($post);

$post_id     = $Post->get_id();
$post_title  = $Post->get_title();
$post_url    = $Post->get_permalink();
$post_date   = $Post->get_date('d F, Y');
$author_name = $Post->get_author_name('display_name');

$featured_image     = $Post->get_featured_image_url('full');
$featured_image_alt = $Post->get_featured_image_alt();

$category_name = strtoupper($Post->get_first_category_name());

$reading_time = $Post->get_reading_time();

?>

<a href="<?php echo esc_url($post_url); ?>" class="hero-block relative block w-full !h-[600px] overflow-hidden group">
    <?php

    if (!empty($featured_image)) {

    ?>
        <picture class="absolute inset-0 !w-full !h-full">
            <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr($featured_image_alt); ?>" class="!w-full !h-full !object-cover" />
        </picture>
    <?php

    }

    ?>

    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/50 to-transparent z-10"></div>

    <div class="relative z-20 h-full flex flex-col justify-end pb-12 px-8">
        <div class="!flex !flex-col !gap-10 max-w-4xl mx-auto w-full text-center">
            <?php

            if ($category_name) {

            ?>
                <div>
                    <span class="inline-block px-4 py-2 bg-primary rounded text-white text-sm font-semibold uppercase font-secondary">
                        <?php echo esc_html($category_name); ?>
                    </span>
                </div>
            <?php

            }

            ?>
            <h1 class="!text-xl lg:!text-4xl !font-bold !text-white group-hover:!text-primary transition-colors">
                <?php echo esc_html($post_title); ?>
            </h1>

            <div class="flex flex-wrap justify-center items-center gap-6 text-custom-neutral-100 text-sm md:text-base font-secondary">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                    <span class="uppercase">BY <?php echo esc_html(strtoupper($author_name)); ?></span>
                </div>

                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                    </svg>
                    <span class="uppercase"><?php echo esc_html($post_date); ?></span>
                </div>

                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                    </svg>
                    <span class="uppercase"><?php echo esc_html($reading_time); ?></span>
                </div>
            </div>
        </div>
    </div>
</a>