<?php
/**
 * Legacy Gutenberg content retained only to verify safe migration.
 * New pages use the content editor in home-editor.php.
 *
 * @package BrowsByVeron
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Original template for migration comparison. Do not insert it into new pages.
 */
function bv_get_legacy_gutenberg_content() {
    $wa_number = get_option( 'mbscctv_whatsapp_number', '6281234567890' );
    $wa_url = 'https://wa.me/' . $wa_number . '?text=' . rawurlencode( 'Halo Brows by Veron, saya ingin konsultasi dan booking jadwal treatment.' );

    return <<<HTML
<!-- wp:group {"templateLock":"contentOnly","className":"bv-section-hero","layout":{"type":"constrained"}} -->
<div class="wp-block-group bv-section-hero" id="hero">
    <!-- wp:paragraph {"align":"center","className":"bv-hero-welcome"} -->
    <p class="has-text-align-center bv-hero-welcome">Welcome to</p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"textAlign":"center","level":1,"className":"bv-hero-title"} -->
    <h1 class="wp-block-heading has-text-align-center bv-hero-title">Brows <span class="text-bv-brown italic font-serif">by Veron's</span></h1>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","className":"bv-hero-sub"} -->
    <p class="has-text-align-center bv-hero-sub">BEAUTY STUDIO</p>
    <!-- /wp:paragraph -->

    <!-- wp:columns {"className":"bv-hero-collage"} -->
    <div class="wp-block-columns bv-hero-collage">
        <!-- wp:column {"className":"bv-col-polaroid bv-rotate-left"} -->
        <div class="wp-block-column bv-col-polaroid bv-rotate-left">
            <div class="bv-polaroid text-center">
                <!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"bv-polaroid-img"} -->
                <figure class="wp-block-image size-large bv-polaroid-img"><img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=600&auto=format&fit=crop" alt="Veron 3x Hairstroke Champion in Indonesia"/></figure>
                <!-- /wp:image -->
                <!-- wp:paragraph {"align":"center","className":"bv-polaroid-caption font-serif"} -->
                <p class="has-text-align-center bv-polaroid-caption font-serif"><strong>3x Hairstroke<br>Champion in 🇮🇩</strong></p>
                <!-- /wp:paragraph -->
            </div>
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"className":"bv-col-polaroid bv-polaroid-center"} -->
        <div class="wp-block-column bv-col-polaroid bv-polaroid-center">
            <div class="bv-polaroid p-4 text-center shadow-2xl">
                <!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"bv-polaroid-img"} -->
                <figure class="wp-block-image size-large bv-polaroid-img"><img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=900&auto=format&fit=crop" alt="Veron Master PMU Artist"/></figure>
                <!-- /wp:image -->
                <!-- wp:heading {"textAlign":"center","level":3,"className":"font-serif text-2xl font-bold mt-2"} -->
                <h3 class="wp-block-heading has-text-align-center font-serif text-2xl font-bold mt-2">Veron</h3>
                <!-- /wp:heading -->
                <!-- wp:paragraph {"align":"center","className":"text-xs text-bv-brown font-semibold uppercase tracking-wider"} -->
                <p class="has-text-align-center text-xs text-bv-brown font-semibold uppercase tracking-wider">Worldwide Championship PMU Artist</p>
                <!-- /wp:paragraph -->
            </div>
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"className":"bv-col-polaroid bv-rotate-right"} -->
        <div class="wp-block-column bv-col-polaroid bv-rotate-right">
            <div class="bv-polaroid text-center">
                <!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"bv-polaroid-img"} -->
                <figure class="wp-block-image size-large bv-polaroid-img"><img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?q=80&w=600&auto=format&fit=crop" alt="TOP 5 Hairstroke Worldwide Championship"/></figure>
                <!-- /wp:image -->
                <!-- wp:paragraph {"align":"center","className":"bv-polaroid-caption font-serif"} -->
                <p class="has-text-align-center bv-polaroid-caption font-serif"><strong>TOP 5<br>Hairstroke Worldwide<br>Championship 🏆</strong></p>
                <!-- /wp:paragraph -->
            </div>
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"className":"bv-hero-cta-buttons"} -->
    <div class="wp-block-buttons bv-hero-cta-buttons">
        <!-- wp:button {"className":"bv-btn-primary"} -->
        <div class="wp-block-button bv-btn-primary"><a class="wp-block-button__link" href="{$wa_url}" target="_blank" rel="noopener noreferrer">Book Appointment via WhatsApp</a></div>
        <!-- /wp:button -->
        <!-- wp:button {"className":"bv-btn-outline"} -->
        <div class="wp-block-button bv-btn-outline"><a class="wp-block-button__link" href="#pricing">View Price List</a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->

