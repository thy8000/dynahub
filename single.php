<?php
/**
 * Single template
 *
 * @package Dynahub
 */

get_header();

?>

<main id="main" class="site-main">
  <div class="container-custom py-12">
    
    <?php
    while (have_posts()) :
      the_post();
      ?>
      
      <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-lg shadow-md overflow-hidden'); ?>>
        
        <?php if (has_post_thumbnail()) : ?>
          <div class="aspect-video overflow-hidden">
            <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover')); ?>
          </div>
        <?php endif; ?>
        
        <div class="p-8">
          <header class="entry-header mb-6">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">
              <?php the_title(); ?>
            </h1>
            
            <div class="text-sm text-gray-500 mb-4">
              <time datetime="<?php echo get_the_date('c'); ?>">
                <?php echo get_the_date(); ?>
              </time>
              <span class="mx-2">•</span>
              <span><?php the_author(); ?></span>
              <?php if (has_category()) : ?>
                <span class="mx-2">•</span>
                <span><?php the_category(', '); ?></span>
              <?php endif; ?>
            </div>
          </header>

          <div class="entry-content prose prose-lg max-w-none">
            <?php the_content(); ?>
          </div>

          <?php
          wp_link_pages(array(
            'before' => '<div class="page-links mt-8">' . esc_html__('Páginas:', 'dynahub'),
            'after'  => '</div>',
          ));
          ?>

          <footer class="entry-footer mt-8 pt-8 border-t border-gray-200">
            <?php if (has_tag()) : ?>
              <div class="tags mb-4">
                <span class="text-sm font-medium text-gray-700"><?php esc_html_e('Tags:', 'dynahub'); ?></span>
                <?php the_tags('<span class="ml-2">', ', ', '</span>'); ?>
              </div>
            <?php endif; ?>
          </footer>
        </div>
      </article>

      <?php
      // Navegação entre posts
      the_post_navigation(array(
        'prev_text' => '<span class="nav-subtitle">' . esc_html__('Anterior:', 'dynahub') . '</span> <span class="nav-title">%title</span>',
        'next_text' => '<span class="nav-subtitle">' . esc_html__('Próximo:', 'dynahub') . '</span> <span class="nav-title">%title</span>',
      ));

      // Comentários
      if (comments_open() || get_comments_number()) {
        comments_template();
      }

    endwhile;
    ?>
    
  </div>
</main>

<?php
get_footer();
