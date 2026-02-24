<?php

if (!defined('ABSPATH')) {
    exit;
}

$posts = $args['posts'] ?? [];

if (empty($posts)) {
    return;
}

?>

<ul class="grid grid-cols-1 md:grid-cols-2">
    <?php

    foreach ($posts as $post) {
        if (empty($post)) {
            continue;
        }

    ?>
        <li>
            <?php

            get_template_part('components/cards/overlay-card', null, [
                'post' => $post,
            ]);

            ?>
        </li>
    <?php

    }

    ?>
</ul>