<?php
/**
 * About Veron Section - Brows by Veron
 */
$lead = get_option( 'bv_about_lead', 'is a Worldwide Championship PMU Artist specializing in Hairstroke Category, worked by heart, passion, thoughtful practice and of course dedication quality.' );
$bio_1 = get_option( 'bv_about_bio_1', 'Established in 2021 and located in Surabaya City. But she often travels outside Surabaya to take jobs.' );
$bio_2 = get_option( 'bv_about_bio_2', 'Browsbyveron is known for its natural result and refined technique.' );
$stat_1_num = get_option( 'bv_about_stat_1_num', 'Est. 2021' );
$stat_1_label = get_option( 'bv_about_stat_1_label', 'Surabaya City' );
$stat_2_num = get_option( 'bv_about_stat_2_num', 'Worldwide' );
$stat_2_label = get_option( 'bv_about_stat_2_label', 'TOP 5 Champion' );
$wa_url = mbscctv_get_whatsapp_url( 'Halo Brows by Veron, saya ingin konsultasi langsung dengan Veron.' );
?>
<section id="about" class="py-20 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left: Text Bio -->
            <div class="lg:col-span-7 space-y-6 bbz-reveal">
                <span class="text-xs uppercase tracking-[0.25em] text-bv-brown font-bold block">
                    ABOUT THE ARTIST
                </span>
                
                <h2 class="font-serif text-4xl sm:text-5xl text-bv-ink font-bold">
                    Brows by Veron
                </h2>

                <p class="font-serif text-xl sm:text-2xl text-bv-ink leading-relaxed font-normal">
                    <?php echo nl2br( esc_html( $lead ) ); ?>
                </p>

                <div class="w-16 h-0.5 bg-bv-border my-6"></div>

                <p class="font-sans text-base sm:text-lg text-bv-muted leading-relaxed">
                    <?php echo nl2br( esc_html( $bio_1 ) ); ?>
                </p>

                <p class="font-sans text-base sm:text-lg text-bv-muted leading-relaxed">
                    <?php echo nl2br( esc_html( $bio_2 ) ); ?>
                </p>

                <!-- 3 Key Stats Box -->
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 pt-4 text-center">
                    <div class="bg-bv-bg p-4 rounded-xl border border-bv-border-light">
                        <p class="font-serif text-2xl font-bold text-bv-brown"><?php echo esc_html( $stat_1_num ); ?></p>
                        <p class="text-xs text-bv-ink uppercase tracking-wider font-semibold"><?php echo esc_html( $stat_1_label ); ?></p>
                    </div>
                    <div class="bg-bv-bg p-4 rounded-xl border border-bv-border-light">
                        <p class="font-serif text-2xl font-bold text-bv-brown"><?php echo esc_html( $stat_2_num ); ?></p>
                        <p class="text-xs text-bv-ink uppercase tracking-wider font-semibold"><?php echo esc_html( $stat_2_label ); ?></p>
                    </div>
                    <div class="bg-bv-bg p-4 rounded-xl border border-bv-border-light col-span-2 sm:col-span-1">
                        <p class="font-serif text-2xl font-bold text-bv-brown">100%</p>
                        <p class="text-xs text-bv-ink uppercase tracking-wider font-semibold">Refined Technique</p>
                    </div>
                </div>

                <div class="pt-4">
                    <a href="<?php echo esc_url( $wa_url ); ?>" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="bv-btn-primary py-3 px-8 text-sm inline-flex items-center gap-2">
                        <i class="fa-brands fa-whatsapp text-lg"></i>
                        <span>Chat Directly with Veron</span>
                    </a>
                </div>
            </div>

            <!-- Right: Artist Portrait -->
            <div class="lg:col-span-5 bbz-reveal">
                <div class="bv-polaroid p-4 max-w-sm mx-auto shadow-2xl">
                    <div class="overflow-hidden rounded-lg bg-bv-bg-soft aspect-[3/4]">
                        <img src="<?php echo esc_url( bv_get_home_block_image_url( 'bv-about-right', 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=900&auto=format&fit=crop' ) ); ?>" 
                             alt="Veron - Brows by Veron" 
                             class="w-full h-full object-cover"/>
                    </div>
                    <div class="mt-4 text-center">
                        <p class="font-serif text-xl text-bv-ink font-bold">Veron</p>
                        <p class="font-sans text-xs text-bv-brown uppercase tracking-widest font-semibold">
                            Master PMU Artist • Surabaya
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
