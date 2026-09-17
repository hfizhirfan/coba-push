<?php
/**
 * Shared page header.
 *
 * @package MBSCCTV
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$defaults = array(
    'title'       => get_the_title(),
    'description' => '',
    'image'       => '',
);
$args = wp_parse_args( $args ?? array(), $defaults );
?>
<section class="relative overflow-hidden bg-slate-900 py-14 text-white lg:py-20">
    <?php if ( $args['image'] ) : ?>
        <img class="absolute inset-0 size-full object-cover opacity-20" src="<?php echo esc_url( $args['image'] ); ?>" alt="">
    <?php endif; ?>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <?php get_template_part( 'template-parts/global/breadcrumbs', null, array( 'title' => $args['title'] ) ); ?>
        <h1 class="mb-3 text-3xl font-black lg:text-4xl"><?php echo esc_html( $args['title'] ); ?></h1>
        <?php if ( $args['description'] ) : ?>
            <p class="max-w-2xl leading-relaxed text-slate-300"><?php echo esc_html( $args['description'] ); ?></p>
        <?php endif; ?>
    </div>
</section>
