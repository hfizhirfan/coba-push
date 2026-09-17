<?php
/**
 * Official Price List Section - Brows by Veron
 */
$p_ombre   = get_option( 'bv_price_ombre_price', '2.500' );
$s_ombre   = get_option( 'bv_price_ombre_strike', '3.000' );
$d_ombre   = get_option( 'bv_price_ombre_desc', 'FULL POWDER, LOOK SEPERTI MEMAKAI PENSIL ALIS' );

$p_mix     = get_option( 'bv_price_mix_price', '2.800' );
$s_mix     = get_option( 'bv_price_mix_strike', '3.800' );
$d_mix     = get_option( 'bv_price_mix_desc', 'KOMBINASI ANTARA OMBRE & HAIRSTROKE, HAIRSTROKE DI BAGIAN DEPAN & POWDER DI BELAKANG' );

$p_hair    = get_option( 'bv_price_hairstroke_price', '3.200' );
$s_hair    = get_option( 'bv_price_hairstroke_strike', '4.000' );
$d_hair    = get_option( 'bv_price_hairstroke_desc', 'CLEAN & FULL HAIRSTROKE, SERAT BULU ASLI & BULU ALIS TAMPAK FULL & RAPI' );

$p_fluffy  = get_option( 'bv_price_fluffy_price', '3.500' );
$s_fluffy  = get_option( 'bv_price_fluffy_strike', '4.000' );
$d_fluffy  = get_option( 'bv_price_fluffy_desc', 'FULL HAIRSTROKE & ADA PENAMBAHAN BABY HAIR, ALIS TAMPAK LEBIH PADAT' );

$p_men     = get_option( 'bv_price_men_price', '3.800' );
$d_men     = get_option( 'bv_price_men_desc', 'FULL HAIRSTROKE DENGAN DESIGN KHUSUS PRIA' );

