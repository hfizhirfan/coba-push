<?php
/**
 * General theme helper functions.
 *
 * @package MBSCCTV
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Locate a saved Gutenberg block by its custom CSS class.
 */
function bv_find_block_by_class( $blocks, $class_name ) {
    foreach ( $blocks as $block ) {
        $classes = preg_split( '/\s+/', trim( $block['attrs']['className'] ?? '' ) );
        if ( in_array( $class_name, $classes, true ) ) {
            return $block;
        }

        $match = bv_find_block_by_class( $block['innerBlocks'] ?? array(), $class_name );
        if ( null !== $match ) {
            return $match;
        }
    }

    return null;
}

/**
 * Read an editor image while keeping the PHP template's layout and styling.
 *
 * The queried page also supports WordPress previews. Parse once per content
 * version, and never sync options or overwrite the user's saved blocks.
 * Gallery slots use column positions so an empty column cannot shift images.
 */
function bv_get_home_block_image_url( $class_name, $fallback, $column_index = null ) {
    if ( ! is_front_page() || ! class_exists( 'WP_HTML_Tag_Processor' ) ) {
        return $fallback;
    }

    $page = get_queried_object();
    if ( ! $page instanceof WP_Post || 'page' !== $page->post_type ) {
        return $fallback;
    }

    static $cached_content = null;
    static $blocks = array();
    if ( $cached_content !== $page->post_content ) {
        $cached_content = $page->post_content;
        $blocks = parse_blocks( $cached_content );
    }

    $block = bv_find_block_by_class( $blocks, $class_name );
    if ( null === $block ) {
        return $fallback;
    }

    if ( null !== $column_index ) {
        $columns = array_values( array_filter( $block['innerBlocks'] ?? array(), function( $child ) {
            return 'core/column' === $child['blockName'];
        } ) );
        $block = $columns[ $column_index ] ?? null;
        if ( null === $block ) {
            return $fallback;
        }
    }

    // Saved HTML also covers legacy blocks displaying "Attempt recovery".
    // Only the image URL is used; editor wrappers and dimensions stay in Gutenberg.
    $html = new WP_HTML_Tag_Processor( serialize_block( $block ) );
    if ( $html->next_tag( 'IMG' ) ) {
        $src = $html->get_attribute( 'src' );
        if ( is_string( $src ) && '' !== trim( $src ) ) {
            $url = esc_url_raw( $src );
            if ( '' !== $url ) {
                return $url;
            }
        }
    }

    return $fallback;
}

/**
 * Find a Media Library image by attachment slug.
 *
 * Useful for this lightweight template because the client uploaded logo assets
 * directly to Media Library without requiring a theme options page.
 */
function ptpancar_get_attachment_image_url_by_slug( $slugs, $size = 'full' ) {
    foreach ( (array) $slugs as $slug ) {
        $attachments = get_posts( array(
            'name'           => sanitize_title( $slug ),
            'post_type'      => 'attachment',
            'post_status'    => 'inherit',
            'posts_per_page' => 1,
            'fields'         => 'ids',
        ) );

        if ( ! empty( $attachments ) ) {
            $url = wp_get_attachment_image_url( $attachments[0], $size );

            if ( $url ) {
                return $url;
            }
        }
    }

    if ( has_custom_logo() ) {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $url            = wp_get_attachment_image_url( $custom_logo_id, $size );

        if ( $url ) {
            return $url;
        }
    }

    return '';
}

/**
 * Find a Media Library file URL by attachment slug.
 */
function ptpancar_get_attachment_url_by_slug( $slugs ) {
    foreach ( (array) $slugs as $slug ) {
        $attachments = get_posts( array(
            'name'           => sanitize_title( $slug ),
            'post_type'      => 'attachment',
            'post_status'    => 'inherit',
            'posts_per_page' => 1,
            'fields'         => 'ids',
        ) );

        if ( ! empty( $attachments ) ) {
            $url = wp_get_attachment_url( $attachments[0] );

            if ( $url ) {
                return $url;
            }
        }
    }

    return '';
}
/**
 * Estimated reading time for blog posts
 */
function mbscctv_reading_time( $post_id = null ) {
    $content    = get_post_field( 'post_content', $post_id ?: get_the_ID() );
    $word_count = str_word_count( strip_tags( $content ) );
    $minutes    = max( 1, ceil( $word_count / 200 ) );
    return $minutes;
}

/**
 * Blog pagination styling (reuse WooCommerce pagination CSS)
 */
function mbscctv_blog_pagination_class( $class ) {
    return str_replace( 'pagination', 'pagination woocommerce-pagination', $class );
}
add_filter( 'navigation_markup_template', function( $template ) {
    return str_replace( 'nav-links', 'nav-links woocommerce-pagination', $template );
} );
/**
 * Use the uploaded white logo as the site favicon.
 */
function ptpancar_site_icon_url( $url, $size, $blog_id ) {
    $white_logo_url = function_exists( 'ptpancar_get_attachment_image_url_by_slug' )
        ? ptpancar_get_attachment_image_url_by_slug( array( 'white-logo', 'white logo' ), 'full' )
        : '';

    return $white_logo_url ? $white_logo_url : $url;
}
add_filter( 'get_site_icon_url', 'ptpancar_site_icon_url', 10, 3 );

function ptpancar_theme_favicon_links() {
    $white_logo_url = function_exists( 'ptpancar_get_attachment_image_url_by_slug' )
        ? ptpancar_get_attachment_image_url_by_slug( array( 'white-logo', 'white logo' ), 'full' )
        : '';

    if ( ! $white_logo_url ) {
        return;
    }
    ?>
    <link rel="icon" href="<?php echo esc_url( $white_logo_url ); ?>" sizes="32x32" />
    <link rel="icon" href="<?php echo esc_url( $white_logo_url ); ?>" sizes="192x192" />
    <link rel="apple-touch-icon" href="<?php echo esc_url( $white_logo_url ); ?>" />
    <?php
}
add_action( 'wp_head', 'ptpancar_theme_favicon_links', 100 );
add_action( 'admin_head', 'ptpancar_theme_favicon_links', 100 );
