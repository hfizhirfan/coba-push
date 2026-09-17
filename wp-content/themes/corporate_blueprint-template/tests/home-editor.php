<?php
/** Run: php tests/home-editor.php (uses the local WordPress installation, no writes). */
if ( 'cli' !== PHP_SAPI ) {
    http_response_code( 403 );
    exit;
}
$_SERVER['REQUEST_SCHEME'] = 'http';
$_SERVER['HTTP_HOST'] = 'browsbyveron-wordpress.test';
define( 'DISABLE_WP_CRON', true );
require dirname( __DIR__, 4 ) . '/wp-load.php';

$checks = 0;
function bv_check( $condition, $label ) {
    global $checks;
    if ( ! $condition ) {
        fwrite( STDERR, 'FAIL: ' . $label . PHP_EOL );
        exit( 1 );
    }
    ++$checks;
}

$page = clone get_post( get_option( 'page_on_front' ) );
$query = new WP_Query();
$query->is_page = true;
$query->queried_object = $page;
$query->queried_object_id = $page->ID;
$GLOBALS['wp_query'] = $query;
$backup = get_post_meta( $page->ID, '_bv_home_legacy_content_backup', true );
$legacy_page = clone $page;
$legacy_page->post_content = $backup;
$migration_page = clone $page;
if ( $backup ) {
    $query->queried_object = $legacy_page;
    $migration_page->post_content = bv_get_home_editor_content();
    $query->queried_object = $page;
}

foreach ( bv_home_sections() as $section => $config ) {
    $html = bv_home_template_html( $section );
    $document = bv_home_document( $html );
    $defaults = array_map( function( $f ) { return $f['value']; }, $document['fields'] );
    bv_check( bv_home_apply_values( $html, $defaults ) === $html, $section . ' leaves default markup untouched' );
    // Exercise WordPress's normal attribute sanitization without saving a post.
    $filtered = filter_block_kses_value( $defaults, 'post' );
    bv_check( bv_home_apply_values( $html, $filtered ) === $html, $section . ' handles entities after KSES' );
    foreach ( $document['fields'] as $key => $field ) {
        if ( 'image' === $field['type'] ) {
            $value = 'https://example.com/replacement.png?w=800&crop=1';
            $edited = bv_home_document( bv_home_apply_values( $html, array( $key => $value ) ) );
            bv_check( $edited['fields'][ $key ]['value'] === $value, $section . ' replaces image ' . $key );
            bv_check( bv_home_apply_values( $html, array( $key => 'javascript:alert(1)' ) ) === $html, 'Unsafe image URL is rejected' );
        } else {
            $value = 'Edit $1 & teks baru';
            $edited = bv_home_document( bv_home_apply_values( $html, array( $key => esc_html( $value ) ) ) );
            bv_check( html_entity_decode( $edited['fields'][ $key ]['value'], ENT_QUOTES | ENT_HTML5, 'UTF-8' ) === $value, $section . ' updates text ' . $key );
            $empty = bv_home_apply_values( $html, array( $key => '' ) );
            bv_check( is_string( $empty ) && '' !== $empty, 'Clearing a field keeps its section intact' );
        }
    }
    bv_check( bv_home_apply_values( $html, array( 'unknown' => '<script>bad()</script>' ) ) === $html, 'Unknown fields cannot change a template' );
    // Each migrated value is compared with the saved legacy image at migration time.
    if ( $backup ) {
        $query->queried_object = $legacy_page;
        $expected = bv_home_template_html( $section );
        $query->queried_object = $migration_page;
        $actual = bv_home_apply_values( $html, bv_home_saved_values( $section ) );
        $query->queried_object = $page;
        bv_check( bv_home_document_fragment( $expected )->C14N() === bv_home_document_fragment( $actual )->C14N(), $section . ' migration preserves original layout and latest saved images' );
    }
}

$blocks = array_values( array_filter( parse_blocks( $page->post_content ), function( $b ) { return null !== $b['blockName']; } ) );
bv_check( 7 === count( $blocks ), 'Seven homepage sections are stored' );
foreach ( $blocks as $block ) {
    bv_check( 'browsbyveron/home-section' === $block['blockName'] && '' === $block['innerHTML'], 'No invalid legacy HTML remains in editor blocks' );
    bv_check( ! empty( $block['attrs']['lock']['move'] ) && ! empty( $block['attrs']['lock']['remove'] ), 'Section order is locked' );
}

echo 'PASS: ' . $checks . ' checks; no database changes.' . PHP_EOL;
