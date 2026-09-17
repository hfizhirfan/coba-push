<!-- Product Categories -->
<section class="relative py-20 text-white overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="https://mbs.growandbless.com/wp-content/uploads/2026/03/1987.jpg" alt="" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-slate-900/90"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <h2 class="text-3xl font-black mb-4">Portofolio Perangkat</h2>
            <p class="text-slate-400 max-w-2xl mx-auto">Kami menyediakan berbagai sistem keamanan elektronik berkualitas tinggi dari brand terkemuka dunia.</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 lg:gap-5">
            <?php
            // WooCommerce product category data
            $product_categories = array(
                array(
                    'icon'  => 'videocam',
                    'title' => 'CCTV',
                    'desc'  => 'Kamera pengawas IP & analog untuk monitoring area yang sulit dijangkau.',
                    'slug'  => 'cctv',
                ),
                array(
                    'icon'  => 'fingerprint',
                    'title' => 'Access Control',
                    'desc'  => 'Sistem kontrol akses biometrik & kartu untuk keamanan gedung.',
                    'slug'  => 'access-control',
                ),
                array(
                    'icon'  => 'emergency_home',
                    'title' => 'Intrusion Alarm',
                    'desc'  => 'Alarm terintegrasi untuk proteksi dari gangguan keamanan.',
                    'slug'  => 'intrusion-alarm',
                ),
                array(
                    'icon'  => 'local_fire_department',
                    'title' => 'Fire Alarm',
                    'desc'  => 'Deteksi dini dan notifikasi darurat kebakaran otomatis.',
                    'slug'  => 'fire-alarm',
                ),
                array(
                    'icon'  => 'campaign',
                    'title' => 'Public Address',
                    'desc'  => 'Sistem komunikasi darurat dan pengumuman untuk fasilitas publik.',
                    'slug'  => 'public-address',
                ),
                array(
                    'icon'  => 'doorbell',
                    'title' => 'Video Door Phone',
                    'desc'  => 'Interkom video untuk monitoring dan verifikasi tamu.',
                    'slug'  => 'video-door-phone',
                ),
            );

            foreach ( $product_categories as $cat ) :
                // Build WooCommerce category URL if available
                $cat_url = '#';
                if ( function_exists( 'wc_get_page_permalink' ) ) {
                    $term = get_term_by( 'slug', $cat['slug'], 'product_cat' );
                    if ( $term ) {
                        $cat_url = get_term_link( $term );
                    }
                }
            ?>
            <a href="<?php echo esc_url( $cat_url ); ?>"
               class="group relative bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 p-6 lg:p-8
                      hover:bg-primary hover:border-primary hover:shadow-xl hover:shadow-primary/20
                      transition-all duration-300 hover:-translate-y-1">
                <!-- Icon -->
                <div class="size-14 mb-5 bg-primary/20 rounded-lg flex items-center justify-center
                            group-hover:bg-white/20 transition-all duration-300">
                    <span class="material-symbols-outlined text-3xl text-primary group-hover:text-white transition-colors duration-300"><?php echo esc_html( $cat['icon'] ); ?></span>
                </div>

                <!-- Content -->
                <h3 class="text-lg font-bold mb-2 group-hover:text-white transition-colors"><?php echo esc_html( $cat['title'] ); ?></h3>
                <p class="text-sm text-slate-400 leading-relaxed group-hover:text-white/80 transition-colors"><?php echo esc_html( $cat['desc'] ); ?></p>

                <!-- Arrow -->
                <div class="mt-4 flex items-center gap-1 text-sm font-semibold text-primary group-hover:text-white transition-colors">
                    <span>Lihat Produk</span>
                    <span class="material-symbols-outlined text-lg group-hover:translate-x-1 transition-transform duration-300">arrow_forward</span>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
