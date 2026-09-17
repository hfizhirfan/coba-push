<?php
/**
 * Reusable button component.
 *
 * @package MBSCCTV
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$defaults = array(
    'label'   => '',
    'url'     => '#',
    'variant' => 'primary',
    'icon'    => '',
    'target'  => '',
    'class'   => '',
);
$args     = wp_parse_args( $args ?? array(), $defaults );
$classes  = 'inline-flex items-center justify-center gap-2 px-6 py-3 rounded-md font-bold transition-all';
$classes .= 'secondary' === $args['variant']
    ? ' bg-slate-200 text-slate-900 hover:bg-slate-300 dark:bg-slate-800 dark:text-white dark:hover:bg-slate-700'
    : ' bg-primary text-white hover:bg-primary/90';
$classes .= $args['class'] ? ' ' . $args['class'] : '';
?>
<a class="<?php echo esc_attr( $classes ); ?>"
   href="<?php echo esc_url( $args['url'] ); ?>"
   <?php echo $args['target'] ? 'target="' . esc_attr( $args['target'] ) . '"' : ''; ?>>
    <span><?php echo esc_html( $args['label'] ); ?></span>
    <?php if ( $args['icon'] ) : ?>
        <span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html( $args['icon'] ); ?></span>
    <?php endif; ?>
</a>
