<?php

if (!defined('ABSPATH')) {
    exit;
}

use Dynahub\Post\Post;

$Post = new Post($args['post_ID']);

?>
<li>
    <a href="#">
        <picture class="aspect-[276/200]">
            <?php

            $post_thumbnail = $Post->get_the_thumbnail('large', [
                'class' => 'w-full h-full',
            ]);

            echo $post_thumbnail;

            ?>
        </picture>

        <h3 class="mt-6"><?php echo $Post->get_the_title(); ?></h3>

        <div class="flex flex-col gap-4 mt-3">
            <span><?php echo $Post->get_author_name(); ?></span>

            <span><?php echo $Post->get_the_date('j \d\e F \d\e Y'); ?></span>
        </div>
    </a>
</li>