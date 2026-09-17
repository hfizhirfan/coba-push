<?php
/**
 * Theme bootstrap.
 *
 * @package MBSCCTV
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! defined( 'MBSCCTV_VERSION' ) ) {
    define( 'MBSCCTV_VERSION', '3.7.0' );
}

$mbscctv_includes = array(
    'setup',
    'enqueue',
    'helpers',
    'admin',
    'theme-options',
    'gutenberg-template',
    'home-editor',
    'custom-post-types',
    'menus',
    'widgets',
    'woocommerce',
);

foreach ( $mbscctv_includes as $mbscctv_include ) {
    require_once get_template_directory() . '/inc/' . $mbscctv_include . '.php';
}
