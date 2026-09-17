<?php
/**
 * Final CTA Banner - Brows by Veron
 */
$quote = get_option( 'bv_quote_text', '“Beauty begins the moment you decide to be yourself”' );
$wa_url = mbscctv_get_whatsapp_url();
?>
<section id="contact" class="py-24 bg-bv-bg-soft relative overflow-hidden text-center">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-6 bbz-reveal">
        
        <p class="font-serif text-3xl sm:text-5xl lg:text-6xl text-bv-ink font-bold leading-tight">
            <?php echo esc_html( $quote ); ?>
        </p>

        <p class="font-sans text-base sm:text-lg text-bv-muted max-w-2xl mx-auto leading-relaxed pt-2">
            Percayakan kesempurnaan alis dan bibir natural Anda kepada <strong>Worldwide Championship PMU Artist</strong>. Slot jadwal terbatas demi menjaga kualitas pengerjaan 1-on-1.
        </p>

        <div class="pt-6 flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="<?php echo esc_url( $wa_url ); ?>" 
               target="_blank" 
               rel="noopener noreferrer" 
               class="bv-btn-primary py-4 px-8 text-base">
                <i class="fa-brands fa-whatsapp text-2xl text-whatsapp-green"></i>
                <span>Book Appointment via WhatsApp</span>
            </a>
            
            <a href="#pricing" class="bv-btn-outline py-4 px-7 text-base">
                <span>View Full Price List</span>
            </a>
        </div>

        <div class="pt-6 flex flex-wrap items-center justify-center gap-6 text-xs text-bv-muted font-sans font-medium">
            <span>✨ Located in Surabaya City</span>
            <span>•</span>
            <span>📍 Travels outside Surabaya available</span>
            <span>•</span>
            <span>🛡️ 100% Sterile &amp; Disposable Needles</span>
        </div>
    </div>
</section>
