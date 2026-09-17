<?php
/**
 * WooCommerce Brand Archive Page
 *
 * Template for displaying products by brand (product_brand taxonomy).
 *
 * @package MBSCCTV
 */

defined( 'ABSPATH' ) || exit;

get_header();

// Get current brand info
$current_brand = get_queried_object();
$brand_desc    = $current_brand->description;
$product_count = $current_brand->count;

// Brand thumbnail/logo
$brand_thumb_id  = get_term_meta( $current_brand->term_id, 'thumbnail_id', true );
$brand_thumb_url = $brand_thumb_id ? wp_get_attachment_url( $brand_thumb_id ) : '';
?>

<!-- Brand Hero Banner -->
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
            <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="hover:text-white transition-colors">Produk</a>
            <span class="material-symbols-outlined text-xs align-middle mx-1">chevron_right</span>
            <span class="text-white font-semibold"><?php echo esc_html( $current_brand->name ); ?></span>
        </nav>

        <div class="flex items-start gap-6">
            <!-- Brand Logo -->
            <?php if ( $brand_thumb_url ) : ?>
                <div class="hidden sm:flex size-20 bg-white rounded-lg items-center justify-center flex-shrink-0 p-2">
                    <img src="<?php echo esc_url( $brand_thumb_url ); ?>"
                         alt="<?php echo esc_attr( $current_brand->name ); ?>"
                         class="max-w-full max-h-full object-contain" />
                </div>
            <?php else : ?>
                <div class="hidden sm:flex size-20 bg-primary/20 rounded-lg items-center justify-center flex-shrink-0">
                    <span class="material-symbols-outlined text-4xl text-primary">verified</span>
                </div>
            <?php endif; ?>

            <div>
                <h1 class="text-3xl lg:text-4xl font-black text-white mb-3">
                    <?php echo esc_html( $current_brand->name ); ?>
                </h1>
                <?php if ( $brand_desc ) : ?>
                    <p class="text-slate-300 max-w-2xl leading-relaxed"><?php echo esc_html( $brand_desc ); ?></p>
                <?php else : ?>
                    <p class="text-slate-300 max-w-2xl leading-relaxed">Temukan berbagai produk <?php echo esc_html( $current_brand->name ); ?> berkualitas tinggi dengan garansi resmi.</p>
                <?php endif; ?>
                <?php if ( $product_count > 0 ) : ?>
                    <p class="mt-3 text-sm text-slate-400"><?php echo esc_html( $product_count ); ?> produk ditemukan</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Sibling Brands Navigation -->
        <?php
        $all_brands = get_terms( array(
            'taxonomy'   => 'product_brand',
            'parent'     => 0,
            'hide_empty' => false,
        ) );
        if ( ! empty( $all_brands ) && ! is_wp_error( $all_brands ) ) :
        ?>
        <div class="mt-8 flex flex-wrap gap-2">
            <?php foreach ( $all_brands as $brand ) :
                $is_active      = ( $current_brand->term_id === $brand->term_id );
                $brand_logo_id  = get_term_meta( $brand->term_id, 'thumbnail_id', true );
                $brand_logo_url = $brand_logo_id ? wp_get_attachment_url( $brand_logo_id ) : '';
            ?>
                <a href="<?php echo esc_url( get_term_link( $brand ) ); ?>"
                   class="inline-flex items-center gap-2 px-4 py-2 rounded-md text-sm font-semibold transition-all
                          <?php echo $is_active
                              ? 'bg-primary text-white'
                              : 'bg-white/10 text-slate-300 hover:bg-white/20 hover:text-white'; ?>">
                    <?php if ( $brand_logo_url ) : ?>
                        <img src="<?php echo esc_url( $brand_logo_url ); ?>"
                             alt="<?php echo esc_attr( $brand->name ); ?>"
                             class="h-4 w-auto <?php echo $is_active ? 'brightness-0 invert' : 'brightness-0 invert opacity-70'; ?>" />
                    <?php else : ?>
                        <span class="material-symbols-outlined text-lg">verified</span>
                    <?php endif; ?>
                    <?php echo esc_html( $brand->name ); ?>
                </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Product Grid -->
<section class="py-12 lg:py-16 bg-background-light dark:bg-background-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

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
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 lg:gap-6">
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
                <p class="text-slate-500 mb-6">Brand ini belum memiliki produk. Silakan cek brand lainnya.</p>
                <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>"
                   class="inline-flex items-center gap-2 bg-primary text-white px-6 py-3 rounded-md font-bold hover:bg-primary/90 transition-all">
                    <span class="material-symbols-outlined">arrow_back</span> Lihat Semua Produk
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
// FAQ Section (Native term_meta — no ACF needed)
$faq_items = mbscctv_get_faq_items( $current_brand );
if ( ! empty( $faq_items ) ) :
?>
<!-- FAQ Section -->
<section class="py-16 lg:py-20 bg-white dark:bg-slate-900/50 border-t border-slate-200 dark:border-slate-800">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-2xl lg:text-3xl font-black mb-3">Pertanyaan Umum</h2>
            <p class="text-slate-500">Pertanyaan yang sering diajukan seputar <?php echo esc_html( $current_brand->name ); ?>.</p>
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

        // Close all others
        document.querySelectorAll('.faq-item').forEach(function(other) {
            if (other !== item) {
                other.querySelector('.faq-answer').classList.add('hidden');
                other.querySelector('.faq-toggle').setAttribute('aria-expanded', 'false');
                other.querySelector('.faq-icon').style.transform = 'rotate(0deg)';
            }
        });

        // Toggle current
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
<?php endif; ?>

<?php
get_footer();
