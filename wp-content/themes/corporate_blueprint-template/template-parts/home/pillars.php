<?php
/**
 * Services & Quality Standards Section - Brows by Veron
 */
$p1_title = get_option( 'bv_promise_1_title', 'Use high quality products' );
$p1_desc  = get_option( 'bv_promise_1_desc', 'Seluruh produk perawatan dan kebersihan berstandar internasional tertinggi.' );
$p2_title = get_option( 'bv_promise_2_title', 'Use new needle for each clients' );
$p2_desc  = get_option( 'bv_promise_2_desc', '100% Jarum dan cartridge mikro steril sekali pakai (disposable single-use).' );
$p3_title = get_option( 'bv_promise_3_title', 'Use best pigment from US, Vietnam, Korea & Thailand' );
$p3_desc  = get_option( 'bv_promise_3_desc', 'Pigmen impor organik terbaik yang memudar natural tanpa berubah merah atau kebiruan.' );
?>
<section id="services" class="py-20 bg-bv-bg relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left: Title -->
            <div class="lg:col-span-5 space-y-4 bbz-reveal">
                <span class="text-xs uppercase tracking-[0.25em] text-bv-brown font-bold block">
                    WHAT WE DO
                </span>
                <h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl text-bv-ink font-bold leading-tight">
                    SERVICES
                </h2>
                <div class="space-y-1 font-serif text-2xl sm:text-3xl text-bv-brown">
                    <p class="flex items-center gap-3">
                        <span class="w-2 h-2 rounded-full bg-bv-brown"></span> EYEBROW
                    </p>
                    <p class="flex items-center gap-3">
                        <span class="w-2 h-2 rounded-full bg-bv-brown"></span> LIPS
                    </p>
                </div>
            </div>

            <!-- Right: Quality Standards Box -->
            <div class="lg:col-span-7 bbz-reveal">
                <div class="bg-white p-8 sm:p-10 rounded-2xl border border-bv-border-light shadow-sm space-y-6">
                    <h3 class="font-serif text-2xl font-bold text-bv-ink">
                        Our Quality &amp; Safety Promise
                    </h3>
                    
                    <div class="space-y-4 font-sans text-base sm:text-lg text-bv-ink">
                        <div class="flex items-start gap-4 p-4 rounded-xl bg-bv-bg border border-bv-border-light">
                            <span class="w-10 h-10 rounded-full bg-white text-bv-brown flex items-center justify-center shrink-0 mt-0.5 shadow-sm">
                                <svg class="w-5 h-5 text-bv-brown" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                    <path d="m9 12 2 2 4-4"/>
                                </svg>
                            </span>
                            <div>
                                <strong class="text-bv-ink block"><?php echo esc_html( $p1_title ); ?></strong>
                                <p class="text-sm text-bv-muted mt-0.5"><?php echo esc_html( $p1_desc ); ?></p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-4 rounded-xl bg-bv-bg border border-bv-border-light">
                            <span class="w-10 h-10 rounded-full bg-white text-bv-brown flex items-center justify-center shrink-0 mt-0.5 shadow-sm">
                                <svg class="w-5 h-5 text-bv-brown" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m18 15-6-6-6 6"/>
                                    <path d="M12 3v18"/>
                                    <circle cx="12" cy="18" r="3"/>
                                </svg>
                            </span>
                            <div>
                                <strong class="text-bv-ink block"><?php echo esc_html( $p2_title ); ?></strong>
                                <p class="text-sm text-bv-muted mt-0.5"><?php echo esc_html( $p2_desc ); ?></p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-4 rounded-xl bg-bv-bg border border-bv-border-light">
                            <span class="w-10 h-10 rounded-full bg-white text-bv-brown flex items-center justify-center shrink-0 mt-0.5 shadow-sm">
                                <svg class="w-5 h-5 text-bv-brown" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="13.5" cy="6.5" r=".5" fill="currentColor"/>
                                    <circle cx="17.5" cy="10.5" r=".5" fill="currentColor"/>
                                    <circle cx="8.5" cy="7.5" r=".5" fill="currentColor"/>
                                    <circle cx="6.5" cy="12.5" r=".5" fill="currentColor"/>
                                    <path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.563-2.512 5.563-5.563C22 6.5 17.5 2 12 2Z"/>
                                </svg>
                            </span>
                            <div>
                                <strong class="text-bv-ink block"><?php echo esc_html( $p3_title ); ?></strong>
                                <p class="text-sm text-bv-muted mt-0.5"><?php echo esc_html( $p3_desc ); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
