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

    <?php get_template_part('components/header'); ?>