<?php

if (!defined('ABSPATH')) {
    exit;
}

$post_grid_layout_style = get_field('block_dynamic_post_grid_layout_style');
$post_grid_columns      = get_field('block_dynamic_post_grid_columns') ?? 2;
$post_grid_categories   = get_field('block_dynamic_post_grid_categories');
$post_grid_ordenation   = get_field('block_dynamic_post_grid_ordenation');
$post_grid_ordenation = 'recent';

$posts_list_args = [
    'numberposts' => $post_grid_columns,
    'post_type'   => 'post',
];

if (!empty($post_categories)) {
    $posts_list_args['category'] = implode(', ', $post_categories);
}

// TODO: CREATE QUERY FOR MOST READ
if ($post_grid_ordenation === 'recent') {
    $posts_list_args['orderby'] = 'date';
    $posts_list_args['order']   = 'DESC';
}

if ($post_grid_layout_style === 'default') {
    get_template_part('components/grid', 'default', [
        'post_grid_columns' => $post_grid_columns,
        'posts_list_args'   => $posts_list_args
    ]);
}

echo 'Grid';
