<?php
/**
 * Reusable content card.
 *
 * @package MBSCCTV
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$defaults = array(
    'title'       => '',
    'description' => '',
    'url'         => '',
    'image'       => '',
    'image_alt'   => '',
    'icon'        => '',
    'class'       => '',
);
$args = wp_parse_args( $args ?? array(), $defaults );
$tag  = $args['url'] ? 'a' : 'article';
?>
<<?php echo tag_escape( $tag ); ?>
    class="<?php echo esc_attr( 'group block overflow-hidden rounded-lg border border-slate-200 bg-white dark:border-slate-700 dark:bg-slate-800 ' . $args['class'] ); ?>"
    <?php echo $args['url'] ? 'href="' . esc_url( $args['url'] ) . '"' : ''; ?>>
    <?php if ( $args['image'] ) : ?>
        <img class="h-48 w-full object-cover" src="<?php echo esc_url( $args['image'] ); ?>" alt="<?php echo esc_attr( $args['image_alt'] ); ?>">
    <?php endif; ?>
    <div class="p-6">
        <?php if ( $args['icon'] ) : ?>
            <span class="material-symbols-outlined mb-4 text-3xl text-primary" aria-hidden="true"><?php echo esc_html( $args['icon'] ); ?></span>
        <?php endif; ?>
        <h3 class="mb-2 text-xl font-bold transition-colors group-hover:text-primary"><?php echo esc_html( $args['title'] ); ?></h3>
        <?php if ( $args['description'] ) : ?>
            <p class="text-sm text-slate-600 dark:text-slate-400"><?php echo esc_html( $args['description'] ); ?></p>
        <?php endif; ?>
    </div>
</<?php echo tag_escape( $tag ); ?>>
