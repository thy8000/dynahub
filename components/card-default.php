<?php

if (!defined('ABSPATH')) {
    exit;
}

use Dynahub\Post\Post;

$Post = new Post($args['post_ID']);

$post_url      = $Post->get_the_permalink();
$post_title    = $Post->get_the_title();
$post_author   = $Post->get_author_name();
$post_date     = $Post->get_the_date('j/m/Y');
$post_category = $Post->get_first_category_name();

?>
<li>
    <a class="group flex flex-col items-center !no-underline text-center overflow-hidden" href="<?php echo esc_url($post_url); ?>">
        <picture class="flex flex-col w-full h-full overflow-hidden">
            <?php

            $post_thumbnail = $Post->get_the_thumbnail('large', [
                'class' => 'w-full h-[200px] object-cover rounded-md',
            ]);

            echo $post_thumbnail;

            if (!empty($post_category)) {

            ?>
                <span class="self-center -mt-3 py-1 px-2.5 bg-primary rounded-sm text-white font-semibold text-xs uppercase">
                    <?php echo esc_html($post_category); ?>
                </span>
            <?php

            }

            ?>
        </picture>

        <h3 class="mt-3 font-bold text-xl text-blue-500 line-clamp-3 group-hover:text-blue-500/80 transition-colors duration-500"><?php echo esc_html($post_title); ?></h3>

        <div class="flex gap-4 mt-3 uppercase font-semibold text-xs text-custom-neutral-200 font-secondary">
            <span class="flex gap-2">
                <?php

                get_template_part('components/icons/icon', 'user', [
                    'fill' => '#6D757F',
                ]);

                echo esc_html($post_author);

                ?>
            </span>

            <span class="flex gap-2">
                <?php

                get_template_part('components/icons/icon', 'calendar', [
                    'fill' => '#6D757F',
                ]);

                echo esc_html($post_date);

                ?>
            </span>
        </div>
    </a>
</li>