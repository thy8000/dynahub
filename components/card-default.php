<?php

if (!defined('ABSPATH')) {
    exit;
}

use Dynahub\Post\Post;

$Post = new Post($args['post_ID']);

$post_url      = $Post->get_the_permalink();
$post_title    = $Post->get_the_title();
$post_author   = $Post->get_author_name();
$post_date     = $Post->get_the_date('j \d\e F \d\e Y');
$post_category = $Post->get_first_category_name();

?>
<li>
    <a class="!no-underline text-center" href="<?php echo esc_url($post_url); ?>">
        <picture class="flex flex-col aspect-[1.38]">
            <?php

            $post_thumbnail = $Post->get_the_thumbnail('large', [
                'class' => 'w-full h-full',
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

        <h3 class="mt-3 font-bold text-xl text-blue-500"><?php echo esc_html($post_title); ?></h3>

        <div class="flex gap-4 mt-3">
            <span><?php echo esc_html($post_author); ?></span>

            <span><?php echo esc_html($post_date); ?></span>
        </div>
    </a>
</li>