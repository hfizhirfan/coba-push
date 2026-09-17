<?php
/**
 * Front page template - Brows by Veron
 * Luxury PMU & Brow Studio (Direct Template Parts)
 *
 * @package BrowsByVeron
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    // 1. Hero / Welcome
    bv_render_home_section( 'hero' );

    // 2. About Veron
    bv_render_home_section( 'about' );

    // 3. Services & Quality Promise
    bv_render_home_section( 'services' );

    // 4. Official Price List
    bv_render_home_section( 'pricing' );

    // 5. Results Gallery
    bv_render_home_section( 'gallery' );

    // 6. Term & Conditions
    bv_render_home_section( 'terms' );

    // 7. Final Quote & CTA Banner
    bv_render_home_section( 'contact' );
    ?>
</main>

<?php
get_footer();
