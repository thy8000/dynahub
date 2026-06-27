<?php

class OptionPage
{

	public function __construct()
	{
		add_action('acf/init', array($this, 'add_options_page'), 5);
		add_action('acf/init', array($this, 'add_general_options_fields'), 10);
		add_action('acf/init', array($this, 'add_home_options_page_fields'), 10);
	}

	public function add_options_page()
	{
		if (! function_exists('acf_add_options_page')) {
			return;
		}

		acf_add_options_page(
			array(
				'page_title' => 'Opções do Tema',
				'menu_title' => 'Opções do Tema',
				'menu_slug'  => 'theme-options',
				'capability' => 'edit_posts',
				'redirect'   => true,
				'show_in_graphql' => true,
			)
		);

		acf_add_options_sub_page(
			array(
				'page_title'  => 'Opções Gerais',
				'menu_title'  => 'Opções Gerais',
				'parent_slug' => 'theme-options',
				'menu_slug'   => 'opcoes-da-home',
				'show_in_graphql' => true,
			)
		);

		acf_add_options_sub_page(
			array(
				'page_title'  => 'Opções da Home',
				'menu_title'  => 'Opções da Home',
				'parent_slug' => 'theme-options',
				'menu_slug'   => 'home-options',
				'show_in_graphql' => true,
			)
		);
	}

	public function add_general_options_fields()
	{
		if (! function_exists('acf_add_local_field_group')) {
			return;
		}

		acf_add_local_field_group(
			array(
				'key'      => 'group_home_options',
				'title'    => 'Opções Gerais',
				'show_in_graphql' => true,
				'graphql_field_name' => 'themeOptions',
				'fields'   => array(
					array(
						'key'       => 'field_header_tab',
						'label'     => 'Header',
						'name'      => 'header_tab',
						'type'      => 'tab',
						'placement' => 'top',
						'endpoint'  => 0,
					),
					array(
						'key'        => 'field_header_logo',
						'label'      => 'Logo do Site',
						'name'       => 'header_logo',
						'type'       => 'group',
						'layout'     => 'block',
						'sub_fields' => array(
							array(
								'key'           => 'field_logo_image',
								'label'         => 'Imagem do Logo',
								'name'          => 'logo_image',
								'type'          => 'image',
								'return_format' => 'array',
								'preview_size'  => 'medium',
								'library'       => 'all',
							),
						),
					),
					array(
						'key'        => 'field_redes_sociais',
						'label'      => 'Redes Sociais',
						'name'       => 'social_share',
						'type'       => 'group',
						'layout'     => 'block',
						'sub_fields' => array(
							array(
								'key'   => 'field_facebook',
								'label' => 'Facebook',
								'name'  => 'facebook',
								'type'  => 'url',
							),
							array(
								'key'   => 'field_instagram',
								'label' => 'Instagram',
								'name'  => 'instagram',
								'type'  => 'url',
							),
							array(
								'key'   => 'field_linkedin',
								'label' => 'Linkedin',
								'name'  => 'linkedin',
								'type'  => 'url',
							),
							array(
								'key'   => 'field_twitter',
								'label' => 'Twitter',
								'name'  => 'twitter',
								'type'  => 'url',
							),
						),
					),
				),
				'location' => array(
					array(
						array(
							'param'    => 'options_page',
							'operator' => '==',
							'value'    => 'opcoes-da-home',
						),
					),
				),
			)
		);
	}

