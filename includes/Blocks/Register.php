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
        add_action('init', [$this, 'register_banner_block']);
        add_action('init', [$this, 'register_dynamic_grid_block']);
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
                'render_template' => get_template_directory() . '/components/blocks/hero/_index.php',
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

    public function register_banner_block()
    {
        if (function_exists('acf_register_block_type')) {
            acf_register_block_type([
                'name'            => 'dynahub-block-banner',
                'title'           => __('Banner', 'dynahub'),
                'description'     => __('Exibe um banner personalizado com imagem e Link.'),
                'render_template' => get_template_directory() . '/components/blocks/banner/_index.php',
                'category'        => 'dynahub',
                'icon'            => 'format-image',
                'keywords'        => ['banner', 'image'],
            ]);
        }

        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'group_69a57b1ce147d',
                'title' => 'Opções do Bloco de Banner',
                'fields' => array(
                    array(
                        'key' => 'field_69a57b1ea43d6',
                        'label' => 'Imagem',
                        'name' => 'block_banner_image',
                        'aria-label' => '',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'id',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                        'allow_in_bindings' => 0,
                        'preview_size' => 'medium',
                    ),
                    array(
                        'key' => 'field_69a57bafa43d7',
                        'label' => 'URL',
                        'name' => 'block_banner_url',
                        'aria-label' => '',
                        'type' => 'url',
                        'instructions' => '',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'allow_in_bindings' => 0,
                        'placeholder' => '',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'block',
                            'operator' => '==',
                            'value' => 'acf/dynahub-block-banner',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => true,
                'description' => '',
                'show_in_rest' => 0,
                'display_title' => '',
            ));
        }
    }

    public function register_dynamic_grid_block()
    {
        if (function_exists('acf_register_block_type')) {
            acf_register_block_type([
                'name'            => 'dynahub-dynamic-grid',
                'title'           => __('Grid de posts dinamico', 'dynahub'),
                'description'     => __('Exibe um grid de posts.'),
                'render_template' => get_template_directory() . '/components/blocks/dynamic-grid/_index.php',
                'category'        => 'dynahub',
                'icon'            => 'grid-view',
                'keywords'        => ['grid', 'posts'],
            ]);
        }

        if (! function_exists('acf_add_local_field_group')) {
            return;
        }

        acf_add_local_field_group(array(
            'key' => 'group_69b03efc845af',
            'title' => 'Opções do Bloco de Grid de Posts Dinâmicos',
            'fields' => array(
                array(
                    'key' => 'field_69b03efd01bbf',
                    'label' => 'Estilo do Layout',
                    'name' => 'block_dynamic_post_grid_layout_style',
                    'aria-label' => '',
                    'type' => 'select',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        'default' => 'Grid Padrão',
                        'list' => 'Lista',
                        'magazine' => 'Magazine',
                        'masonry' => 'Masonry',
                    ),
                    'default_value' => false,
                    'return_format' => 'value',
                    'multiple' => 0,
                    'allow_null' => 0,
                    'allow_in_bindings' => 0,
                    'ui' => 0,
                    'ajax' => 0,
                    'placeholder' => '',
                    'create_options' => 0,
                    'save_options' => 0,
                ),
                array(
                    'key' => 'field_69b03fd101bc0',
                    'label' => 'Colunas',
                    'name' => 'block_dynamic_post_grid_columns',
                    'aria-label' => '',
                    'type' => 'select',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        2 => '2',
                        3 => '3',
                        4 => '4',
                    ),
                    'default_value' => false,
                    'return_format' => 'value',
                    'multiple' => 0,
                    'allow_null' => 0,
                    'allow_in_bindings' => 0,
                    'ui' => 0,
                    'ajax' => 0,
                    'placeholder' => '',
                    'create_options' => 0,
                    'save_options' => 0,
                ),
                array(
                    'key' => 'field_69b040d701bc1',
                    'label' => 'Opções da Query',
                    'name' => '',
                    'aria-label' => '',
                    'type' => 'accordion',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'open' => 1,
                    'multi_expand' => 0,
                    'endpoint' => 0,
                ),
                array(
                    'key' => 'field_69b0412101bc2',
                    'label' => 'Categoria',
                    'name' => 'block_dynamic_post_grid_categories',
                    'aria-label' => '',
                    'type' => 'taxonomy',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'taxonomy' => 'category',
                    'add_term' => 0,
                    'save_terms' => 0,
                    'load_terms' => 0,
                    'return_format' => 'id',
                    'field_type' => 'checkbox',
                    'allow_in_bindings' => 0,
                    'bidirectional' => 0,
                    'multiple' => 0,
                    'allow_null' => 0,
                    'bidirectional_target' => array(),
                ),
                array(
                    'key' => 'field_69b0419101bc3',
                    'label' => 'Quantidade de posts',
                    'name' => 'block_dynamic_post_grid_post_number',
                    'aria-label' => '',
                    'type' => 'number',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'min' => '',
                    'max' => '',
                    'allow_in_bindings' => 0,
                    'placeholder' => '',
                    'step' => '',
                    'prepend' => '',
                    'append' => '',
                ),
                array(
                    'key' => 'field_69b041bb01bc4',
                    'label' => 'Ordenação',
                    'name' => 'block_dynamic_post_grid_ordenation',
                    'aria-label' => '',
                    'type' => 'select',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        'recent' => 'Posts Recentes',
                        'most-read' => 'Mais lidos',
                    ),
                    'default_value' => false,
                    'return_format' => 'value',
                    'multiple' => 0,
                    'allow_null' => 0,
                    'allow_in_bindings' => 0,
                    'ui' => 0,
                    'ajax' => 0,
                    'placeholder' => '',
                    'create_options' => 0,
                    'save_options' => 0,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'block',
                        'operator' => '==',
                        'value' => 'acf/dynahub-dynamic-grid',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
            'show_in_rest' => 0,
            'display_title' => '',
        ));
    }
}
