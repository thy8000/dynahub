<?php

namespace Dynahub\Blocks;

if (!defined('ABSPATH')) {
    exit;
}

class Register
{
    public function __construct()
    {
        add_filter('block_categories_all', [$this, 'register_dynahub_block_category'], 10, 1);
        add_action('init', [$this, 'register_hero_block']);
    }

    public function register_dynahub_block_category($categories)
    {
        $categories[] = [
            'slug' => 'dynahub',
            'title' => __('Dynahub', 'dynahub'),
        ];

        return $categories;
    }

    public function register_hero_block()
    {
        if (function_exists('acf_register_block_type')) {
            acf_register_block_type([
                'name'            => 'dynahub-hero',
                'title'           => __('Hero', 'dynahub'),
                'description'     => __('Exibe um hero section com um post selecionado. (Mostra informações do post)', 'dynahub'),
                'render_template' => get_template_directory() . '/components/blocks/hero.php',
                'category'        => 'dynahub',
                'icon'            => 'format-image',
                'keywords'        => ['hero', 'image', 'post'],
            ]);
        }

        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group([
                'key'    => 'group_ztpynIyLoi9W',
                'title'  => __('Campos do Bloco Hero', 'dynahub'),
                'fields' => [
                    [
                        'key'               => 'field_09G4OuPNvwiF',
                        'label'             => __('Post Relacionado', 'dynahub'),
                        'name'              => 'hero_post',
                        'type'              => 'relationship',
                        'instructions'      => __('Selecione um post para exibir no hero.', 'dynahub'),
                        'required'          => 0,
                        'conditional_logic' => 0,
                        'wrapper'           => [
                            'width' => '',
                            'class' => '',
                            'id'    => '',
                        ],
                        'post_type'     => ['post'],
                        'taxonomy'      => '',
                        'filters'       => ['search'],
                        'elements'      => ['featured_image'],
                        'min'           => 0,
                        'max'           => 3,
                        'return_format' => 'object',
                    ],
                ],
                'location' => [
                    [
                        [
                            'param'    => 'block',
                            'operator' => '==',
                            'value'    => 'acf/dynahub-hero',
                        ],
                    ],
                ],
                'menu_order'            => 0,
                'position'              => 'normal',
                'style'                 => 'default',
                'label_placement'       => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen'        => '',
                'active'                => true,
                'description'           => '',
            ]);
        }
    }
}