	public function add_home_options_page_fields()
	{
		if (! function_exists('acf_add_local_field_group')) {
			return;
		}

		acf_add_local_field_group(
			array(
				'key'      => 'group_home_page_options',
				'title'    => 'Opções da Home',
				'show_in_graphql' => true,
				'graphql_field_name' => 'homeOptions',
				'fields'   => array(
					array(
						'key'       => 'field_home_flexible_content',
						'label'     => 'Conteúdo da Home',
						'name'      => 'home_flexible_content',
						'type'      => 'flexible_content',
						'layouts'   => array(
							array(
								'key'        => 'layout_posts_section',
								'name'       => 'posts_section',
								'label'      => 'Seção de Posts (Hero)',
								'display'    => 'block',
								'sub_fields' => array(
									array(
										'key'           => 'field_posts_repeater',
										'label'         => 'Posts',
										'name'          => 'posts_repeater',
										'type'          => 'relationship',
										'post_type'     => array('post'),
										'filters'       => array('search'),
										'return_format' => 'object',
										'max'           => 2,
									),
								),
							),
							array(
								'key'        => 'layout_categories_section',
								'name'       => 'categories_section',
								'label'      => 'Seção de Categorias',
								'display'    => 'block',
								'sub_fields' => array(
									array(
										'key'   => 'field_category_section_title',
										'label' => 'Título da Seção',
										'name'  => 'section_title',
										'type'  => 'text',
									),
									array(
										'key'          => 'field_categories_repeater',
										'label'        => 'Categorias',
										'name'         => 'categories_repeater',
										'type'         => 'repeater',
										'max'          => 6,
										'layout'       => 'block',
										'button_label' => 'Adicionar Categoria',
										'sub_fields'   => array(
											array(
												'key'           => 'field_selected_category',
												'label'         => 'Selecionar Categoria',
												'name'          => 'selected_category',
												'type'          => 'taxonomy',
												'taxonomy'      => 'category',
												'field_type'    => 'select',
												'allow_null'    => 0,
												'add_term'      => 0,
												'save_terms'    => 0,
												'load_terms'    => 0,
												'return_format' => 'id',
												'multiple'      => 0,
											),
										),
									),
								),
							),
							array(
								'key'        => 'layout_sidebar_section',
								'name'       => 'sidebar_section',
								'label'      => 'Seção de Sidebar',
								'display'    => 'block',
								'sub_fields' => array(
									array(
										'key'   => 'field_sidebar_section_title',
										'label' => 'Título da Seção',
										'name'  => 'section_title',
										'type'  => 'text',
									),
									array(
										'key'   => 'field_sidebar_section_sidebar_title',
										'label' => 'Título da Sidebar',
										'name'  => 'section_title',
										'type'  => 'text',
									),
									array(
										'key'           => 'field_sidebar_posts_repeater',
										'label'         => 'Posts em Destaque',
										'name'          => 'sidebar_posts_repeater',
										'type'          => 'relationship',
										'post_type'     => array('post'),
										'filters'       => array('search'),
										'return_format' => 'object',
										'max'           => 5,
									),
									array(
										'key'           => 'field_sidebar_type_select',
										'label'         => 'Tipo de Sidebar',
										'name'          => 'sidebar_type',
										'type'          => 'select',
										'choices'       => array(
											'sidebar_social_and_newsletter' => 'Redes Sociais & Newsletter',
											'recent_posts_sidebar'  => 'Posts Recentes',
											'hot_news_sidebar'      => 'Notícias Destacadas',
										),
										'allow_null'    => 0,
										'multiple'      => 0,
										'ui'            => 0,
										'return_format' => 'value',
									),
									array(
										'key'           => 'field_sidebar_grid_type_select',
										'label'         => 'Tipo de Grid de Posts',
										'name'          => 'sidebar_grid_type',
										'type'          => 'select',
										'choices'       => array(
											'grid_1_featured_big_3_small' => '1 Destaque e 3 laterais',
											'grid_2_big_3_medium_vertical' => '2 Destaque e 3 médios vertical',
											'grid_4_big_vertical'  => '4 Destaque vertical',
										),
										'allow_null'    => 0,
										'multiple'      => 0,
										'ui'            => 0,
										'return_format' => 'value',
									),
								),
							),
							array(
								'key'        => 'layout_videos_section',
								'name'       => 'videos_section',
								'label'      => 'Seção de Vídeos',
								'display'    => 'block',
								'sub_fields' => array(
									array(
										'key'   => 'field_section_title',
										'label' => 'Título da Seção',
										'name'  => 'section_title',
										'type'  => 'text',
									),
									array(
										'key'           => 'field_section_archive_link',
										'label'         => 'Link do Archive',
										'name'          => 'section_archive_link',
										'type'          => 'link',
										'return_format' => 'array',
									),
									array(
										'key'           => 'field_section_posts',
										'label'         => 'Selecionar Posts',
										'name'          => 'section_posts',
										'type'          => 'relationship',
										'post_type'     => array('post'),
										'filters'       => array('search'),
										'return_format' => 'object',
										'max'           => 4,
									),
								),
							),
						),
					),
				),
				'location' => array(
					array(
						array(
							'param'    => 'options_page',
							'operator' => '==',
							'value'    => 'home-options',
						),
					),
				),
			)
		);
	}
}

new OptionPage();
