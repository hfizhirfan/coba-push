<!-- Latest News -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-black mb-12">Berita &amp; Informasi Terbaru</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <?php
            $news_query = new WP_Query( array(
                'posts_per_page' => 3,
                'post_status'    => 'publish',
            ) );

            if ( $news_query->have_posts() ) :
                while ( $news_query->have_posts() ) :
                    $news_query->the_post();
                    ?>
                    <article class="space-y-4">
                        <div class="aspect-video bg-slate-200 rounded-lg overflow-hidden">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-full object-cover' ) ); ?>
                            <?php endif; ?>
                        </div>
                        <div class="flex items-center gap-4 text-xs font-bold text-primary">
                            <span><?php echo esc_html( strtoupper( get_the_date( 'M d, Y' ) ) ); ?></span>
                            <?php
                            $categories = get_the_category();
                            if ( ! empty( $categories ) ) :
                                ?>
                                <span class="bg-primary/10 px-2 py-0.5 rounded"><?php echo esc_html( strtoupper( $categories[0]->name ) ); ?></span>
                            <?php endif; ?>
                        </div>
                        <h3 class="text-xl font-bold leading-snug">
                            <a href="<?php the_permalink(); ?>" class="hover:text-primary transition-colors">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm line-clamp-2"><?php echo esc_html( get_the_excerpt() ); ?></p>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Fallback static content
                ?>
                <article class="space-y-4">
                    <div class="aspect-video bg-slate-200 rounded-lg overflow-hidden"
                         style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBF-wkKy8arbr9B3TtHwYPVqqOWr4ildonH-mFoAa165SUFcsdAirv9kjLAb7prTiJGusf_ZttYuEbISpR5YLCO-rTZtehMFNCZ_ts64bJ4T4hXDqKpEv1Szw4PaKpeeBJTKeKkNVrpAx1HsNpueY_6LhYQYVAmg2tSsPwoHLPajJKfMzEIpfVUD97Stj2unvw28S1IVs1RHbIC9pZdGwK5UZUzY9OhU-JKK2hy_mjLk_rCwyR7LULDPLHlJ7bm5f3Us88si0-megU'); background-size: cover;"></div>
                    <div class="flex items-center gap-4 text-xs font-bold text-primary">
                        <span>OKT 24, 2023</span>
                        <span class="bg-primary/10 px-2 py-0.5 rounded">TEKNOLOGI</span>
                    </div>
                    <h3 class="text-xl font-bold leading-snug">Masa Depan AI dalam Sistem Pengawasan</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm line-clamp-2">Bagaimana deep learning merevolusi deteksi gerakan dan akurasi pengenalan wajah pada kamera keamanan modern.</p>
                </article>
                <article class="space-y-4">
                    <div class="aspect-video bg-slate-200 rounded-lg overflow-hidden"
                         style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCLtM8LSBZF1CVgpTRHTsmfljVvzJwtSLm8w4Y7zFLd3pIf0CzBth85zUUM5o3qmcGUMFI1DUBefvCf82_S4SWbi3cBtLZ_FcSlYPdC0jyEjOvL05t0ovncKPOu4Qz8DH6I93OJCuJn6dnrcZLUmE3DAvcNfyaHDfp2OnrqjrzgOcARi36tfRBB57CWybxgd0wwXMRdVELGF3ak3DWNDgHxEmrpYxcvzyFdIQ60Bt83vkkpdiXFZ5gSsMq7EURx_GV_oDX4e8te2aM'); background-size: cover;"></div>
                    <div class="flex items-center gap-4 text-xs font-bold text-primary">
                        <span>OKT 18, 2023</span>
                        <span class="bg-primary/10 px-2 py-0.5 rounded">PANDUAN</span>
                    </div>
                    <h3 class="text-xl font-bold leading-snug">Memilih Access Control yang Tepat untuk Perkantoran</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm line-clamp-2">Panduan lengkap perbandingan sistem biometrik vs kartu RFID untuk gedung komersial kecil hingga menengah.</p>
                </article>
                <article class="space-y-4">
                    <div class="aspect-video bg-slate-200 rounded-lg overflow-hidden"
                         style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCv0z1z4_YjQAvq3pNiBNpnY1WE_HWUcTQfFHuYNoUUkQcQIbh_3k13M2l1exM0SeYsIJpXmI3WGWRJCsI8DLB5pbMc04O8P2WgJdvSHp1-f6A-bdTBwVpJW6lgz4bvX2ha-6UbSL80lWPfUH7mWNl0MUgeK08xylvpgNufbY9ktxPJBvxpQ1D8vSiwmY9CTFeaY2zHH9PVPadYhoDumgp1W-Uf09ILhrqpMwZsp982okFKT9Fn-LXQh7fTsOMXQQweybZewPLiIUA'); background-size: cover;"></div>
                    <div class="flex items-center gap-4 text-xs font-bold text-primary">
                        <span>OKT 12, 2023</span>
                        <span class="bg-primary/10 px-2 py-0.5 rounded">BERITA</span>
                    </div>
                    <h3 class="text-xl font-bold leading-snug">Sistem Fire Alarm untuk Proteksi Kebakaran di Surabaya</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm line-clamp-2">MBS CCTV menyediakan solusi fire alarm dan fire suppression terlengkap untuk gedung dan fasilitas komersial.</p>
                </article>
            <?php endif; ?>
        </div>
    </div>
</section>
