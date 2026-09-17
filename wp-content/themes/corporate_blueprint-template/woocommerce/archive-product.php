<?php
/**
 * WooCommerce Product Archive / Shop / Category Page
 *
 * Handles: /shop (all products with filters), /product-category/* (category pages)
 *
 * @package MBSCCTV
 */

defined( 'ABSPATH' ) || exit;

get_header();

// Get current category info
$current_cat   = get_queried_object();
$is_category   = is_product_category();
$is_shop       = is_shop();
$cat_icon      = $is_category ? mbscctv_get_category_icon( $current_cat->slug ) : 'storefront';
$cat_desc      = $is_category ? $current_cat->description : '';
$product_count = $is_category ? $current_cat->count : 0;

// Get all categories and brands for shop filter
$all_categories = get_terms( array(
    'taxonomy'   => 'product_cat',
    'parent'     => 0,
    'hide_empty' => false,
) );

$all_brands = get_terms( array(
    'taxonomy'   => 'product_brand',
    'parent'     => 0,
    'hide_empty' => false,
) );
?>

<!-- Hero Banner -->
<section class="relative py-14 lg:py-20 overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://mbs.growandbless.com/wp-content/uploads/2026/03/1987.jpg" alt="" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-slate-900/85"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="mb-6 text-sm text-slate-400">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-white transition-colors">Beranda</a>
            <span class="material-symbols-outlined text-xs align-middle mx-1">chevron_right</span>
            <?php if ( $is_category ) : ?>
                <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="hover:text-white transition-colors">Produk</a>
                <span class="material-symbols-outlined text-xs align-middle mx-1">chevron_right</span>
                <span class="text-white font-semibold"><?php echo esc_html( $current_cat->name ); ?></span>
            <?php else : ?>
                <span class="text-white font-semibold">Produk</span>
            <?php endif; ?>
        </nav>

        <div class="flex items-start gap-6">
            <?php if ( $is_category ) : ?>
                <div class="hidden sm:flex size-16 bg-primary/20 rounded-lg items-center justify-center flex-shrink-0">
                    <span class="material-symbols-outlined text-4xl text-primary"><?php echo esc_html( $cat_icon ); ?></span>
                </div>
            <?php endif; ?>
            <div>
                <h1 class="text-3xl lg:text-4xl font-black text-white mb-3">
                    <?php
                    if ( $is_category ) {
                        echo esc_html( $current_cat->name );
                    } else {
                        echo 'Semua Produk';
                    }
                    ?>
                </h1>
                <?php if ( $cat_desc ) : ?>
                    <p class="text-slate-300 max-w-2xl leading-relaxed"><?php echo esc_html( $cat_desc ); ?></p>
                <?php elseif ( $is_category ) : ?>
                    <p class="text-slate-300 max-w-2xl leading-relaxed">Temukan berbagai produk <?php echo esc_html( strtolower( $current_cat->name ) ); ?> berkualitas tinggi dari brand terkemuka.</p>
                <?php elseif ( $is_shop ) : ?>
                    <p class="text-slate-300 max-w-2xl leading-relaxed">Temukan seluruh produk sistem keamanan berkualitas dari brand-brand terkemuka dunia.</p>
                <?php endif; ?>
                <?php if ( $product_count > 0 ) : ?>
                    <p class="mt-3 text-sm text-slate-400"><?php echo esc_html( $product_count ); ?> produk ditemukan</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Category Navigation (on category pages) -->
        <?php if ( $is_category ) : ?>
            <?php if ( ! empty( $all_categories ) && ! is_wp_error( $all_categories ) ) : ?>
            <div class="mt-8 flex flex-wrap gap-2">
                <?php foreach ( $all_categories as $sib_cat ) :
                    $is_active = ( $current_cat->term_id === $sib_cat->term_id );
                    $sib_icon  = mbscctv_get_category_icon( $sib_cat->slug );
                ?>
                    <a href="<?php echo esc_url( get_term_link( $sib_cat ) ); ?>"
                       class="inline-flex items-center gap-2 px-4 py-2 rounded-md text-sm font-semibold transition-all
                              <?php echo $is_active
                                  ? 'bg-primary text-white'
                                  : 'bg-white/10 text-slate-300 hover:bg-white/20 hover:text-white'; ?>">
                        <span class="material-symbols-outlined text-lg"><?php echo esc_html( $sib_icon ); ?></span>
                        <?php echo esc_html( $sib_cat->name ); ?>
                    </a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        <?php endif; ?>

        <!-- Quick Filters on Shop page -->
        <?php if ( $is_shop ) : ?>
            <div class="mt-8 flex flex-wrap gap-2">
                <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>"
                   class="inline-flex items-center gap-2 px-4 py-2 rounded-md text-sm font-semibold transition-all bg-primary text-white">
                    <span class="material-symbols-outlined text-lg">grid_view</span>
                    Semua
                </a>
                <?php if ( ! empty( $all_categories ) && ! is_wp_error( $all_categories ) ) :
                    foreach ( $all_categories as $cat ) :
                        $sib_icon = mbscctv_get_category_icon( $cat->slug );
                ?>
                    <a href="<?php echo esc_url( get_term_link( $cat ) ); ?>"
                       class="inline-flex items-center gap-2 px-4 py-2 rounded-md text-sm font-semibold transition-all bg-white/10 text-slate-300 hover:bg-white/20 hover:text-white">
                        <span class="material-symbols-outlined text-lg"><?php echo esc_html( $sib_icon ); ?></span>
                        <?php echo esc_html( $cat->name ); ?>
                    </a>
                <?php endforeach; endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Product Grid with Sidebar Filters -->
