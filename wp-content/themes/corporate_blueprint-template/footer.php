<?php
/**
 * Footer template - Brows by Veron
 *
 * @package BrowsByVeron
 */

$wa_url = mbscctv_get_whatsapp_url();
$location = get_option( 'bv_studio_location', 'Surabaya City, Indonesia' );
$sublocation = get_option( 'bv_studio_sublocation', '(Often travels outside Surabaya)' );
$hours = get_option( 'bv_studio_hours', 'By Appointment Only' );
$wa_number = get_option( 'mbscctv_whatsapp_number', '6281234567890' );
?>

<footer class="bg-bv-footer text-white pt-16 pb-12 border-t border-bv-brown/20" id="footer">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 pb-12 border-b border-white/10">
            
            <!-- Col 1: Brand & Bio -->
            <div class="lg:col-span-4 space-y-4">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex flex-col">
                    <span class="font-serif text-2xl sm:text-3xl font-bold tracking-tight text-white">
                        Brows <span class="text-bv-taupe italic font-serif">by Veron</span>
                    </span>
                    <span class="text-[0.62rem] uppercase tracking-[0.28em] text-bv-taupe font-semibold -mt-1">
                        BEAUTY STUDIO
                    </span>
                </a>
                <p class="text-sm font-sans text-white/70 leading-relaxed max-w-sm">
                    Worldwide Championship PMU Artist specializing in Hairstroke Category. Natural result, thoughtful practice, and refined technique in Surabaya City.
                </p>
            </div>

            <!-- Col 2: Services Menu -->
            <div class="lg:col-span-3">
                <h4 class="font-serif text-lg font-bold text-white mb-4">
                    Treatments
                </h4>
                <ul class="space-y-2 text-sm font-sans text-white/75">
                    <li><a href="#pricing" class="hover:text-bv-taupe transition-colors">Hairstroke Eyebrows</a></li>
                    <li><a href="#pricing" class="hover:text-bv-taupe transition-colors">Hairstroke Mix Powder</a></li>
                    <li><a href="#pricing" class="hover:text-bv-taupe transition-colors">Ombre Powder Brows</a></li>
                    <li><a href="#pricing" class="hover:text-bv-taupe transition-colors">Fluffy Hairstroke</a></li>
                    <li><a href="#pricing" class="hover:text-bv-taupe transition-colors">Hairstroke for Men</a></li>
                    <li><a href="#pricing" class="hover:text-bv-taupe transition-colors">Lips Sulam Bibir</a></li>
                </ul>
            </div>

            <!-- Col 3: Quick Links -->
            <div class="lg:col-span-2">
                <h4 class="font-serif text-lg font-bold text-white mb-4">
                    Navigation
                </h4>
                <ul class="space-y-2 text-sm font-sans text-white/75">
                    <li><a href="#hero" class="hover:text-bv-taupe transition-colors">Home</a></li>
                    <li><a href="#about" class="hover:text-bv-taupe transition-colors">About Veron</a></li>
                    <li><a href="#services" class="hover:text-bv-taupe transition-colors">Quality Promise</a></li>
                    <li><a href="#pricing" class="hover:text-bv-taupe transition-colors">Price List</a></li>
                    <li><a href="#gallery" class="hover:text-bv-taupe transition-colors">Results Gallery</a></li>
                    <li><a href="#terms" class="hover:text-bv-taupe transition-colors">Term &amp; Conditions</a></li>
                </ul>
            </div>

            <!-- Col 4: Studio Info -->
            <div class="lg:col-span-3">
                <h4 class="font-serif text-lg font-bold text-white mb-4">
                    Studio &amp; Booking
                </h4>
                <div class="space-y-4 text-sm font-sans text-white/80">
                    <div class="flex items-start gap-3">
                        <svg class="w-4 h-4 text-bv-taupe shrink-0 mt-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                        <div class="leading-normal">
                            <span class="text-white font-medium block"><?php echo esc_html( $location ); ?></span>
                            <?php if ( $sublocation ) : ?>
                                <span class="text-xs text-white/50 block mt-0.5"><?php echo esc_html( $sublocation ); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3">
                        <svg class="w-4 h-4 text-bv-taupe shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="12" cy="12" r="10"/>
                            <polyline points="12 6 12 12 16 14"/>
                        </svg>
                        <span class="text-white font-medium"><?php echo esc_html( $hours ); ?></span>
                    </div>
                    
                    <div class="flex items-center gap-3">
                        <svg class="w-4 h-4 text-bv-taupe shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                        </svg>
                        <a href="<?php echo esc_url( $wa_url ); ?>" target="_blank" rel="noopener noreferrer" class="text-white font-medium hover:text-whatsapp-green transition-colors">
                            WhatsApp: +<?php echo esc_html( $wa_number ); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Copyright -->
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs font-sans text-white/50">
            <p>&copy; <?php echo date( 'Y' ); ?> Brows by Veron. All rights reserved.</p>
            <div class="flex items-center gap-6">
                <span>3x Hairstroke Champion 🇮🇩</span>
                <span>•</span>
                <span>TOP 5 Worldwide Championship 🏆</span>
            </div>
        </div>
    </div>
</footer>

<!-- Floating WhatsApp Action Button -->
<a href="<?php echo esc_url( $wa_url ); ?>"
   target="_blank"
   rel="noopener noreferrer"
   class="bv-floating-whatsapp"
   aria-label="Chat WhatsApp Brows by Veron"
   title="Konsultasi & Reservasi WhatsApp">
    <i class="fa-brands fa-whatsapp text-3xl"></i>
</a>

<?php wp_footer(); ?>
</body>
</html>
