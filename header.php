<?php
/**
 * Header template
 *
 * @package Dynahub
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>

<body <?php body_class('bg-gray-50 text-gray-900'); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
  <a class="skip-link screen-reader-text sr-only" href="#main">
    <?php esc_html_e('Pular para o conteúdo', 'dynahub'); ?>
  </a>

  <header id="masthead" class="site-header bg-white shadow-sm sticky top-0 z-50">
    <div class="container-custom">
      <div class="flex items-center justify-between py-4">
        
        <div class="site-branding">
          <?php
          if (has_custom_logo()) {
            the_custom_logo();
          } else {
            ?>
            <h1 class="text-2xl font-bold">
              <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="text-gray-900 hover:text-primary transition-colors">
                <?php bloginfo('name'); ?>
              </a>
            </h1>
            <?php
            $description = get_bloginfo('description', 'display');
            if ($description || is_customize_preview()) {
              ?>
              <p class="text-sm text-gray-600 mt-1"><?php echo $description; ?></p>
              <?php
            }
          }
          ?>
        </div>

        <nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e('Menu Principal', 'dynahub'); ?>">
          <button
            class="md:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors"
            data-nav-toggle
            aria-expanded="false"
            aria-controls="primary-menu"
            aria-label="<?php esc_attr_e('Toggle menu', 'dynahub'); ?>"
          >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </button>

          <div data-nav-menu class="hidden md:flex md:items-center md:space-x-6">
            <?php
            wp_nav_menu(array(
              'theme_location' => 'menu-1',
              'menu_id' => 'primary-menu',
              'container' => false,
              'menu_class' => 'flex items-center space-x-6',
              'fallback_cb' => 'dynahub_fallback_menu',
            ));
            ?>
          </div>
        </nav>

      </div>
      
      <!-- Menu Mobile -->
      <div class="hidden md:hidden pb-4" data-nav-menu>
        <?php
        wp_nav_menu(array(
          'theme_location' => 'menu-1',
          'container' => false,
          'menu_class' => 'flex flex-col space-y-2',
          'fallback_cb' => 'dynahub_fallback_menu',
        ));
        ?>
      </div>
    </div>
  </header>

<?php
/**
 * Função de fallback para o menu
 */
function dynahub_fallback_menu() {
  echo '<ul class="flex flex-col md:flex-row md:space-x-6 space-y-2 md:space-y-0">';
  echo '<li><a href="' . esc_url(home_url('/')) . '" class="text-gray-700 hover:text-primary transition-colors">' . esc_html__('Início', 'dynahub') . '</a></li>';
  echo '</ul>';
}
