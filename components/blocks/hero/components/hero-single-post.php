<?php

if (!defined('ABSPATH')) {
    exit;
}

$post = $args['post'] ?? null;

if (empty($post)) {
    return;
}

?>

<ul class="hero-single-post">
    <li>
        <?php

        get_template_part('components/cards/card-overlay', null, [
            'post' => $post,
        ]);

        ?>
    </li>
</ul>