<!-- wp:group {"templateLock":"contentOnly","className":"bv-section-about","layout":{"type":"constrained"}} -->
<div class="wp-block-group bv-section-about" id="about">
    <!-- wp:columns {"className":"bv-about-grid"} -->
    <div class="wp-block-columns bv-about-grid">
        <!-- wp:column {"className":"bv-about-left"} -->
        <div class="wp-block-column bv-about-left">
            <!-- wp:paragraph {"className":"text-xs uppercase tracking-[0.25em] text-bv-brown font-bold"} -->
            <p class="text-xs uppercase tracking-[0.25em] text-bv-brown font-bold">ABOUT THE ARTIST</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":2,"className":"font-serif text-4xl sm:text-5xl text-bv-ink font-bold"} -->
            <h2 class="wp-block-heading font-serif text-4xl sm:text-5xl text-bv-ink font-bold">Brows by Veron</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"className":"font-serif text-xl sm:text-2xl text-bv-ink leading-relaxed"} -->
            <p class="font-serif text-xl sm:text-2xl text-bv-ink leading-relaxed">is a <strong>Worldwide Championship PMU Artist</strong> specializing in <strong>Hairstroke Category</strong>, worked by heart, passion, thoughtful practice and of course dedication quality.</p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"className":"font-sans text-base sm:text-lg text-bv-muted leading-relaxed"} -->
            <p class="font-sans text-base sm:text-lg text-bv-muted leading-relaxed">Established in <strong>2021</strong> and located in <strong>Surabaya City</strong>. But she often travels outside Surabaya to take jobs.</p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"className":"font-sans text-base sm:text-lg text-bv-muted leading-relaxed"} -->
            <p class="font-sans text-base sm:text-lg text-bv-muted leading-relaxed"><strong>Browsbyveron</strong> is known for its <em>natural result and refined technique</em>.</p>
            <!-- /wp:paragraph -->

            <!-- wp:columns {"className":"bv-stats-row"} -->
            <div class="wp-block-columns bv-stats-row">
                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:paragraph {"align":"center","className":"bv-stat-box font-serif font-bold text-2xl text-bv-brown"} -->
                    <p class="has-text-align-center bv-stat-box font-serif font-bold text-2xl text-bv-brown">Est. 2021<br><span class="text-xs font-sans text-bv-ink font-semibold uppercase tracking-wider">Surabaya City</span></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:column -->
                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:paragraph {"align":"center","className":"bv-stat-box font-serif font-bold text-2xl text-bv-brown"} -->
                    <p class="has-text-align-center bv-stat-box font-serif font-bold text-2xl text-bv-brown">Worldwide<br><span class="text-xs font-sans text-bv-ink font-semibold uppercase tracking-wider">TOP 5 Champion</span></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:column -->
                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:paragraph {"align":"center","className":"bv-stat-box font-serif font-bold text-2xl text-bv-brown"} -->
                    <p class="has-text-align-center bv-stat-box font-serif font-bold text-2xl text-bv-brown">100%<br><span class="text-xs font-sans text-bv-ink font-semibold uppercase tracking-wider">Refined Technique</span></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"className":"bv-about-right"} -->
        <div class="wp-block-column bv-about-right">
            <div class="bv-polaroid p-4 max-w-sm mx-auto shadow-2xl">
                <!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"bv-polaroid-img"} -->
                <figure class="wp-block-image size-large bv-polaroid-img"><img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=900&auto=format&fit=crop" alt="Veron Master PMU Artist"/></figure>
                <!-- /wp:image -->
                <!-- wp:paragraph {"align":"center","className":"font-serif text-xl text-bv-ink font-bold mt-3"} -->
                <p class="has-text-align-center font-serif text-xl text-bv-ink font-bold mt-3">Veron<br><span class="text-xs font-sans text-bv-brown uppercase tracking-widest font-semibold">Master PMU Artist • Surabaya</span></p>
                <!-- /wp:paragraph -->
            </div>
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"templateLock":"contentOnly","className":"bv-section-services","layout":{"type":"constrained"}} -->
<div class="wp-block-group bv-section-services" id="services">
    <!-- wp:columns {"className":"bv-services-grid"} -->
    <div class="wp-block-columns bv-services-grid">
        <!-- wp:column {"className":"bv-services-left"} -->
        <div class="wp-block-column bv-services-left">
            <!-- wp:paragraph {"className":"text-xs uppercase tracking-[0.25em] text-bv-brown font-bold"} -->
            <p class="text-xs uppercase tracking-[0.25em] text-bv-brown font-bold">WHAT WE DO</p>
            <!-- /wp:paragraph -->
            <!-- wp:heading {"level":2,"className":"font-serif text-4xl sm:text-5xl lg:text-6xl text-bv-ink font-bold leading-tight"} -->
            <h2 class="wp-block-heading font-serif text-4xl sm:text-5xl lg:text-6xl text-bv-ink font-bold leading-tight">SERVICES</h2>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"className":"font-serif text-2xl sm:text-3xl text-bv-brown space-y-2"} -->
            <p class="font-serif text-2xl sm:text-3xl text-bv-brown">◆ EYEBROW<br>◆ LIPS</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"className":"bv-services-right"} -->
        <div class="wp-block-column bv-services-right">
            <div class="bg-white p-8 sm:p-10 rounded-2xl border border-bv-border-light shadow-sm space-y-6">
                <!-- wp:heading {"level":3,"className":"font-serif text-2xl font-bold text-bv-ink"} -->
                <h3 class="wp-block-heading font-serif text-2xl font-bold text-bv-ink">Our Quality &amp; Safety Promise</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"className":"bv-promise-item font-sans"} -->
                <p class="bv-promise-item font-sans"><strong>🛡️ Use high quality products</strong><br><span class="text-sm text-bv-muted">Seluruh produk perawatan dan kebersihan berstandar internasional tertinggi.</span></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"className":"bv-promise-item font-sans"} -->
                <p class="bv-promise-item font-sans"><strong>💉 Use new needle for each clients</strong><br><span class="text-sm text-bv-muted">100% Jarum dan cartridge mikro steril sekali pakai (disposable single-use).</span></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"className":"bv-promise-item font-sans"} -->
                <p class="bv-promise-item font-sans"><strong>🎨 Use best pigment from US, Vietnam, Korea &amp; Thailand</strong><br><span class="text-sm text-bv-muted">Pigmen impor organik terbaik yang memudar natural tanpa berubah merah atau kebiruan.</span></p>
                <!-- /wp:paragraph -->
            </div>
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"templateLock":"contentOnly","className":"bv-section-pricing","layout":{"type":"constrained"}} -->
<div class="wp-block-group bv-section-pricing" id="pricing">
    <!-- wp:paragraph {"align":"center","className":"text-xs uppercase tracking-[0.25em] text-bv-brown font-bold"} -->
    <p class="has-text-align-center text-xs uppercase tracking-[0.25em] text-bv-brown font-bold">OFFICIAL MENU</p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"textAlign":"center","level":2,"className":"font-serif text-4xl sm:text-5xl text-bv-ink font-bold"} -->
    <h2 class="wp-block-heading has-text-align-center font-serif text-4xl sm:text-5xl text-bv-ink font-bold">PRICE LIST</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","className":"font-sans text-base text-bv-muted mt-2 mb-12"} -->
    <p class="has-text-align-center font-sans text-base text-bv-muted mt-2 mb-12">Investasi kecantikan terbaik untuk hasil alis dan bibir natural dengan teknik berstandar internasional.</p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"level":3,"className":"font-serif text-2xl font-bold text-bv-ink mb-6"} -->
    <h3 class="wp-block-heading font-serif text-2xl font-bold text-bv-ink mb-6">EYEBROWS</h3>
    <!-- /wp:heading -->

    <!-- wp:columns {"className":"bv-pricing-grid"} -->
    <div class="wp-block-columns bv-pricing-grid">
        <!-- 1. Ombre Powder -->
        <!-- wp:column -->
        <div class="wp-block-column">
            <div class="bv-price-card">
                <!-- wp:heading {"level":4,"className":"font-serif text-2xl font-bold text-bv-ink"} -->
                <h4 class="wp-block-heading font-serif text-2xl font-bold text-bv-ink">OMBRE POWDER</h4>
                <!-- /wp:heading -->
                <!-- wp:paragraph {"className":"text-xs text-bv-brown font-semibold uppercase tracking-wider mb-4"} -->
                <p class="text-xs text-bv-brown font-semibold uppercase tracking-wider mb-4">FULL POWDER, LOOK SEPERTI MEMAKAI PENSIL ALIS</p>
                <!-- /wp:paragraph -->
                <!-- wp:paragraph {"className":"bv-price-row font-serif text-3xl font-bold text-bv-ink my-4"} -->
                <p class="bv-price-row font-serif text-3xl font-bold text-bv-ink my-4">2.500 <span class="price-strike text-lg font-bold">3.000</span> <span class="text-xs font-sans text-bv-muted font-normal">IDR / Session</span></p>
                <!-- /wp:paragraph -->
                <!-- wp:list {"className":"space-y-2 text-sm text-bv-muted mb-6"} -->
                <ul class="space-y-2 text-sm text-bv-muted mb-6">
                    <li>◆ Full Powder Effect</li>
                    <li>◆ Free Golden Ratio Pre-Drawing</li>
                    <li>◆ Double Anesthetic (Painless)</li>
                    <li>◆ Free Retouch 1x (1-2 Bulan)</li>
                </ul>
                <!-- /wp:list -->
                <!-- wp:buttons -->
                <div class="wp-block-buttons"><div class="wp-block-button bv-btn-outline w-full"><a class="wp-block-button__link" href="{$wa_url}">Book Ombre Powder</a></div></div>
                <!-- /wp:buttons -->
            </div>
        </div>
        <!-- /wp:column -->

        <!-- 2. Hairstroke Mix Powder -->
        <!-- wp:column -->
        <div class="wp-block-column">
            <div class="bv-price-card featured">
                <span class="inline-block bg-bv-brown text-white text-[0.65rem] font-bold uppercase tracking-wider px-3 py-1 rounded-full mb-2">Popular Choice</span>
                <!-- wp:heading {"level":4,"className":"font-serif text-2xl font-bold text-bv-ink"} -->
                <h4 class="wp-block-heading font-serif text-2xl font-bold text-bv-ink">HAIRSTROKE MIX POWDER</h4>
                <!-- /wp:heading -->
                <!-- wp:paragraph {"className":"text-xs text-bv-brown font-semibold uppercase tracking-wider mb-4"} -->
                <p class="text-xs text-bv-brown font-semibold uppercase tracking-wider mb-4">KOMBINASI ANTARA OMBRE &amp; HAIRSTROKE</p>
                <!-- /wp:paragraph -->
                <!-- wp:paragraph {"className":"bv-price-row font-serif text-3xl font-bold text-bv-ink my-4"} -->
                <p class="bv-price-row font-serif text-3xl font-bold text-bv-ink my-4">2.800 <span class="price-strike text-lg font-bold">3.800</span> <span class="text-xs font-sans text-bv-muted font-normal">IDR / Session</span></p>
                <!-- /wp:paragraph -->
                <!-- wp:list {"className":"space-y-2 text-sm text-bv-muted mb-6"} -->
                <ul class="space-y-2 text-sm text-bv-muted mb-6">
                    <li>◆ Serat Depan + Shading Belakang</li>
                    <li>◆ Alis Bervolume &amp; Berdimensi 3D</li>
                    <li>◆ Pigmen US/Vietnam Premium</li>
                    <li>◆ Free Retouch 1x (1-2 Bulan)</li>
                </ul>
                <!-- /wp:list -->
                <!-- wp:buttons -->
                <div class="wp-block-buttons"><div class="wp-block-button bv-btn-primary w-full"><a class="wp-block-button__link" href="{$wa_url}">Book Mix Powder</a></div></div>
                <!-- /wp:buttons -->
            </div>
        </div>
        <!-- /wp:column -->

        <!-- 3. Hairstroke -->
        <!-- wp:column -->
        <div class="wp-block-column">
            <div class="bv-price-card">
                <!-- wp:heading {"level":4,"className":"font-serif text-2xl font-bold text-bv-ink"} -->
                <h4 class="wp-block-heading font-serif text-2xl font-bold text-bv-ink">HAIRSTROKE</h4>
                <!-- /wp:heading -->
                <!-- wp:paragraph {"className":"text-xs text-bv-brown font-semibold uppercase tracking-wider mb-4"} -->
                <p class="text-xs text-bv-brown font-semibold uppercase tracking-wider mb-4">CLEAN &amp; FULL HAIRSTROKE, SERAT BULU ASLI</p>
                <!-- /wp:paragraph -->
                <!-- wp:paragraph {"className":"bv-price-row font-serif text-3xl font-bold text-bv-ink my-4"} -->
                <p class="bv-price-row font-serif text-3xl font-bold text-bv-ink my-4">3.200 <span class="price-strike text-lg font-bold">4.000</span> <span class="text-xs font-sans text-bv-muted font-normal">IDR / Session</span></p>
                <!-- /wp:paragraph -->
                <!-- wp:list {"className":"space-y-2 text-sm text-bv-muted mb-6"} -->
                <ul class="space-y-2 text-sm text-bv-muted mb-6">
                    <li>◆ Serat Bulu Halus Ultra Natural</li>
                    <li>◆ Mengikuti Arah Tumbuh Asli</li>
                    <li>◆ Double Medical Numbing</li>
                    <li>◆ Free Retouch 1x (1-2 Bulan)</li>
                </ul>
                <!-- /wp:list -->
                <!-- wp:buttons -->
                <div class="wp-block-buttons"><div class="wp-block-button bv-btn-outline w-full"><a class="wp-block-button__link" href="{$wa_url}">Book Hairstroke</a></div></div>
                <!-- /wp:buttons -->
            </div>
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:columns {"className":"bv-pricing-grid mt-6"} -->
    <div class="wp-block-columns bv-pricing-grid mt-6">
        <!-- 4. Fluffy Hairstroke -->
        <!-- wp:column -->
        <div class="wp-block-column">
            <div class="bv-price-card">
                <!-- wp:heading {"level":4,"className":"font-serif text-2xl font-bold text-bv-ink"} -->
                <h4 class="wp-block-heading font-serif text-2xl font-bold text-bv-ink">FLUFFY HAIRSTROKE</h4>
                <!-- /wp:heading -->
                <!-- wp:paragraph {"className":"text-xs text-bv-brown font-semibold uppercase tracking-wider mb-4"} -->
                <p class="text-xs text-bv-brown font-semibold uppercase tracking-wider mb-4">FULL HAIRSTROKE + BABY HAIR PADAT</p>
                <!-- /wp:paragraph -->
                <!-- wp:paragraph {"className":"bv-price-row font-serif text-3xl font-bold text-bv-ink my-4"} -->
                <p class="bv-price-row font-serif text-3xl font-bold text-bv-ink my-4">3.500 <span class="price-strike text-lg font-bold">4.000</span> <span class="text-xs font-sans text-bv-muted font-normal">IDR / Session</span></p>
                <!-- /wp:paragraph -->
                <!-- wp:list {"className":"space-y-2 text-sm text-bv-muted mb-6"} -->
                <ul class="space-y-2 text-sm text-bv-muted mb-6">
                    <li>◆ Penambahan Baby Hair Lembut</li>
                    <li>◆ Tampilan Fluffy &amp; Padat Alami</li>
                    <li>◆ Refined Technique by Veron</li>
                    <li>◆ Free Retouch 1x (1-2 Bulan)</li>
                </ul>
                <!-- /wp:list -->
                <!-- wp:buttons -->
                <div class="wp-block-buttons"><div class="wp-block-button bv-btn-outline w-full"><a class="wp-block-button__link" href="{$wa_url}">Book Fluffy Hairstroke</a></div></div>
                <!-- /wp:buttons -->
            </div>
        </div>
        <!-- /wp:column -->

        <!-- 5. Hairstroke for Men -->
        <!-- wp:column -->
        <div class="wp-block-column">
            <div class="bv-price-card">
                <!-- wp:heading {"level":4,"className":"font-serif text-2xl font-bold text-bv-ink"} -->
                <h4 class="wp-block-heading font-serif text-2xl font-bold text-bv-ink">HAIRSTROKE FOR MEN</h4>
                <!-- /wp:heading -->
                <!-- wp:paragraph {"className":"text-xs text-bv-brown font-semibold uppercase tracking-wider mb-4"} -->
                <p class="text-xs text-bv-brown font-semibold uppercase tracking-wider mb-4">FULL HAIRSTROKE DESIGN KHUSUS PRIA</p>
                <!-- /wp:paragraph -->
                <!-- wp:paragraph {"className":"bv-price-row font-serif text-3xl font-bold text-bv-ink my-4"} -->
                <p class="bv-price-row font-serif text-3xl font-bold text-bv-ink my-4">3.800 <span class="text-xs font-sans text-bv-muted font-normal">IDR / Session</span></p>
                <!-- /wp:paragraph -->
                <!-- wp:list {"className":"space-y-2 text-sm text-bv-muted mb-6"} -->
                <ul class="space-y-2 text-sm text-bv-muted mb-6">
                    <li>◆ Design Khusus Maskulin &amp; Tegas</li>
                    <li>◆ Sangat Natural Tanpa Kesan Makeup</li>
                    <li>◆ Double Medical Numbing</li>
                    <li>◆ Free Retouch 1x (1-2 Bulan)</li>
                </ul>
                <!-- /wp:list -->
                <!-- wp:buttons -->
                <div class="wp-block-buttons"><div class="wp-block-button bv-btn-outline w-full"><a class="wp-block-button__link" href="{$wa_url}">Book Men's Hairstroke</a></div></div>
                <!-- /wp:buttons -->
            </div>
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- 6. Lips Category -->
    <!-- wp:heading {"level":3,"className":"font-serif text-2xl font-bold text-bv-ink mt-12 mb-6"} -->
    <h3 class="wp-block-heading font-serif text-2xl font-bold text-bv-ink mt-12 mb-6">LIPS</h3>
    <!-- /wp:heading -->

    <div class="max-w-xl mx-auto">
        <div class="bv-price-card featured">
            <!-- wp:heading {"level":4,"className":"font-serif text-3xl font-bold text-bv-ink"} -->
            <h4 class="wp-block-heading font-serif text-3xl font-bold text-bv-ink">LIPS SULAM BIBIR</h4>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"className":"text-xs text-bv-brown font-semibold uppercase tracking-wider mb-4"} -->
            <p class="text-xs text-bv-brown font-semibold uppercase tracking-wider mb-4">SULAM BIBIR NATURAL DENGAN WARNA SEGAR MERONA ALAMI</p>
            <!-- /wp:paragraph -->
            <!-- wp:paragraph {"className":"bv-price-row font-serif text-4xl font-bold text-bv-ink my-4"} -->
            <p class="bv-price-row font-serif text-4xl font-bold text-bv-ink my-4">3.000 <span class="price-strike text-xl font-bold">3.500</span> <span class="text-xs font-sans text-bv-muted font-normal">IDR / Session</span></p>
            <!-- /wp:paragraph -->
            <!-- wp:list {"className":"space-y-2 text-sm text-bv-muted mb-6"} -->
            <ul class="space-y-2 text-sm text-bv-muted mb-6">
                <li>◆ Meratakan Warna Bibir Gelap / Pucat</li>
                <li>◆ Hasil Segar Merona Alami (Pink / Coral / Rosy)</li>
                <li>◆ Double Anesthetic Bebas Sakit</li>
                <li>◆ Free Retouch 1x (1-2 Bulan)</li>
            </ul>
            <!-- /wp:list -->
            <!-- wp:buttons -->
            <div class="wp-block-buttons"><div class="wp-block-button bv-btn-primary w-full"><a class="wp-block-button__link" href="{$wa_url}">Book Lips Treatment</a></div></div>
            <!-- /wp:buttons -->
        </div>
    </div>
