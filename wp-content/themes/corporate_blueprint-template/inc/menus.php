<?php
/**
 * Navigation menus and walkers.
 *
 * @package MBSCCTV
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register theme menu locations.
 */
function mbscctv_register_menus() {
    register_nav_menus(
        array(
            'primary'         => __( 'Primary Menu', 'mbscctv' ),
            'footer_links'    => __( 'Footer Quick Links', 'mbscctv' ),
            'footer_products' => __( 'Footer Products', 'mbscctv' ),
        )
    );
}
add_action( 'after_setup_theme', 'mbscctv_register_menus' );

/**
 * Custom Nav Walker for Tailwind classes
 */
class MBSCCTV_Nav_Walker extends Walker_Nav_Menu {
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = 'text-sm font-semibold hover:text-primary transition-colors';
        $output .= '<a class="' . esc_attr( $classes ) . '" href="' . esc_url( $item->url ) . '">';
        $output .= esc_html( $item->title );
    }

    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= '</a>';
    }
}

/**
 * Footer Nav Walker
 */
class MBSCCTV_Footer_Nav_Walker extends Walker_Nav_Menu {
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $output .= '<li>';
        $output .= '<a class="hover:text-primary transition-colors" href="' . esc_url( $item->url ) . '">';
        $output .= esc_html( $item->title );
        $output .= '</a>';
    }

    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
}

/**
 * Fallback menu when no menu is assigned
 */
function mbscctv_fallback_menu() {
    echo '<a class="text-sm font-semibold hover:text-primary transition-colors" href="' . esc_url( home_url( '/' ) ) . '">Home</a>';
}
