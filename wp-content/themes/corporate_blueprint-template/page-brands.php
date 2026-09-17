<?php
/**
 * Template Name: Brands
 * Description: Halaman listing semua brand di WooCommerce
 *
 * @package MBSCCTV
 */

get_header();

$brands = get_terms( array(
    'taxonomy'   => 'product_brand',
    'hide_empty' => false,
    'orderby'    => 'name',
    'order'      => 'ASC',
) );
?>

<!-- Hero Banner -->
<section class="relative py-14 lg:py-20 overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://mbs.growandbless.com/wp-content/uploads/2026/03/1987.jpg" alt="" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-slate-900/85"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="mb-6 text-sm text-slate-400">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-white transition-colors">Beranda</a>
            <span class="material-symbols-outlined text-xs align-middle mx-1">chevron_right</span>
            <span class="text-white font-semibold">Brand</span>
        </nav>
        <div class="flex items-start gap-6">
            <div class="hidden sm:flex size-16 bg-primary/20 rounded-lg items-center justify-center flex-shrink-0">
                <span class="material-symbols-outlined text-4xl text-primary">verified</span>
            </div>
            <div>
                <h1 class="text-3xl lg:text-4xl font-black text-white mb-3">Brand & Partner Resmi</h1>
                <p class="text-slate-300 max-w-2xl leading-relaxed">Kami adalah distributor resmi dari brand-brand sistem keamanan terkemuka dunia. Setiap produk dijamin asli dengan garansi resmi.</p>
                <?php if ( ! empty( $brands ) && ! is_wp_error( $brands ) ) : ?>
                    <p class="mt-3 text-sm text-slate-400"><?php echo count( $brands ); ?> brand tersedia</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Brand Grid -->
<section class="py-12 lg:py-16 bg-background-light dark:bg-background-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <?php if ( ! empty( $brands ) && ! is_wp_error( $brands ) ) : ?>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 lg:gap-6">
                <?php foreach ( $brands as $brand ) :
                    $brand_thumb_id  = get_term_meta( $brand->term_id, 'thumbnail_id', true );
                    $brand_thumb_url = $brand_thumb_id ? wp_get_attachment_url( $brand_thumb_id ) : '';
                    $brand_desc      = $brand->description;
                ?>
                    <a href="<?php echo esc_url( get_term_link( $brand ) ); ?>"
                       class="group bg-white dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700 overflow-hidden hover:shadow-lg hover:border-primary/30 transition-all duration-300">
                        <!-- Brand Logo -->
                        <div class="aspect-[3/2] bg-white dark:bg-slate-700 flex items-center justify-center p-6 border-b border-slate-100 dark:border-slate-700">
                            <?php if ( $brand_thumb_url ) : ?>
                                <img src="<?php echo esc_url( $brand_thumb_url ); ?>"
                                     alt="<?php echo esc_attr( $brand->name ); ?>"
                                     class="max-w-full max-h-full object-contain group-hover:scale-105 transition-transform duration-300" />
                            <?php else : ?>
                                <span class="material-symbols-outlined text-5xl text-slate-300 group-hover:text-primary transition-colors">verified</span>
                            <?php endif; ?>
                        </div>

                        <!-- Brand Info -->
                        <div class="p-4 lg:p-5">
                            <h3 class="font-bold text-sm lg:text-base mb-1 group-hover:text-primary transition-colors">
                                <?php echo esc_html( $brand->name ); ?>
                            </h3>
                            <?php if ( $brand_desc ) : ?>
                                <p class="text-xs text-slate-500 line-clamp-2 mb-2"><?php echo esc_html( $brand_desc ); ?></p>
                            <?php endif; ?>
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-slate-400"><?php echo esc_html( $brand->count ); ?> produk</span>
                                <span class="material-symbols-outlined text-sm text-primary opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300">arrow_forward</span>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>

        <?php else : ?>
            <div class="text-center py-20">
                <span class="material-symbols-outlined text-6xl text-slate-300 mb-4">verified</span>
                <h3 class="text-xl font-bold mb-2">Belum Ada Brand</h3>
                <p class="text-slate-500 mb-6">Brand belum tersedia. Silakan kembali lagi nanti.</p>
                <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>"
                   class="inline-flex items-center gap-2 bg-primary text-white px-6 py-3 rounded-md font-bold hover:bg-primary/90 transition-all">
                    <span class="material-symbols-outlined">arrow_back</span> Lihat Semua Produk
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Why Official Distributor -->
<section class="py-16 lg:py-20 bg-white dark:bg-slate-900/50 border-t border-slate-200 dark:border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-2xl lg:text-3xl font-black mb-3">Keuntungan Membeli dari Distributor Resmi</h2>
            <p class="text-slate-500 max-w-2xl mx-auto">Semua produk yang kami jual dijamin asli dan bergaransi resmi dari pabrik.</p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php
            $benefits = array(
                array( 'icon' => 'shield',         'title' => 'Garansi Resmi',       'desc' => 'Setiap produk dilengkapi garansi resmi dari principal/pabrik.' ),
                array( 'icon' => 'verified_user',   'title' => 'Produk Asli 100%',    'desc' => 'Dijamin original, bukan refurbished atau barang grey market.' ),
                array( 'icon' => 'build',           'title' => 'Support Teknis',      'desc' => 'Dukungan teknis langsung dari tim bersertifikasi brand.' ),
                array( 'icon' => 'update',          'title' => 'Firmware & Update',   'desc' => 'Akses firmware dan software update resmi dari pabrik.' ),
            );
            foreach ( $benefits as $item ) :
            ?>
            <div class="text-center p-6">
                <div class="size-14 bg-primary/10 rounded-lg flex items-center justify-center mx-auto mb-4">
                    <span class="material-symbols-outlined text-2xl text-primary"><?php echo esc_html( $item['icon'] ); ?></span>
                </div>
                <h3 class="font-bold mb-2"><?php echo esc_html( $item['title'] ); ?></h3>
                <p class="text-sm text-slate-500 leading-relaxed"><?php echo esc_html( $item['desc'] ); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php
get_footer();
