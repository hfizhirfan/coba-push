<?php
/**
 * Shared call to action.
 *
 * @package MBSCCTV
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$defaults = array(
    'title'       => __( 'Siap mendiskusikan kebutuhan Anda?', 'mbscctv' ),
    'description' => __( 'Hubungi tim kami untuk konsultasi dan rekomendasi solusi.', 'mbscctv' ),
    'label'       => __( 'Hubungi Kami', 'mbscctv' ),
    'url'         => function_exists( 'mbscctv_get_whatsapp_url' ) ? mbscctv_get_whatsapp_url() : home_url( '/contact/' ),
);
$args = wp_parse_args( $args ?? array(), $defaults );
?>
<section class="bg-primary py-12 text-white">
    <div class="mx-auto flex max-w-7xl flex-col items-start justify-between gap-6 px-4 sm:px-6 md:flex-row md:items-center lg:px-8">
        <div>
            <h2 class="text-2xl font-black"><?php echo esc_html( $args['title'] ); ?></h2>
            <p class="mt-2 text-white/80"><?php echo esc_html( $args['description'] ); ?></p>
        </div>
        <?php
        get_template_part(
            'components/button',
            null,
            array(
                'label'   => $args['label'],
                'url'     => $args['url'],
                'variant' => 'secondary',
                'icon'    => 'arrow_forward',
                'class'   => 'shrink-0',
            )
        );
        ?>
    </div>
</section>
