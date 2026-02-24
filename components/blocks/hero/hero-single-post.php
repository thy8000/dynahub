<?php

if (!defined('ABSPATH')) {
    exit;
}

$post = $args['post'] ?? null;

if (empty($post)) {
    return;
}

?>

<ul>
    <li>
        <?php

        get_template_part('components/cards/overlay-card', null, [
            'post' => $post,
        ]);

        ?>
    </li>
</ul>