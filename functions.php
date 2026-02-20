<?php

/**
 * Dynahub Theme Functions
 *
 * @package Dynahub
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('after_setup_theme', 'dynahub_setup');
function dynahub_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menus(array(
        'main_menu' => esc_html__('Menu Principal', 'dynahub'),
    ));
}

add_action('wp_enqueue_scripts', 'dynahub_enqueue_assets');
function dynahub_enqueue_assets()
{
    $theme_version = wp_get_theme()->get('Version');
    $is_dev = defined('WP_DEBUG') && WP_DEBUG;

    if ($is_dev) {
        wp_enqueue_script(
            'dynahub-main',
            'http://localhost:3000/src/main.js',
            array(),
            $theme_version,
            true
        );

        add_filter('script_loader_tag', 'dynahub_add_module_type', 10, 3);

        wp_enqueue_style(
            'dynahub-style',
            'http://localhost:3000/src/input.css',
            array(),
            $theme_version
        );

        return;
    }

    $manifest_path = get_template_directory() . '/dist/manifest.json';

    if (file_exists($manifest_path)) {
        $manifest = json_decode(file_get_contents($manifest_path), true);

        if (isset($manifest['src/input.css'])) {
            wp_enqueue_style(
                'dynahub-style',
                get_template_directory_uri() . '/dist/' . $manifest['src/input.css']['file'],
                array(),
                $theme_version
            );
        }

        if (isset($manifest['src/main.js'])) {
            wp_enqueue_script(
                'dynahub-main',
                get_template_directory_uri() . '/dist/' . $manifest['src/main.js']['file'],
                array(),
                $theme_version,
                true
            );

            add_filter('script_loader_tag', 'dynahub_add_module_type', 10, 3);
        }
    }
}

function dynahub_add_module_type($tag, $handle, $src)
{
    if ('dynahub-main' === $handle) {
        $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    }

    return $tag;
}

add_action('wp_footer', 'dynahub_remove_module_filter', 999);
function dynahub_remove_module_filter()
{
    remove_filter('script_loader_tag', 'dynahub_add_module_type', 10);
}
