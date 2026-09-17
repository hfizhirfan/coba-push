<?php
/**
 * Gallery / Results Showcase - Brows by Veron
 */
?>
<section id="gallery" class="py-20 bg-bv-bg relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Heading -->
        <div class="text-center max-w-3xl mx-auto mb-12 bbz-reveal">
            <span class="text-xs uppercase tracking-[0.25em] text-bv-brown font-bold block mb-2">
                TRANSFORMATION
            </span>
            <h2 class="font-serif text-4xl sm:text-5xl text-bv-ink font-bold">
                RESULTS GALLERY
            </h2>
            <p class="font-sans text-base text-bv-muted mt-3">
                Hasil nyata pengerjaan Veron untuk berbagai tipe alis dan bibir dengan teknik presisi tinggi.
            </p>
        </div>

        <!-- Filter Tabs -->
        <div class="flex flex-wrap items-center justify-center gap-2.5 mb-12 bbz-reveal">
            <button type="button" class="bv-filter-btn active" data-filter="all">All Results</button>
            <button type="button" class="bv-filter-btn" data-filter="ombre">Ombre Powder</button>
            <button type="button" class="bv-filter-btn" data-filter="hairstroke">Hairstroke</button>
            <button type="button" class="bv-filter-btn" data-filter="mix">Hairstroke Mix Powder</button>
            <button type="button" class="bv-filter-btn" data-filter="fluffy">Fluffy Hairstroke</button>
            <button type="button" class="bv-filter-btn" data-filter="lips">Lips</button>
        </div>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Item 1: Ombre Powder -->
            <div class="bbz-gallery-item bv-polaroid bbz-reveal" data-category="ombre">
                <div class="overflow-hidden rounded-lg bg-bv-bg-soft aspect-square mb-4">
                    <img src="<?php echo esc_url( bv_get_home_block_image_url( 'bv-gallery-grid', 'https://images.unsplash.com/photo-1512496015851-a90fb38ba796?q=80&w=800&auto=format&fit=crop', 0 ) ); ?>" 
                         alt="Ombre Powder Brows Result" 
                         class="w-full h-full object-cover">
                </div>
                <div class="text-center">
                    <span class="font-serif text-lg font-bold text-bv-ink block">OMBRE POWDER</span>
                    <p class="font-sans text-xs text-bv-muted mt-1">Full powder, look seperti memakai pensil alis</p>
                </div>
            </div>

            <!-- Item 2: Hairstroke -->
            <div class="bbz-gallery-item bv-polaroid bbz-reveal" data-category="hairstroke">
                <div class="overflow-hidden rounded-lg bg-bv-bg-soft aspect-square mb-4">
                    <img src="<?php echo esc_url( bv_get_home_block_image_url( 'bv-gallery-grid', 'https://images.unsplash.com/photo-1596704017254-9b121068fb31?q=80&w=800&auto=format&fit=crop', 1 ) ); ?>" 
                         alt="Hairstroke Brows Result" 
                         class="w-full h-full object-cover">
                </div>
                <div class="text-center">
                    <span class="font-serif text-lg font-bold text-bv-ink block">HAIRSTROKE</span>
                    <p class="font-sans text-xs text-bv-muted mt-1">Clean &amp; full hairstroke, serat bulu asli &amp; rapi</p>
                </div>
            </div>

            <!-- Item 3: Hairstroke Mix Powder -->
            <div class="bbz-gallery-item bv-polaroid bbz-reveal" data-category="mix">
                <div class="overflow-hidden rounded-lg bg-bv-bg-soft aspect-square mb-4">
                    <img src="<?php echo esc_url( bv_get_home_block_image_url( 'bv-gallery-grid', 'https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?q=80&w=800&auto=format&fit=crop', 2 ) ); ?>" 
                         alt="Hairstroke Mix Powder Result" 
                         class="w-full h-full object-cover">
                </div>
                <div class="text-center">
                    <span class="font-serif text-lg font-bold text-bv-ink block">HAIRSTROKE MIX POWDER</span>
                    <p class="font-sans text-xs text-bv-muted mt-1">Serat di bagian depan &amp; powder di belakang</p>
                </div>
            </div>

            <!-- Item 4: Fluffy Hairstroke -->
            <div class="bbz-gallery-item bv-polaroid bbz-reveal" data-category="fluffy">
                <div class="overflow-hidden rounded-lg bg-bv-bg-soft aspect-square mb-4">
                    <img src="https://images.unsplash.com/photo-1527799820374-dcf8d9d4a388?q=80&w=800&auto=format&fit=crop" 
                         alt="Fluffy Hairstroke Result" 
                         class="w-full h-full object-cover">
                </div>
                <div class="text-center">
                    <span class="font-serif text-lg font-bold text-bv-ink block">FLUFFY HAIRSTROKE</span>
                    <p class="font-sans text-xs text-bv-muted mt-1">Full hairstroke dengan penambahan baby hair padat</p>
                </div>
            </div>

            <!-- Item 5: Lips Result -->
            <div class="bbz-gallery-item bv-polaroid bbz-reveal" data-category="lips">
                <div class="overflow-hidden rounded-lg bg-bv-bg-soft aspect-square mb-4">
                    <img src="https://images.unsplash.com/photo-1588510977054-8e4b4d409743?q=80&w=800&auto=format&fit=crop" 
                         alt="Lips Sulam Bibir Result" 
                         class="w-full h-full object-cover">
                </div>
                <div class="text-center">
                    <span class="font-serif text-lg font-bold text-bv-ink block">LIPS SULAM BIBIR</span>
                    <p class="font-sans text-xs text-bv-muted mt-1">Natural rosy tone, merata dan segar merona</p>
                </div>
            </div>

            <!-- Item 6: Hairstroke Natural -->
            <div class="bbz-gallery-item bv-polaroid bbz-reveal" data-category="hairstroke">
                <div class="overflow-hidden rounded-lg bg-bv-bg-soft aspect-square mb-4">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=800&auto=format&fit=crop" 
                         alt="Natural Brow Alignment" 
                         class="w-full h-full object-cover">
                </div>
                <div class="text-center">
                    <span class="font-serif text-lg font-bold text-bv-ink block">NATURAL ALIGNMENT</span>
                    <p class="font-sans text-xs text-bv-muted mt-1">Menyatu sempurna dengan tekstur alis asli</p>
                </div>
            </div>

        </div>

    </div>
</section>
