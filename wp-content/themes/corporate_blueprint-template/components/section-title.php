<?php
/**
 * Reusable section heading.
 *
 * @package MBSCCTV
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$defaults = array(
    'eyebrow'    => '',
    'title'      => '',
    'description' => '',
    'align'      => 'left',
    'level'      => 2,
    'class'      => '',
);
$args  = wp_parse_args( $args ?? array(), $defaults );
$level = min( 6, max( 2, (int) $args['level'] ) );
$align = 'center' === $args['align'] ? ' text-center mx-auto' : '';
?>
<div class="<?php echo esc_attr( 'max-w-2xl' . $align . ( $args['class'] ? ' ' . $args['class'] : '' ) ); ?>">
    <?php if ( $args['eyebrow'] ) : ?>
        <p class="mb-2 text-xs font-bold uppercase text-primary"><?php echo esc_html( $args['eyebrow'] ); ?></p>
    <?php endif; ?>
    <<?php echo tag_escape( 'h' . $level ); ?> class="mb-4 text-3xl font-black"><?php echo esc_html( $args['title'] ); ?></<?php echo tag_escape( 'h' . $level ); ?>>
    <?php if ( $args['description'] ) : ?>
        <p class="text-slate-600 dark:text-slate-400"><?php echo esc_html( $args['description'] ); ?></p>
    <?php endif; ?>
</div>