<section class="py-12 lg:py-16 bg-background-light dark:bg-background-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <?php if ( $is_shop ) : ?>
        <!-- Shop page: sidebar + grid layout -->
        <div class="lg:flex lg:gap-8">
            <!-- Sidebar Filters (Desktop) -->
            <aside class="hidden lg:block w-64 flex-shrink-0">
                <div class="sticky top-24 space-y-6">

                    <!-- Categories Filter -->
                    <div class="bg-white dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700 p-5">
                        <h3 class="font-bold text-sm mb-4 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary text-lg">category</span>
                            Kategori
                        </h3>
                        <ul class="space-y-2">
                            <?php if ( ! empty( $all_categories ) && ! is_wp_error( $all_categories ) ) :
                                foreach ( $all_categories as $cat ) : ?>
                                <li>
                                    <a href="<?php echo esc_url( get_term_link( $cat ) ); ?>"
                                       class="flex items-center justify-between text-sm py-1.5 hover:text-primary transition-colors">
                                        <span class="flex items-center gap-2">
                                            <span class="material-symbols-outlined text-base text-slate-400"><?php echo esc_html( mbscctv_get_category_icon( $cat->slug ) ); ?></span>
                                            <?php echo esc_html( $cat->name ); ?>
                                        </span>
                                        <span class="text-xs text-slate-400 bg-slate-100 dark:bg-slate-700 px-2 py-0.5 rounded"><?php echo esc_html( $cat->count ); ?></span>
                                    </a>
                                </li>
                            <?php endforeach; endif; ?>
                        </ul>
                    </div>

                    <!-- Brands Filter -->
                    <?php if ( ! empty( $all_brands ) && ! is_wp_error( $all_brands ) ) : ?>
                    <div class="bg-white dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700 p-5">
                        <h3 class="font-bold text-sm mb-4 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary text-lg">verified</span>
                            Brand
                        </h3>
                        <ul class="space-y-2">
                            <?php foreach ( $all_brands as $brand ) :
                                $brand_thumb_id  = get_term_meta( $brand->term_id, 'thumbnail_id', true );
                                $brand_thumb_url = $brand_thumb_id ? wp_get_attachment_url( $brand_thumb_id ) : '';
                            ?>
                                <li>
                                    <a href="<?php echo esc_url( get_term_link( $brand ) ); ?>"
                                       class="flex items-center justify-between text-sm py-1.5 hover:text-primary transition-colors">
                                        <span class="flex items-center gap-2">
                                            <?php if ( $brand_thumb_url ) : ?>
                                                <img src="<?php echo esc_url( $brand_thumb_url ); ?>" alt="" class="h-4 w-auto grayscale">
                                            <?php else : ?>
                                                <span class="material-symbols-outlined text-base text-slate-400">verified</span>
                                            <?php endif; ?>
                                            <?php echo esc_html( $brand->name ); ?>
                                        </span>
                                        <span class="text-xs text-slate-400 bg-slate-100 dark:bg-slate-700 px-2 py-0.5 rounded"><?php echo esc_html( $brand->count ); ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                </div>
            </aside>

            <!-- Mobile Filter Toggle -->
            <div class="lg:hidden mb-6">
                <button id="mbscctv-mobile-filter-toggle"
                        class="inline-flex items-center gap-2 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-md px-4 py-2.5 text-sm font-bold hover:border-primary transition-colors">
                    <span class="material-symbols-outlined text-lg">tune</span>
                    Filter
                </button>
            </div>

            <!-- Mobile Filter Panel -->
            <div id="mbscctv-mobile-filter-panel" class="hidden lg:hidden mb-6 bg-white dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700 p-5">
                <div class="grid grid-cols-2 gap-6">
                    <!-- Categories -->
                    <div>
                        <h3 class="font-bold text-sm mb-3 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary text-sm">category</span>
                            Kategori
                        </h3>
                        <ul class="space-y-1">
                            <?php if ( ! empty( $all_categories ) && ! is_wp_error( $all_categories ) ) :
                                foreach ( $all_categories as $cat ) : ?>
                                <li><a href="<?php echo esc_url( get_term_link( $cat ) ); ?>" class="text-sm hover:text-primary transition-colors"><?php echo esc_html( $cat->name ); ?> (<?php echo esc_html( $cat->count ); ?>)</a></li>
                            <?php endforeach; endif; ?>
                        </ul>
                    </div>
                    <!-- Brands -->
                    <?php if ( ! empty( $all_brands ) && ! is_wp_error( $all_brands ) ) : ?>
                    <div>
                        <h3 class="font-bold text-sm mb-3 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary text-sm">verified</span>
                            Brand
                        </h3>
                        <ul class="space-y-1">
                            <?php foreach ( $all_brands as $brand ) : ?>
                                <li><a href="<?php echo esc_url( get_term_link( $brand ) ); ?>" class="text-sm hover:text-primary transition-colors"><?php echo esc_html( $brand->name ); ?> (<?php echo esc_html( $brand->count ); ?>)</a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <script>
            (function(){
                var btn = document.getElementById('mbscctv-mobile-filter-toggle');
                var panel = document.getElementById('mbscctv-mobile-filter-panel');
                if (btn && panel) {
                    btn.addEventListener('click', function() {
                        panel.classList.toggle('hidden');
                    });
                }
            })();
            </script>

            <!-- Main Content -->
            <div class="flex-1 min-w-0">
        <?php endif; ?>

                <!-- Toolbar: count + sorting -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-8 gap-4">
                    <p class="text-sm text-slate-500">
                        <?php woocommerce_result_count(); ?>
                    </p>
                    <div class="flex items-center gap-3">
                        <?php woocommerce_catalog_ordering(); ?>
                    </div>
                </div>

                <?php if ( woocommerce_product_loop() ) : ?>
                    <div class="grid grid-cols-2 <?php echo $is_shop ? 'lg:grid-cols-3' : 'md:grid-cols-3 lg:grid-cols-4'; ?> gap-4 lg:gap-6">
                        <?php
                        while ( have_posts() ) :
                            the_post();
                            global $product;
                            ?>
                            <div class="group bg-white dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700 overflow-hidden hover:shadow-lg hover:border-primary/30 transition-all duration-300">
                                <!-- Product Image -->
                                <a href="<?php the_permalink(); ?>" class="block aspect-square bg-slate-100 dark:bg-slate-700 overflow-hidden relative">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <?php the_post_thumbnail( 'woocommerce_thumbnail', array(
                                            'class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-500',
                                        ) ); ?>
                                    <?php else : ?>
                                        <div class="w-full h-full flex items-center justify-center">
                                            <span class="material-symbols-outlined text-5xl text-slate-300">image</span>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ( $product->is_on_sale() ) : ?>
                                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-bold px-2 py-1 rounded-md">Sale</span>
                                    <?php endif; ?>
                                </a>

                                <!-- Product Info -->
                                <div class="p-4 lg:p-5">
                                    <!-- Category label -->
                                    <?php
                                    $product_cats = get_the_terms( get_the_ID(), 'product_cat' );
                                    if ( ! empty( $product_cats ) && ! is_wp_error( $product_cats ) ) :
                                    ?>
                                        <p class="text-xs font-bold text-primary uppercase mb-1"><?php echo esc_html( $product_cats[0]->name ); ?></p>
                                    <?php endif; ?>

                                    <!-- Title -->
                                    <h3 class="font-bold text-sm lg:text-base mb-2 leading-snug">
                                        <a href="<?php the_permalink(); ?>" class="hover:text-primary transition-colors">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>

                                    <!-- Price -->
                                    <div class="text-lg font-black text-slate-900 dark:text-white">
                                        <?php woocommerce_template_loop_price(); ?>
                                    </div>

                                    <!-- Detail Button -->
                                    <div class="mt-4 flex gap-2">
                                        <a href="<?php the_permalink(); ?>"
                                           class="flex-1 bg-primary text-white text-center text-sm font-bold py-2.5 rounded-md hover:bg-primary/90 transition-all">
                                            Lihat Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-12 flex justify-center">
                        <?php woocommerce_pagination(); ?>
                    </div>

                <?php else : ?>
                    <div class="text-center py-20">
                        <span class="material-symbols-outlined text-6xl text-slate-300 mb-4">inventory_2</span>
                        <h3 class="text-xl font-bold mb-2">Belum Ada Produk</h3>
                        <p class="text-slate-500 mb-6">
                            <?php echo $is_category ? 'Kategori ini belum memiliki produk. Silakan cek kategori lainnya.' : 'Belum ada produk yang tersedia.'; ?>
                        </p>
                        <?php if ( $is_category ) : ?>
                        <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>"
                           class="inline-flex items-center gap-2 bg-primary text-white px-6 py-3 rounded-md font-bold hover:bg-primary/90 transition-all">
                            <span class="material-symbols-outlined">arrow_back</span> Lihat Semua Produk
                        </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

        <?php if ( $is_shop ) : ?>
            </div>
        </div>
        <?php endif; ?>

    </div>
