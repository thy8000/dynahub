<?php
/**
 * Footer template
 *
 * @package Dynahub
 */
?>

  <footer id="colophon" class="site-footer bg-gray-900 text-gray-300 mt-12">
    <div class="container-custom py-8">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <div>
          <h3 class="text-white font-semibold mb-4"><?php bloginfo('name'); ?></h3>
          <p class="text-sm">
            <?php bloginfo('description'); ?>
          </p>
        </div>

        <div>
          <h3 class="text-white font-semibold mb-4"><?php esc_html_e('Links Rápidos', 'dynahub'); ?></h3>
          <?php
          wp_nav_menu(array(
            'theme_location' => 'menu-1',
            'container' => false,
            'menu_class' => 'flex flex-col space-y-2 text-sm',
            'fallback_cb' => false,
          ));
          ?>
        </div>

        <div>
          <h3 class="text-white font-semibold mb-4"><?php esc_html_e('Contato', 'dynahub'); ?></h3>
          <p class="text-sm">
            <?php esc_html_e('Entre em contato conosco', 'dynahub'); ?>
          </p>
        </div>

      </div>

      <div class="border-t border-gray-800 mt-8 pt-8 text-center text-sm">
        <p>
          &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. 
          <?php esc_html_e('Todos os direitos reservados.', 'dynahub'); ?>
        </p>
      </div>
    </div>
  </footer>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
