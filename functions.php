<?php

/**
 * Dynahub Theme Functions
 *
 * @package Dynahub
 */

if (!defined('ABSPATH')) {
    exit;
}

$composer_autoload = get_template_directory() . '/vendor/autoload.php';
if (file_exists($composer_autoload)) {
    require_once $composer_autoload;
}

new \Dynahub\Global\GlobalHooks();
new \Dynahub\CustomBlocks\Register();