</section>

<?php
// FAQ Section (Native term_meta — no ACF needed)
if ( $is_category ) :
    $faq_items = mbscctv_get_faq_items( $current_cat );
    if ( ! empty( $faq_items ) ) :
?>
<!-- FAQ Section -->
<section class="py-16 lg:py-20 bg-white dark:bg-slate-900/50 border-t border-slate-200 dark:border-slate-800">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-2xl lg:text-3xl font-black mb-3">Pertanyaan Umum</h2>
            <p class="text-slate-500">Pertanyaan yang sering diajukan seputar <?php echo esc_html( $current_cat->name ); ?>.</p>
        </div>

        <div class="space-y-3">
            <?php foreach ( $faq_items as $index => $faq ) : ?>
            <div class="faq-item bg-background-light dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700 overflow-hidden">
                <button class="faq-toggle w-full flex items-center justify-between p-5 lg:p-6 text-left gap-4 hover:bg-slate-100 dark:hover:bg-slate-700/50 transition-colors"
                        aria-expanded="false"
                        aria-controls="faq-answer-<?php echo esc_attr( $index ); ?>">
                    <span class="font-bold text-sm lg:text-base leading-snug"><?php echo esc_html( $faq['question'] ); ?></span>
                    <span class="material-symbols-outlined text-xl text-slate-400 flex-shrink-0 faq-icon transition-transform duration-300">expand_more</span>
                </button>
                <div id="faq-answer-<?php echo esc_attr( $index ); ?>"
                     class="faq-answer hidden px-5 lg:px-6 pb-5 lg:pb-6">
                    <div class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed prose prose-sm max-w-none">
                        <?php echo wp_kses_post( $faq['answer'] ); ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FAQ Accordion Script -->
<script>
document.querySelectorAll('.faq-toggle').forEach(function(btn) {
    btn.addEventListener('click', function() {
        var item = btn.closest('.faq-item');
        var answer = item.querySelector('.faq-answer');
        var icon = btn.querySelector('.faq-icon');
        var isOpen = !answer.classList.contains('hidden');

        document.querySelectorAll('.faq-item').forEach(function(other) {
            if (other !== item) {
                other.querySelector('.faq-answer').classList.add('hidden');
                other.querySelector('.faq-toggle').setAttribute('aria-expanded', 'false');
                other.querySelector('.faq-icon').style.transform = 'rotate(0deg)';
            }
        });

        if (isOpen) {
            answer.classList.add('hidden');
            btn.setAttribute('aria-expanded', 'false');
            icon.style.transform = 'rotate(0deg)';
        } else {
            answer.classList.remove('hidden');
            btn.setAttribute('aria-expanded', 'true');
            icon.style.transform = 'rotate(180deg)';
        }
    });
});
</script>
<?php
    endif;
endif;
?>

<?php
get_footer();