</div>
<!-- /wp:group -->

<!-- wp:group {"templateLock":"contentOnly","className":"bv-section-gallery","layout":{"type":"constrained"}} -->
<div class="wp-block-group bv-section-gallery" id="gallery">
    <!-- wp:paragraph {"align":"center","className":"text-xs uppercase tracking-[0.25em] text-bv-brown font-bold"} -->
    <p class="has-text-align-center text-xs uppercase tracking-[0.25em] text-bv-brown font-bold">TRANSFORMATION</p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"textAlign":"center","level":2,"className":"font-serif text-4xl sm:text-5xl text-bv-ink font-bold"} -->
    <h2 class="wp-block-heading has-text-align-center font-serif text-4xl sm:text-5xl text-bv-ink font-bold">RESULTS GALLERY</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","className":"font-sans text-base text-bv-muted mt-2 mb-12"} -->
    <p class="has-text-align-center font-sans text-base text-bv-muted mt-2 mb-12">Hasil nyata pengerjaan Veron untuk berbagai tipe alis dan bibir dengan teknik presisi tinggi.</p>
    <!-- /wp:paragraph -->

    <!-- wp:columns {"className":"bv-gallery-grid"} -->
    <div class="wp-block-columns bv-gallery-grid">
        <!-- wp:column -->
        <div class="wp-block-column">
            <div class="bv-polaroid">
                <!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"bv-polaroid-img"} -->
                <figure class="wp-block-image size-large bv-polaroid-img"><img src="https://images.unsplash.com/photo-1512496015851-a90fb38ba796?q=80&w=800&auto=format&fit=crop" alt="Ombre Powder Brows Result"/></figure>
                <!-- /wp:image -->
                <!-- wp:paragraph {"align":"center","className":"font-serif text-lg font-bold text-bv-ink mt-2"} -->
                <p class="has-text-align-center font-serif text-lg font-bold text-bv-ink mt-2">OMBRE POWDER<br><span class="font-sans text-xs text-bv-muted font-normal">Full powder natural look</span></p>
                <!-- /wp:paragraph -->
            </div>
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <div class="bv-polaroid">
                <!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"bv-polaroid-img"} -->
                <figure class="wp-block-image size-large bv-polaroid-img"><img src="https://images.unsplash.com/photo-1596704017254-9b121068fb31?q=80&w=800&auto=format&fit=crop" alt="Hairstroke Brows Result"/></figure>
                <!-- /wp:image -->
                <!-- wp:paragraph {"align":"center","className":"font-serif text-lg font-bold text-bv-ink mt-2"} -->
                <p class="has-text-align-center font-serif text-lg font-bold text-bv-ink mt-2">HAIRSTROKE<br><span class="font-sans text-xs text-bv-muted font-normal">Serat bulu asli &amp; rapi</span></p>
                <!-- /wp:paragraph -->
            </div>
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <div class="bv-polaroid">
                <!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"bv-polaroid-img"} -->
                <figure class="wp-block-image size-large bv-polaroid-img"><img src="https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?q=80&w=800&auto=format&fit=crop" alt="Hairstroke Mix Powder Result"/></figure>
                <!-- /wp:image -->
                <!-- wp:paragraph {"align":"center","className":"font-serif text-lg font-bold text-bv-ink mt-2"} -->
                <p class="has-text-align-center font-serif text-lg font-bold text-bv-ink mt-2">HAIRSTROKE MIX<br><span class="font-sans text-xs text-bv-muted font-normal">Serat depan &amp; powder belakang</span></p>
                <!-- /wp:paragraph -->
            </div>
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"templateLock":"contentOnly","className":"bv-section-terms","layout":{"type":"constrained"}} -->
<div class="wp-block-group bv-section-terms" id="terms">
    <!-- wp:paragraph {"align":"center","className":"text-xs uppercase tracking-[0.25em] text-bv-brown font-bold"} -->
    <p class="has-text-align-center text-xs uppercase tracking-[0.25em] text-bv-brown font-bold">POLICY &amp; GUIDELINES</p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"textAlign":"center","level":2,"className":"font-serif text-4xl sm:text-5xl text-bv-ink font-bold"} -->
    <h2 class="wp-block-heading has-text-align-center font-serif text-4xl sm:text-5xl text-bv-ink font-bold">TERM &amp; CONDITIONS</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","className":"font-sans text-base text-bv-muted mt-2 mb-10"} -->
    <p class="has-text-align-center font-sans text-base text-bv-muted mt-2 mb-10">Harap membaca ketentuan berikut demi kenyamanan dan keamanan prosedur treatment Anda di Brows by Veron.</p>
    <!-- /wp:paragraph -->

    <div class="space-y-3 max-w-4xl mx-auto">
        <!-- wp:paragraph {"className":"bv-term-item"} -->
        <p class="bv-term-item"><strong>1. Booking &amp; Down Payment (DP)</strong><br>Appointment hanya dapat dikonfirmasi setelah pembayaran DP diterima. <strong>No DP = No Booking Confirmation</strong>.</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"className":"bv-term-item"} -->
        <p class="bv-term-item"><strong>2. Keterlambatan</strong><br>Batas toleransi keterlambatan maksimal <strong>15 menit</strong> dari waktu yang telah dijadwalkan. Keterlambatan lebih dari 15 menit akan otomatis dijadwalkan ulang (<em>reschedule</em>).</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"className":"bv-term-item"} -->
        <p class="bv-term-item"><strong>3. Kebijakan Reschedule</strong><br>Reschedule diperbolehkan maksimal <strong>2 kali</strong>. Lebih dari 2 kali reschedule, DP dinyatakan hangus dan diperlukan DP baru untuk booking ulang.</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"className":"bv-term-item"} -->
        <p class="bv-term-item"><strong>4. Riwayat Treatment Sebelumnya</strong><br>Client yang pernah melakukan sulam alis atau sulam bibir sebelumnya wajib mengirimkan foto kondisi terkini tanpa makeup untuk evaluasi terlebih dahulu.</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"className":"bv-term-item"} -->
        <p class="bv-term-item"><strong>5. Kondisi Kehamilan &amp; Menyusui</strong><br>Client dalam kondisi hamil atau menyusui diwajibkan untuk konfirmasi dan konsultasi terlebih dahulu sebelum melakukan treatment.</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"className":"bv-term-item"} -->
        <p class="bv-term-item"><strong>6. Riwayat Kesehatan</strong><br>Client dengan riwayat penyakit tertentu wajib konsultasi terlebih dahulu melalui admin demi keamanan dan kenyamanan treatment.</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"className":"bv-term-item"} -->
        <p class="bv-term-item"><strong>7. Pendampingan Selama Treatment</strong><br>Demi kenyamanan dan kebersihan area kerja privat, client tidak diperkenankan membawa anak kecil maupun teman saat treatment berlangsung.</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"className":"bv-term-item"} -->
        <p class="bv-term-item"><strong>8. Usia Minimum</strong><br>Minimal usia <strong>18 tahun</strong> atau dengan persetujuan tertulis orang tua.</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"className":"bv-term-item"} -->
        <p class="bv-term-item"><strong>9. Pre &amp; Aftercare Procedure</strong><br>Client wajib mengikuti prosedur sebelum dan sesudah treatment sesuai arahan untuk memastikan hasil optimal dan proses healing yang baik.</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"className":"bv-term-item"} -->
        <p class="bv-term-item"><strong>10. Retouch Policy</strong><br>Client akan mendapatkan <strong>FREE retouch 1x dalam jangka waktu 1-2 bulan</strong> setelah treatment pertama. Retouch tahunan sebelum 2 tahun berhak mendapatkan diskon 50% dari harga normal.</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"className":"bv-term-item"} -->
        <p class="bv-term-item"><strong>11. Refund Policy</strong><br>DP tidak dapat dikembalikan (<em>non-refundable</em>). Pembatalan H-1 atau di hari yang sama menyebabkan DP hangus.</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"className":"bv-term-item"} -->
        <p class="bv-term-item"><strong>12. Patch Test &amp; Allergic Reaction</strong><br>Disarankan melakukan patch test minimal 24 jam sebelum treatment (jika diperlukan). Reaksi alergi di luar kendali teknisi bukan tanggung jawab pihak BROWSBYVERON.</p>
        <!-- /wp:paragraph -->
    </div>