$p_lips    = get_option( 'bv_price_lips_price', '3.000' );
$s_lips    = get_option( 'bv_price_lips_strike', '3.500' );
$d_lips    = get_option( 'bv_price_lips_desc', 'SULAM BIBIR NATURAL DENGAN WARNA SEGAR MERONA ALAMI & KOREKSI WARNA GELAP' );
?>
<section id="pricing" class="py-20 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Heading -->
        <div class="text-center max-w-3xl mx-auto mb-16 bbz-reveal">
            <span class="text-xs uppercase tracking-[0.25em] text-bv-brown font-bold block mb-2">
                OFFICIAL MENU
            </span>
            <h2 class="font-serif text-4xl sm:text-5xl text-bv-ink font-bold">
                PRICE LIST
            </h2>
            <p class="font-sans text-base text-bv-muted mt-3">
                Investasi kecantikan terbaik untuk hasil alis dan bibir natural dengan teknik berstandar internasional.
            </p>
        </div>

        <!-- 1. Eyebrows Category -->
        <div class="mb-16">
            <div class="flex items-center gap-3 mb-8 bbz-reveal">
                <span class="font-serif text-2xl font-bold text-bv-ink">EYEBROWS</span>
                <div class="flex-1 h-px bg-bv-border-light"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- 1. OMBRE POWDER -->
                <div class="bv-price-card bbz-reveal">
                    <div>
                        <h3 class="font-serif text-2xl font-bold text-bv-ink mb-1">
                            OMBRE POWDER
                        </h3>
                        <p class="font-sans text-xs uppercase tracking-wider text-bv-brown font-semibold mb-4">
                            <?php echo esc_html( $d_ombre ); ?>
                        </p>
                        
                        <div class="flex items-baseline gap-3 my-6 pb-6 border-b border-bv-border-light">
                            <span class="font-serif text-3xl sm:text-4xl font-bold text-bv-ink"><?php echo esc_html( $p_ombre ); ?></span>
                            <?php if ( $s_ombre ) : ?>
                                <span class="price-strike text-lg font-sans font-bold text-bv-discount"><?php echo esc_html( $s_ombre ); ?></span>
                            <?php endif; ?>
                            <span class="text-xs text-bv-muted">IDR / Session</span>
                        </div>

                        <ul class="space-y-2.5 text-sm text-bv-muted mb-6">
                            <li class="flex items-center gap-2">
                                <span class="text-bv-brown text-xs">◆</span> Full Powder Effect
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-bv-brown text-xs">◆</span> Free Golden Ratio Pre-Drawing
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-bv-brown text-xs">◆</span> Double Anesthetic (Painless)
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-bv-brown text-xs">◆</span> Free Retouch 1x (1-2 Bulan)
                            </li>
                        </ul>
                    </div>

                    <a href="<?php echo esc_url( mbscctv_get_whatsapp_url( 'Halo Brows by Veron, saya ingin booking treatment Ombre Powder' ) ); ?>" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="bv-btn-outline w-full text-center text-sm py-3">
                        <span>Book Ombre Powder</span>
                    </a>
                </div>

                <!-- 2. HAIRSTROKE MIX POWDER (Featured) -->
                <div class="bv-price-card featured bbz-reveal">
                    <div>
                        <span class="inline-block bg-bv-brown text-white text-[0.65rem] font-bold uppercase tracking-wider px-3 py-1 rounded-full mb-3">
                            Popular Choice
                        </span>
                        <h3 class="font-serif text-2xl font-bold text-bv-ink mb-1">
                            HAIRSTROKE MIX POWDER
                        </h3>
                        <p class="font-sans text-xs uppercase tracking-wider text-bv-brown font-semibold mb-4">
                            <?php echo esc_html( $d_mix ); ?>
                        </p>
                        
                        <div class="flex items-baseline gap-3 my-6 pb-6 border-b border-bv-border-light">
                            <span class="font-serif text-3xl sm:text-4xl font-bold text-bv-ink"><?php echo esc_html( $p_mix ); ?></span>
                            <?php if ( $s_mix ) : ?>
                                <span class="price-strike text-lg font-sans font-bold text-bv-discount"><?php echo esc_html( $s_mix ); ?></span>
                            <?php endif; ?>
                            <span class="text-xs text-bv-muted">IDR / Session</span>
                        </div>

                        <ul class="space-y-2.5 text-sm text-bv-muted mb-6">
                            <li class="flex items-center gap-2">
                                <span class="text-bv-brown text-xs">◆</span> Serat Depan + Shading Belakang
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-bv-brown text-xs">◆</span> Alis Bervolume &amp; Berdimensi 3D
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-bv-brown text-xs">◆</span> Pigmen US/Vietnam Premium
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-bv-brown text-xs">◆</span> Free Retouch 1x (1-2 Bulan)
                            </li>
                        </ul>
                    </div>

                    <a href="<?php echo esc_url( mbscctv_get_whatsapp_url( 'Halo Brows by Veron, saya ingin booking treatment Hairstroke Mix Powder' ) ); ?>" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="bv-btn-primary w-full text-center text-sm py-3">
                        <span>Book Mix Powder</span>
                    </a>
                </div>

                <!-- 3. HAIRSTROKE -->
                <div class="bv-price-card bbz-reveal">
                    <div>
                        <h3 class="font-serif text-2xl font-bold text-bv-ink mb-1">
                            HAIRSTROKE
                        </h3>
                        <p class="font-sans text-xs uppercase tracking-wider text-bv-brown font-semibold mb-4">
                            <?php echo esc_html( $d_hair ); ?>
                        </p>
                        
                        <div class="flex items-baseline gap-3 my-6 pb-6 border-b border-bv-border-light">
                            <span class="font-serif text-3xl sm:text-4xl font-bold text-bv-ink"><?php echo esc_html( $p_hair ); ?></span>
                            <?php if ( $s_hair ) : ?>
                                <span class="price-strike text-lg font-sans font-bold text-bv-discount"><?php echo esc_html( $s_hair ); ?></span>
                            <?php endif; ?>
                            <span class="text-xs text-bv-muted">IDR / Session</span>
                        </div>

                        <ul class="space-y-2.5 text-sm text-bv-muted mb-6">
                            <li class="flex items-center gap-2">
                                <span class="text-bv-brown text-xs">◆</span> Serat Bulu Halus Ultra Natural
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-bv-brown text-xs">◆</span> Mengikuti Arah Tumbuh Asli
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-bv-brown text-xs">◆</span> Double Medical Numbing
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-bv-brown text-xs">◆</span> Free Retouch 1x (1-2 Bulan)
                            </li>
                        </ul>
                    </div>

                    <a href="<?php echo esc_url( mbscctv_get_whatsapp_url( 'Halo Brows by Veron, saya ingin booking treatment Hairstroke' ) ); ?>" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="bv-btn-outline w-full text-center text-sm py-3">
                        <span>Book Hairstroke</span>
                    </a>
                </div>

                <!-- 4. FLUFFY HAIRSTROKE -->
                <div class="bv-price-card bbz-reveal">
                    <div>
                        <h3 class="font-serif text-2xl font-bold text-bv-ink mb-1">
                            FLUFFY HAIRSTROKE
                        </h3>
                        <p class="font-sans text-xs uppercase tracking-wider text-bv-brown font-semibold mb-4">
                            <?php echo esc_html( $d_fluffy ); ?>
                        </p>
                        
                        <div class="flex items-baseline gap-3 my-6 pb-6 border-b border-bv-border-light">
                            <span class="font-serif text-3xl sm:text-4xl font-bold text-bv-ink"><?php echo esc_html( $p_fluffy ); ?></span>
                            <?php if ( $s_fluffy ) : ?>
                                <span class="price-strike text-lg font-sans font-bold text-bv-discount"><?php echo esc_html( $s_fluffy ); ?></span>
                            <?php endif; ?>
                            <span class="text-xs text-bv-muted">IDR / Session</span>
                        </div>

                        <ul class="space-y-2.5 text-sm text-bv-muted mb-6">
                            <li class="flex items-center gap-2">
                                <span class="text-bv-brown text-xs">◆</span> Penambahan Baby Hair Lembut
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-bv-brown text-xs">◆</span> Tampilan Fluffy &amp; Padat Alami
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-bv-brown text-xs">◆</span> Refined Technique by Veron
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-bv-brown text-xs">◆</span> Free Retouch 1x (1-2 Bulan)
                            </li>
                        </ul>
                    </div>

                    <a href="<?php echo esc_url( mbscctv_get_whatsapp_url( 'Halo Brows by Veron, saya ingin booking treatment Fluffy Hairstroke' ) ); ?>" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="bv-btn-outline w-full text-center text-sm py-3">
                        <span>Book Fluffy Hairstroke</span>
                    </a>
                </div>

                <!-- 5. HAIRSTROKE FOR MEN -->
                <div class="bv-price-card bbz-reveal">
                    <div>
                        <h3 class="font-serif text-2xl font-bold text-bv-ink mb-1">
                            HAIRSTROKE FOR MEN
                        </h3>
                        <p class="font-sans text-xs uppercase tracking-wider text-bv-brown font-semibold mb-4">
                            <?php echo esc_html( $d_men ); ?>
                        </p>
                        
                        <div class="flex items-baseline gap-3 my-6 pb-6 border-b border-bv-border-light">
                            <span class="font-serif text-3xl sm:text-4xl font-bold text-bv-ink"><?php echo esc_html( $p_men ); ?></span>
                            <span class="text-xs text-bv-muted">IDR / Session</span>
                        </div>

                        <ul class="space-y-2.5 text-sm text-bv-muted mb-6">
                            <li class="flex items-center gap-2">
                                <span class="text-bv-brown text-xs">◆</span> Design Khusus Maskulin &amp; Tegas
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-bv-brown text-xs">◆</span> Sangat Natural Tanpa Kesan Makeup
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-bv-brown text-xs">◆</span> Double Medical Numbing
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-bv-brown text-xs">◆</span> Free Retouch 1x (1-2 Bulan)
                            </li>
                        </ul>
                    </div>

                    <a href="<?php echo esc_url( mbscctv_get_whatsapp_url( 'Halo Brows by Veron, saya ingin booking treatment Hairstroke for Men' ) ); ?>" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="bv-btn-outline w-full text-center text-sm py-3">
                        <span>Book Men's Hairstroke</span>
                    </a>
                </div>

            </div>
        </div>

        <!-- 2. Lips Category -->
        <div class="bbz-reveal">
            <div class="flex items-center gap-3 mb-8">
                <span class="font-serif text-2xl font-bold text-bv-ink">LIPS</span>
                <div class="flex-1 h-px bg-bv-border-light"></div>
            </div>

            <div class="max-w-xl mx-auto">
                <div class="bv-price-card featured">
                    <div>
                        <h3 class="font-serif text-2xl sm:text-3xl font-bold text-bv-ink mb-1">
                            LIPS SULAM BIBIR
                        </h3>
                        <p class="font-sans text-xs uppercase tracking-wider text-bv-brown font-semibold mb-4">
                            <?php echo esc_html( $d_lips ); ?>
                        </p>
                        
                        <div class="flex items-baseline gap-3 my-6 pb-6 border-b border-bv-border-light">
                            <span class="font-serif text-4xl font-bold text-bv-ink"><?php echo esc_html( $p_lips ); ?></span>
                            <?php if ( $s_lips ) : ?>
                                <span class="price-strike text-xl font-sans font-bold text-bv-discount"><?php echo esc_html( $s_lips ); ?></span>
                            <?php endif; ?>
                            <span class="text-xs text-bv-muted">IDR / Session</span>
                        </div>

                        <ul class="space-y-2.5 text-sm text-bv-muted mb-6">
                            <li class="flex items-center gap-2">
                                <span class="text-bv-brown text-xs">◆</span> Meratakan Warna Bibir Gelap/Pucat
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-bv-brown text-xs">◆</span> Hasil Segar Merona Alami (Pink / Coral / Rosy)
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-bv-brown text-xs">◆</span> Double Anesthetic Bebas Sakit
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-bv-brown text-xs">◆</span> Free Retouch 1x (1-2 Bulan)
                            </li>
                        </ul>
                    </div>

                    <a href="<?php echo esc_url( mbscctv_get_whatsapp_url( 'Halo Brows by Veron, saya ingin booking treatment Lips Sulam Bibir' ) ); ?>" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="bv-btn-primary w-full text-center text-sm py-3.5">
                        <span>Book Lips Treatment</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>
