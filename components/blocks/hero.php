<?php

if (!defined('ABSPATH')) {
    exit;
}

// Pega o campo hero_post
$hero_post = get_field('hero_post');

// Verifica se existe um post selecionado
if (!$hero_post || empty($hero_post)) {
    return;
}

// Como é um campo relationship com max 1, pega o primeiro item do array
$post = is_array($hero_post) ? $hero_post[0] : $hero_post;

// Dados do post
$post_id = $post->ID;
$post_title = get_the_title($post_id);
$post_url = get_permalink($post_id);
$post_date = get_the_date('d F, Y', $post_id);
$author_id = get_post_field('post_author', $post_id);
$author_name = get_the_author_meta('display_name', $author_id);

// Imagem destacada
$featured_image = get_the_post_thumbnail_url($post_id, 'full');
$featured_image_alt = get_the_post_thumbnail_caption($post_id) ?: $post_title;

// Categoria (primeira categoria do post)
$categories = get_the_category($post_id);
$category_name = !empty($categories) ? strtoupper($categories[0]->name) : '';

// Tempo de leitura (hard-coded)
$reading_time = '20 MINS';

?>

<div class="hero-block relative w-full h-[600px] overflow-hidden">
    <!-- Barra azul no topo -->
    <div class="absolute top-0 left-0 w-full h-1 bg-blue-500 z-10"></div>

    <!-- Imagem de fundo -->
    <?php if ($featured_image) : ?>
        <div class="absolute inset-0 !w-full !h-full">
            <img
                src="<?php echo esc_url($featured_image); ?>"
                alt="<?php echo esc_attr($featured_image_alt); ?>"
                class="!w-full !h-full !object-cover" />
        </div>
    <?php endif; ?>

    <!-- Overlay escuro semi-transparente na parte inferior -->
    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/50 to-transparent z-10"></div>

    <!-- Conteúdo -->
    <div class="relative z-20 h-full flex flex-col justify-end pb-12 px-8">
        <div class="max-w-4xl mx-auto w-full">
            <!-- Tag de categoria -->
            <?php if ($category_name) : ?>
                <div class="mb-4">
                    <span class="inline-block px-4 py-2 bg-orange-400 rounded-md text-white text-sm font-semibold">
                        <?php echo esc_html($category_name); ?>
                    </span>
                </div>
            <?php endif; ?>

            <!-- Título -->
            <h1 class="!text-4xl md:!text-5xl lg:!text-6xl font-bold !text-white mb-6 leading-tight">
                <?php echo esc_html($post_title); ?>
            </h1>

            <!-- Metadados -->
            <div class="flex flex-wrap items-center gap-6 text-white text-sm md:text-base">
                <!-- Autor -->
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                    <span class="uppercase">BY <?php echo esc_html(strtoupper($author_name)); ?></span>
                </div>

                <!-- Data -->
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                    </svg>
                    <span class="uppercase"><?php echo esc_html($post_date); ?></span>
                </div>

                <!-- Tempo de leitura -->
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                    </svg>
                    <span class="uppercase"><?php echo esc_html($reading_time); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>