</div>
<!-- /wp:group -->

<!-- wp:group {"templateLock":"contentOnly","className":"bv-section-contact","layout":{"type":"constrained"}} -->
<div class="wp-block-group bv-section-contact" id="contact">
    <!-- wp:paragraph {"align":"center","className":"font-serif text-3xl sm:text-5xl text-bv-ink font-bold leading-tight"} -->
    <p class="has-text-align-center font-serif text-3xl sm:text-5xl text-bv-ink font-bold leading-tight">“Beauty begins the moment you decide to be yourself”</p>
    <!-- /wp:paragraph -->

    <!-- wp:paragraph {"align":"center","className":"font-sans text-base text-bv-muted max-w-2xl mx-auto mt-3"} -->
    <p class="has-text-align-center font-sans text-base text-bv-muted max-w-2xl mx-auto mt-3">Percayakan kesempurnaan alis dan bibir natural Anda kepada <strong>Worldwide Championship PMU Artist</strong>. Slot jadwal terbatas demi menjaga kualitas pengerjaan 1-on-1.</p>
    <!-- /wp:paragraph -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"className":"mt-6"} -->
    <div class="wp-block-buttons mt-6">
        <!-- wp:button {"className":"bv-btn-primary"} -->
        <div class="wp-block-button bv-btn-primary"><a class="wp-block-button__link" href="{$wa_url}" target="_blank" rel="noopener noreferrer">Book Appointment via WhatsApp</a></div>
        <!-- /wp:button -->
        <!-- wp:button {"className":"bv-btn-outline"} -->
        <div class="wp-block-button bv-btn-outline"><a class="wp-block-button__link" href="#pricing">View Full Price List</a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->
HTML;
}

/**
 * Setup or Sync Home Page Content with Locked Gutenberg Structure
 */
function bv_get_locked_gutenberg_content() {
    return bv_get_home_editor_content();
}

function bv_sync_home_page_gutenberg() {
    $home_page = get_page_by_path( 'home' );
    if ( ! $home_page ) {
        $home_page = get_page_by_title( 'Home' );
    }

    // Existing edits must never be replaced with fresh template defaults.
    if ( $home_page ) {
        return bv_migrate_home_editor( $home_page->ID );
    }

    $content = bv_get_locked_gutenberg_content();

    $page_data = array(
        'post_title'   => 'Home',
        'post_name'    => 'home',
        'post_content' => $content,
        'post_status'  => 'publish',
        'post_type'    => 'page',
        'post_author'  => 1,
    );

    if ( $home_page ) {
        $page_data['ID'] = $home_page->ID;
        $page_id = wp_update_post( $page_data );
    } else {
        $page_id = wp_insert_post( $page_data );
    }

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $page_id );

    return $page_id;
}
