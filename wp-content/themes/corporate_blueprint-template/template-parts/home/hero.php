<?php
/**
 * Hero / Welcome Section - Brows by Veron
 */
$welcome = get_option( 'bv_hero_welcome', 'Welcome to' );
$title_main = get_option( 'bv_hero_title_main', 'Brows' );
$title_italic = get_option( 'bv_hero_title_italic', "by Veron's" );
$subtitle = get_option( 'bv_hero_subtitle', 'BEAUTY STUDIO' );
$badge_1 = get_option( 'bv_hero_badge_1', '3x Hairstroke Champion in 🇮🇩' );
$badge_2_title = get_option( 'bv_hero_badge_2_title', 'Veron' );
$badge_2_subtitle = get_option( 'bv_hero_badge_2_subtitle', 'Worldwide Championship PMU Artist' );
$badge_3 = get_option( 'bv_hero_badge_3', 'TOP 5 Hairstroke Worldwide Championship 🏆' );

$img_left = get_option( 'bv_hero_img_left', 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=600&auto=format&fit=crop' );
$img_center = get_option( 'bv_hero_img_center', 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=900&auto=format&fit=crop' );
$img_right = get_option( 'bv_hero_img_right', 'https://images.unsplash.com/photo-1580489944761-15a19d654956?q=80&w=600&auto=format&fit=crop' );

$img_left = bv_get_home_block_image_url( 'bv-rotate-left', $img_left );
$img_center = bv_get_home_block_image_url( 'bv-polaroid-center', $img_center );
$img_right = bv_get_home_block_image_url( 'bv-rotate-right', $img_right );

$wa_url = mbscctv_get_whatsapp_url();
?>
<section id="hero" class="relative pt-10 pb-16 lg:pt-14 lg:pb-20 overflow-hidden bg-bv-bg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Welcome Headings -->
        <div class="text-center max-w-4xl mx-auto space-y-2 mb-8 bbz-reveal">
            <p class="font-serif text-2xl sm:text-3xl text-bv-brown italic font-medium">
                <?php echo esc_html( $welcome ); ?>
            </p>
            <h1 class="font-serif text-4xl sm:text-6xl lg:text-7xl text-bv-ink tracking-tight font-bold leading-tight">
                <?php echo esc_html( $title_main ); ?> <span class="text-bv-brown italic font-serif"><?php echo esc_html( $title_italic ); ?></span>
            </h1>
            <p class="font-sans text-xs sm:text-sm uppercase tracking-[0.28em] text-bv-muted font-bold pt-1">
                <?php echo esc_html( $subtitle ); ?>
            </p>
        </div>

        <!-- 3 Floating Polaroid Cards (Exact Pixel Perfect Pure CSS Cluster) -->
        <div class="bv-hero-collage-wrapper bbz-reveal">
            
            <!-- Left: 3x Hairstroke Champion -->
            <div class="bv-polaroid-left">
                <div class="bv-polaroid text-center">
                    <div class="bv-polaroid-media">
                        <img src="<?php echo esc_url( $img_left ); ?>" 
                             alt="Veron 3x Hairstroke Champion"/>
                    </div>
                    <p class="font-serif text-xs sm:text-sm font-bold text-bv-ink leading-tight">
                        <?php echo nl2br( esc_html( $badge_1 ) ); ?>
                    </p>
                </div>
            </div>

            <!-- Center: Veron PMU Artist Profile (Prominent & Elevated) -->
            <div class="bv-polaroid-center">
                <div class="bv-polaroid text-center shadow-2xl">
                    <div class="bv-polaroid-media">
                        <img src="<?php echo esc_url( $img_center ); ?>" 
                             alt="Veron - Master PMU Artist"/>
                    </div>
                    <p class="font-serif text-2xl sm:text-3xl font-bold text-bv-ink">
                        <?php echo esc_html( $badge_2_title ); ?>
                    </p>
                    <p class="font-sans text-[0.65rem] sm:text-xs text-bv-brown tracking-[0.2em] uppercase font-bold mt-1">
                        <?php echo esc_html( $badge_2_subtitle ); ?>
                    </p>
                </div>
            </div>

            <!-- Right: TOP 5 Worldwide Championship -->
            <div class="bv-polaroid-right">
                <div class="bv-polaroid text-center">
                    <div class="bv-polaroid-media">
                        <img src="<?php echo esc_url( $img_right ); ?>" 
                             alt="Veron Top 5 Worldwide Championship"/>
                    </div>
                    <p class="font-serif text-xs sm:text-sm font-bold text-bv-ink leading-tight">
                        <?php echo nl2br( esc_html( $badge_3 ) ); ?>
                    </p>
                </div>
            </div>

        </div>

        <!-- CTA Buttons -->
        <div class="mt-8 text-center flex flex-col sm:flex-row items-center justify-center gap-4 bbz-reveal">
            <a href="<?php echo esc_url( $wa_url ); ?>" 
               target="_blank" 
               rel="noopener noreferrer" 
               class="bv-btn-primary">
                <i class="fa-brands fa-whatsapp text-lg text-whatsapp-green"></i>
                <span>Book Appointment via WhatsApp</span>
            </a>
            <a href="#pricing" class="bv-btn-outline">
                <span>View Price List</span>
            </a>
        </div>

    </div>
</section>
