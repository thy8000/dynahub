<?php

if (!defined('ABSPATH')) {
    exit;
}

$posts = $args['posts'] ?? [];

if (empty($posts)) {
    return;
}

?>

<ul class="hero-triple-posts grid grid-cols-1 md:grid-cols-3 gap-8">
    <?php

    foreach ($posts as $post) {
        if (empty($post)) {
            continue;
        }

    ?>
        <li>
            <?php

            get_template_part('components/cards/card-overlay', null, [
                'post' => $post,
            ]);

            ?>
        </li>
    <?php

    }

    ?>
</ul>