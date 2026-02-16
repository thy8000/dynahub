<?php

/**
 * Index template
 *
 * @package Dynahub
 */

get_header();
?>

<main id="main" class="site-main">
  <div class="container-custom py-12">

    <?php if (have_posts()) : ?>

      <header class="page-header mb-8">
        <?php
        if (is_home() && !is_front_page()) :
        ?>
          <h1 class="text-4xl font-bold text-gray-900 mb-4">
            <?php single_post_title(); ?>
          </h1>
        <?php
        elseif (is_archive()) :
        ?>
          <h1 class="text-4xl font-bold text-gray-900 mb-4">
            <?php the_archive_title(); ?>
          </h1>
        <?php
          the_archive_description('<div class="text-gray-600 mt-2">', '</div>');
        endif;
        ?>
      </header>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
        while (have_posts()) :
          the_post();
        ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow'); ?>>
            <?php if (has_post_thumbnail()) : ?>
              <div class="aspect-video overflow-hidden">
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover')); ?>
                </a>
              </div>
            <?php endif; ?>

            <div class="p-6">
              <h2 class="text-2xl font-semibold mb-2">
                <a href="<?php the_permalink(); ?>" class="text-gray-900 hover:text-primary transition-colors">
                  <?php the_title(); ?>
                </a>
              </h2>

              <div class="text-sm text-gray-500 mb-4">
                <time datetime="<?php echo get_the_date('c'); ?>">
                  <?php echo get_the_date(); ?>
                </time>
                <span class="mx-2">•</span>
                <span><?php the_author(); ?></span>
              </div>

              <div class="text-gray-700 mb-4">
                <?php the_excerpt(); ?>
              </div>

              <a href="<?php the_permalink(); ?>" class="btn btn-primary inline-block">
                Ler mais
              </a>
            </div>
          </article>
        <?php
        endwhile;
        ?>
      </div>

      <div class="mt-8">
        <?php
        the_posts_pagination(array(
          'mid_size' => 2,
          'prev_text' => __('« Anterior', 'dynahub'),
          'next_text' => __('Próximo »', 'dynahub'),
        ));
        ?>
      </div>

    <?php else : ?>

      <div class="text-center py-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">
          <?php esc_html_e('Nada encontrado', 'dynahub'); ?>
        </h1>
        <p class="text-gray-600 mb-6">
          <?php esc_html_e('Desculpe, mas não encontramos o que você procura.', 'dynahub'); ?>
        </p>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
          <?php esc_html_e('Voltar ao início', 'dynahub'); ?>
        </a>
      </div>

    <?php endif; ?>

  </div>
</main>

<?php
get_footer();
