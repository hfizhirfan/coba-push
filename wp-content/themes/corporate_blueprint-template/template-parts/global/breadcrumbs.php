<?php
/**
 * Breadcrumb navigation.
 *
 * @package MBSCCTV
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$current_title = $args['title'] ?? get_the_title();
?>
<nav class="mb-6 text-sm text-slate-400" aria-label="<?php esc_attr_e( 'Breadcrumb', 'mbscctv' ); ?>">
    <a class="transition-colors hover:text-white" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php esc_html_e( 'Beranda', 'mbscctv' ); ?>
    </a>
    <span class="material-symbols-outlined mx-1 align-middle text-xs" aria-hidden="true">chevron_right</span>
    <span class="font-semibold text-white"><?php echo esc_html( $current_title ); ?></span>
</nav>
