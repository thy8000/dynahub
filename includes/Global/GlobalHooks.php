<?php

/**
 * Global Hooks
 *
 * @package Dynahub
 */

namespace Dynahub\Global;

if (!defined('ABSPATH')) {
    exit;
}

class GlobalHooks
{
    public function __construct()
    {
        $this->register_hooks();
    }

    private function register_hooks()
    {
        add_action('after_setup_theme', [$this, 'setup']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);
        add_action('enqueue_block_editor_assets', [$this, 'enqueue_assets']);
        add_action('wp_footer', [$this, 'remove_module_filter'], 999);
    }

    public function setup()
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');

        register_nav_menus([
            'main_menu' => esc_html__('Menu Principal', 'dynahub'),
        ]);
    }

    public function enqueue_assets()
    {
        $theme_version = wp_get_theme()->get('Version');
        $is_dev = defined('WP_DEBUG') && WP_DEBUG;

        if ($is_dev) {
            wp_enqueue_script(
                'dynahub-main',
                'http://localhost:3000/src/main.js',
                [],
                $theme_version,
                true
            );

            add_filter('script_loader_tag', [$this, 'add_module_type'], 10, 3);

            wp_enqueue_style(
                'dynahub-style',
                'http://localhost:3000/src/input.css',
                [],
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
                    [],
                    $theme_version
                );
            }

            if (isset($manifest['src/main.js'])) {
                wp_enqueue_script(
                    'dynahub-main',
                    get_template_directory_uri() . '/dist/' . $manifest['src/main.js']['file'],
                    [],
                    $theme_version,
                    true
                );

                add_filter('script_loader_tag', [$this, 'add_module_type'], 10, 3);
            }
        }
    }

    /**
     * Add module type to script tag
     *
     * @param string $tag    The script tag HTML
     * @param string $handle The script handle
     * @param string $src    The script source URL
     * @return string
     */
    public function add_module_type($tag, $handle, $src)
    {
        if ('dynahub-main' === $handle) {
            $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
        }

        return $tag;
    }

    public function remove_module_filter()
    {
        remove_filter('script_loader_tag', [$this, 'add_module_type'], 10);
    }
}
