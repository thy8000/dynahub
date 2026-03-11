<?php

if (!defined('ABSPATH')) {
    exit;
}

$post_grid_layout_style = get_field('block_dynamic_post_grid_layout_style');
$post_grid_columns      = get_field('block_dynamic_post_grid_columns') ?? 2;

if ($post_grid_layout_style === 'default') {
    get_template_part(
        'components/grid',
        'default',
        [
            'grid_columns' => $post_grid_columns,
        ]
    );
}

echo 'Grid';
