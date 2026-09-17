<?php
/**
 * WooCommerce Single Product Page
 *
 * @package MBSCCTV
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
    the_post();

    global $product;

    // Get product data
    $product_cats = get_the_terms( get_the_ID(), 'product_cat' );
    $cat_name     = ! empty( $product_cats ) ? $product_cats[0]->name : '';
    $cat_link     = ! empty( $product_cats ) ? get_term_link( $product_cats[0] ) : '#';
    $cat_icon     = ! empty( $product_cats ) ? mbscctv_get_category_icon( $product_cats[0]->slug ) : 'security';
?>

<main class="bg-background-light dark:bg-background-dark">
    <!-- Breadcrumb -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8">
        <nav class="text-sm text-slate-500">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-primary transition-colors">Beranda</a>
            <span class="material-symbols-outlined text-xs align-middle mx-1">chevron_right</span>
            <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="hover:text-primary transition-colors">Produk</a>
            <?php if ( $cat_name ) : ?>
                <span class="material-symbols-outlined text-xs align-middle mx-1">chevron_right</span>
                <a href="<?php echo esc_url( $cat_link ); ?>" class="hover:text-primary transition-colors"><?php echo esc_html( $cat_name ); ?></a>
            <?php endif; ?>
            <span class="material-symbols-outlined text-xs align-middle mx-1">chevron_right</span>
            <span class="text-slate-900 dark:text-white font-semibold"><?php the_title(); ?></span>
        </nav>
    </div>

    <!-- Product Detail Section -->
    <section class="py-10 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-10 lg:gap-16">

                <!-- Product Gallery -->
                <div class="space-y-4">
                    <div class="aspect-square bg-white dark:bg-slate-800 rounded-lg overflow-hidden border border-slate-200 dark:border-slate-700">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'full', array(
                                'class' => 'w-full h-full object-contain p-4',
                            ) ); ?>
                        <?php else : ?>
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="material-symbols-outlined text-8xl text-slate-300">image</span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php
                    // Product gallery thumbnails
                    $attachment_ids = $product->get_gallery_image_ids();
                    if ( ! empty( $attachment_ids ) ) :
                    ?>
                    <div class="grid grid-cols-4 gap-3">
                        <!-- Main image thumb -->
                        <div class="aspect-square bg-white dark:bg-slate-800 rounded-md overflow-hidden border-2 border-primary cursor-pointer">
                            <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'w-full h-full object-cover' ) ); ?>
                        </div>
                        <?php foreach ( array_slice( $attachment_ids, 0, 3 ) as $attachment_id ) : ?>
                            <div class="aspect-square bg-white dark:bg-slate-800 rounded-md overflow-hidden border border-slate-200 dark:border-slate-700 cursor-pointer hover:border-primary transition-colors">
                                <?php echo wp_get_attachment_image( $attachment_id, 'thumbnail', false, array( 'class' => 'w-full h-full object-cover' ) ); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Product Info -->
                <div class="space-y-6">
                    <!-- Category & SKU -->
                    <div class="flex flex-wrap items-center gap-3">
                        <?php if ( $cat_name ) : ?>
                            <a href="<?php echo esc_url( $cat_link ); ?>"
                               class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider hover:bg-primary/20 transition-colors">
                                <span class="material-symbols-outlined text-sm"><?php echo esc_html( $cat_icon ); ?></span>
                                <?php echo esc_html( $cat_name ); ?>
                            </a>
                        <?php endif; ?>
                        <?php if ( $product->get_sku() ) : ?>
                            <span class="text-xs text-slate-400 font-mono">SKU: <?php echo esc_html( $product->get_sku() ); ?></span>
                        <?php endif; ?>
                    </div>

                    <!-- Title -->
                    <h1 class="text-2xl lg:text-3xl font-black leading-tight"><?php the_title(); ?></h1>

                    <!-- Short Description -->
                    <?php if ( $product->get_short_description() ) : ?>
                        <div class="text-slate-600 dark:text-slate-400 leading-relaxed prose prose-sm max-w-none">
                            <?php echo wp_kses_post( $product->get_short_description() ); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Price -->
                    <div class="bg-white dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700 p-5">
                        <?php if ( $product->get_price() ) : ?>
                            <p class="text-xs font-bold text-slate-400 uppercase mb-1">Harga</p>
                            <div class="text-2xl lg:text-3xl font-black text-primary">
                                <?php woocommerce_template_single_price(); ?>
                            </div>
                        <?php else : ?>
                            <p class="text-sm font-bold text-slate-500">Hubungi kami untuk penawaran harga terbaik.</p>
                        <?php endif; ?>

                        <?php if ( $product->is_on_sale() && $product->get_regular_price() ) : ?>
                            <div class="mt-2 inline-flex items-center gap-2 bg-primary/10 text-primary text-xs font-bold px-2 py-1 rounded-md">
                                <span class="material-symbols-outlined text-sm">discount</span>
                                Hemat <?php
                                    $save = (float) $product->get_regular_price() - (float) $product->get_sale_price();
                                    echo wc_price( $save );
                                ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Stock Status -->
                    <div class="flex items-center gap-2">
                        <?php if ( $product->is_in_stock() ) : ?>
                            <span class="size-2.5 bg-green-500 rounded-full"></span>
                            <span class="text-sm font-semibold text-green-600">Stok Tersedia</span>
                        <?php else : ?>
                            <span class="size-2.5 bg-red-500 rounded-full"></span>
                            <span class="text-sm font-semibold text-red-500">Stok Habis</span>
                        <?php endif; ?>
                    </div>

                    <!-- Add to Cart -->
                    <div class="flex flex-col sm:flex-row gap-3">
                        <?php if ( $product->is_in_stock() ) : ?>
                            <?php woocommerce_template_single_add_to_cart(); ?>
                        <?php endif; ?>
                        <a href="https://wa.me/62816532727?text=<?php echo rawurlencode( 'Halo, saya tertarik dengan produk: ' . get_the_title() . ' (' . get_permalink() . ')' ); ?>"
                           target="_blank" rel="noopener"
                           class="inline-flex items-center justify-center gap-2 bg-green-600 text-white px-6 py-3 rounded-md font-bold hover:bg-green-700 transition-all">
                            <span class="material-symbols-outlined">chat</span>
                            Tanya via WhatsApp
                        </a>
                    </div>

                    <!-- Key Features -->
                    <div class="grid grid-cols-2 gap-3 pt-4 border-t border-slate-200 dark:border-slate-700">
                        <div class="flex items-center gap-3">
                            <div class="size-9 rounded-md bg-primary/10 flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined text-lg">verified</span>
                            </div>
                            <div>
                                <p class="text-xs font-bold">Garansi Resmi</p>
                                <p class="text-xs text-slate-400">Produk original</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="size-9 rounded-md bg-primary/10 flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined text-lg">engineering</span>
                            </div>
                            <div>
                                <p class="text-xs font-bold">Teknisi Profesional</p>
                                <p class="text-xs text-slate-400">Instalasi & support</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="size-9 rounded-md bg-primary/10 flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined text-lg">local_shipping</span>
                            </div>
                            <div>
                                <p class="text-xs font-bold">Pengiriman</p>
                                <p class="text-xs text-slate-400">Seluruh Indonesia</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="size-9 rounded-md bg-primary/10 flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined text-lg">support_agent</span>
                            </div>
                            <div>
                                <p class="text-xs font-bold">Support 24/7</p>
                                <p class="text-xs text-slate-400">Bantuan teknis</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Tabs: Description, Specs, Reviews -->
    <section class="py-12 lg:py-16 bg-white dark:bg-slate-900/50 border-t border-slate-200 dark:border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <?php
            // Tab navigation
            $tabs = array();
            if ( $product->get_description() ) {
                $tabs['description'] = 'Deskripsi';
            }
            $attributes = $product->get_attributes();
            if ( ! empty( $attributes ) ) {
                $tabs['specifications'] = 'Spesifikasi';
            }
            if ( comments_open() || get_comments_number() > 0 ) {
                $tabs['reviews'] = 'Ulasan (' . $product->get_review_count() . ')';
            }
            ?>

            <?php if ( ! empty( $tabs ) ) : ?>
                <!-- Tab Headers -->
                <div class="flex border-b border-slate-200 dark:border-slate-700 mb-8 overflow-x-auto">
                    <?php $first = true; foreach ( $tabs as $tab_key => $tab_label ) : ?>
                        <button class="product-tab-btn px-6 py-3 text-sm font-bold whitespace-nowrap border-b-2 transition-colors
                                       <?php echo $first ? 'border-primary text-primary' : 'border-transparent text-slate-500 hover:text-slate-900'; ?>"
                                data-tab="<?php echo esc_attr( $tab_key ); ?>">
                            <?php echo esc_html( $tab_label ); ?>
                        </button>
                    <?php $first = false; endforeach; ?>
                </div>

                <!-- Tab Content -->
                <?php if ( isset( $tabs['description'] ) ) : ?>
                <div id="tab-description" class="product-tab-content">
                    <div class="prose prose-slate dark:prose-invert max-w-none text-slate-600 dark:text-slate-400 leading-relaxed">
                        <?php the_content(); ?>
                    </div>
                </div>
                <?php endif; ?>

                <?php if ( isset( $tabs['specifications'] ) ) : ?>
                <div id="tab-specifications" class="product-tab-content hidden">
                    <div class="bg-slate-50 dark:bg-slate-800 rounded-lg overflow-hidden">
                        <table class="w-full">
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ( $attributes as $attribute ) :
                                    $attr_name = wc_attribute_label( $attribute->get_name() );
                                    $attr_values = $attribute->is_taxonomy()
                                        ? implode( ', ', wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'names' ) ) )
                                        : implode( ', ', $attribute->get_options() );
                                ?>
                                <tr class="<?php echo $i % 2 === 0 ? 'bg-white dark:bg-slate-800' : 'bg-slate-50 dark:bg-slate-700/50'; ?>">
                                    <td class="px-6 py-4 text-sm font-bold text-slate-900 dark:text-white w-1/3"><?php echo esc_html( $attr_name ); ?></td>
                                    <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400"><?php echo esc_html( $attr_values ); ?></td>
                                </tr>
                                <?php $i++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php endif; ?>

                <?php if ( isset( $tabs['reviews'] ) ) : ?>
                <div id="tab-reviews" class="product-tab-content hidden">
                    <?php comments_template(); ?>
                </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>

    <!-- Related Products -->
    <?php
    $related_ids = wc_get_related_products( $product->get_id(), 4 );
    if ( ! empty( $related_ids ) ) :
    ?>
    <section class="py-12 lg:py-16 bg-background-light dark:bg-background-dark">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-black mb-8">Produk Terkait</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 lg:gap-6">
                <?php
                foreach ( $related_ids as $related_id ) :
                    $related = wc_get_product( $related_id );
                    if ( ! $related ) continue;
                    $rel_cats = get_the_terms( $related_id, 'product_cat' );
                ?>
                <div class="group bg-white dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700 overflow-hidden hover:shadow-lg hover:border-primary/30 transition-all duration-300">
                    <a href="<?php echo esc_url( get_permalink( $related_id ) ); ?>" class="block aspect-square bg-slate-100 dark:bg-slate-700 overflow-hidden">
                        <?php if ( has_post_thumbnail( $related_id ) ) : ?>
                            <?php echo get_the_post_thumbnail( $related_id, 'woocommerce_thumbnail', array(
                                'class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-500',
                            ) ); ?>
                        <?php else : ?>
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="material-symbols-outlined text-5xl text-slate-300">image</span>
                            </div>
                        <?php endif; ?>
                    </a>
                    <div class="p-4">
                        <?php if ( ! empty( $rel_cats ) && ! is_wp_error( $rel_cats ) ) : ?>
                            <p class="text-xs font-bold text-primary uppercase mb-1"><?php echo esc_html( $rel_cats[0]->name ); ?></p>
                        <?php endif; ?>
                        <h3 class="font-bold text-sm mb-2 leading-snug">
                            <a href="<?php echo esc_url( get_permalink( $related_id ) ); ?>" class="hover:text-primary transition-colors">
                                <?php echo esc_html( $related->get_name() ); ?>
                            </a>
                        </h3>
                        <div class="text-lg font-black text-slate-900 dark:text-white">
                            <?php echo wp_kses_post( $related->get_price_html() ); ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- CTA: Consultation -->
    <section class="py-12 lg:py-16 bg-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-black mb-3">Butuh Konsultasi?</h2>
            <p class="text-slate-400 mb-8 max-w-lg mx-auto">Tim ahli kami siap membantu Anda memilih sistem keamanan yang tepat sesuai kebutuhan.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="https://wa.me/62816532727" target="_blank" rel="noopener"
                   class="inline-flex items-center gap-2 bg-green-600 text-white px-6 py-3 rounded-md font-bold hover:bg-green-700 transition-all">
                    <span class="material-symbols-outlined">chat</span> WhatsApp Kami
                </a>
                <a href="tel:+62315914700"
                   class="inline-flex items-center gap-2 bg-white/10 text-white px-6 py-3 rounded-md font-bold hover:bg-white/20 transition-all">
                    <span class="material-symbols-outlined">call</span> (031) 591-4700
                </a>
            </div>
        </div>
    </section>
</main>

<!-- Tab Switcher Script -->
<script>
document.querySelectorAll('.product-tab-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
        // Reset all tabs
        document.querySelectorAll('.product-tab-btn').forEach(function(b) {
            b.classList.remove('border-primary', 'text-primary');
            b.classList.add('border-transparent', 'text-slate-500');
        });
        document.querySelectorAll('.product-tab-content').forEach(function(c) {
            c.classList.add('hidden');
        });
        // Activate clicked tab
        btn.classList.remove('border-transparent', 'text-slate-500');
        btn.classList.add('border-primary', 'text-primary');
        var tabId = 'tab-' + btn.getAttribute('data-tab');
        var tabContent = document.getElementById(tabId);
        if (tabContent) tabContent.classList.remove('hidden');
    });
});
</script>

<?php
endwhile;

get_footer();
