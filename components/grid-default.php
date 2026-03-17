<?php

if (!defined('ABSPATH')) {
    exit;
}

$post_grid_columns = $args['post_grid_columns'] ?? 2;
$posts_list_args   = $args['posts_list_args'];

$posts_list = get_posts($posts_list_args);

if (empty($posts)) {
    return;
}

$grid_columns_classes = [
    2 => 'lg:grid-cols-2',
    3 => 'lg:grid-cols-3',
    4 => 'lg:grid-cols-4',
];

$list_output = '';

$list_output .= $grid_columns_classes[$post_grid_columns ?? 2];

?>

<ul class="grid grid-cols-1 gap-8 <?php echo esc_attr($list_output); ?>">
    <?php

    foreach ($posts_list as $post_ID) {
        if (empty($post_ID)) {
            continue;
        }

        get_template_part('components/card', 'default', [
            'post_ID' => $post_ID,
        ]);
    }

    ?>
</ul>