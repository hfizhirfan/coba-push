<?php
/**
 * Reusable social links.
 *
 * @package MBSCCTV
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$defaults = array(
    'items' => array(),
    'class' => '',
);
$args = wp_parse_args( $args ?? array(), $defaults );
?>
<div class="<?php echo esc_attr( 'flex items-center gap-2 ' . $args['class'] ); ?>">
    <?php foreach ( $args['items'] as $item ) : ?>
        <?php
        $item = wp_parse_args(
            $item,
            array(
                'label' => '',
                'url'   => '#',
                'icon'  => 'share',
            )
        );
        ?>
        <a class="flex size-10 items-center justify-center rounded-md bg-slate-100 text-slate-600 transition-colors hover:bg-primary hover:text-white dark:bg-slate-800"
           href="<?php echo esc_url( $item['url'] ); ?>"
           target="_blank"
           rel="noopener noreferrer"
           aria-label="<?php echo esc_attr( $item['label'] ); ?>">
            <span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html( $item['icon'] ); ?></span>
        </a>
    <?php endforeach; ?>
</div>
