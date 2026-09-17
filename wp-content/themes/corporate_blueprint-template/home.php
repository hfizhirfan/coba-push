<?php
/**
 * Blog Archive (News) Template
 *
 * This is the blog posts index page, used when a static front page is set.
 *
 * @package MBSCCTV
 */

get_header();

// Get all post categories for filter
$post_categories = get_categories( array(
    'hide_empty' => true,
    'orderby'    => 'name',
) );

$current_cat = isset( $_GET['cat'] ) ? absint( $_GET['cat'] ) : 0;
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
            <span class="text-white font-semibold">Berita</span>
        </nav>
        <h1 class="text-3xl lg:text-4xl font-black text-white mb-3">Berita & Informasi</h1>
        <p class="text-slate-300 max-w-2xl leading-relaxed">Artikel terbaru seputar teknologi keamanan, tips, panduan, dan update dari MBS CCTV.</p>

        <!-- Category Filter -->
        <?php if ( ! empty( $post_categories ) ) : ?>
        <div class="mt-8 flex flex-wrap gap-2">
            <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"
               class="inline-flex items-center gap-1 px-4 py-2 rounded-md text-sm font-semibold transition-all
                      <?php echo ! $current_cat ? 'bg-primary text-white' : 'bg-white/10 text-slate-300 hover:bg-white/20 hover:text-white'; ?>">
                <span class="material-symbols-outlined text-lg">grid_view</span>
                Semua
            </a>
            <?php foreach ( $post_categories as $cat ) : ?>
                <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"
                   class="inline-flex items-center gap-1 px-4 py-2 rounded-md text-sm font-semibold transition-all bg-white/10 text-slate-300 hover:bg-white/20 hover:text-white">
                    <?php echo esc_html( $cat->name ); ?>
                    <span class="text-xs opacity-60">(<?php echo esc_html( $cat->count ); ?>)</span>
                </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Blog Grid -->
<section class="py-12 lg:py-16 bg-background-light dark:bg-background-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <?php if ( have_posts() ) : ?>

            <!-- Result count -->
            <p class="text-sm text-slate-500 mb-8"><?php
                global $wp_query;
                $total = $wp_query->found_posts;
                echo esc_html( $total ) . ' artikel ditemukan';
            ?></p>

            <!-- Featured Post (first post) -->
            <?php if ( ! is_paged() ) : ?>
                <?php the_post(); ?>
                <article class="mb-12 bg-white dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700 overflow-hidden hover:shadow-lg transition-all duration-300">
                    <div class="grid lg:grid-cols-2">
                        <a href="<?php the_permalink(); ?>" class="block aspect-video lg:aspect-auto bg-slate-200 dark:bg-slate-700 overflow-hidden">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-full object-cover hover:scale-105 transition-transform duration-500' ) ); ?>
                            <?php endif; ?>
                        </a>
                        <div class="p-6 lg:p-10 flex flex-col justify-center">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="text-xs font-bold text-primary"><?php echo esc_html( strtoupper( get_the_date( 'd M Y' ) ) ); ?></span>
                                <?php $cats = get_the_category(); if ( ! empty( $cats ) ) : ?>
                                    <span class="bg-primary/10 text-primary text-xs font-bold px-2 py-0.5 rounded"><?php echo esc_html( strtoupper( $cats[0]->name ) ); ?></span>
                                <?php endif; ?>
                            </div>
                            <h2 class="text-xl lg:text-2xl font-black mb-3 leading-tight">
                                <a href="<?php the_permalink(); ?>" class="hover:text-primary transition-colors"><?php the_title(); ?></a>
                            </h2>
                            <p class="text-slate-500 text-sm leading-relaxed mb-4 line-clamp-3"><?php echo esc_html( get_the_excerpt() ); ?></p>
                            <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-1 text-sm font-bold text-primary hover:gap-2 transition-all">
                                Baca Selengkapnya <span class="material-symbols-outlined text-lg">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </article>
            <?php endif; ?>

            <!-- Post Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article class="group bg-white dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700 overflow-hidden hover:shadow-lg hover:border-primary/30 transition-all duration-300">
                        <a href="<?php the_permalink(); ?>" class="block aspect-video bg-slate-200 dark:bg-slate-700 overflow-hidden">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-500' ) ); ?>
                            <?php else : ?>
                                <div class="w-full h-full flex items-center justify-center">
                                    <span class="material-symbols-outlined text-5xl text-slate-300">article</span>
                                </div>
                            <?php endif; ?>
                        </a>
                        <div class="p-5">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="text-xs font-bold text-primary"><?php echo esc_html( strtoupper( get_the_date( 'd M Y' ) ) ); ?></span>
                                <?php $cats = get_the_category(); if ( ! empty( $cats ) ) : ?>
                                    <span class="bg-primary/10 text-primary text-xs font-bold px-2 py-0.5 rounded"><?php echo esc_html( strtoupper( $cats[0]->name ) ); ?></span>
                                <?php endif; ?>
                            </div>
                            <h3 class="font-bold text-base mb-2 leading-snug">
                                <a href="<?php the_permalink(); ?>" class="hover:text-primary transition-colors line-clamp-2"><?php the_title(); ?></a>
                            </h3>
                            <p class="text-slate-500 text-sm line-clamp-2 mb-4"><?php echo esc_html( get_the_excerpt() ); ?></p>
                            <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-1 text-sm font-bold text-primary hover:gap-2 transition-all">
                                Baca <span class="material-symbols-outlined text-lg">arrow_forward</span>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                <?php
                the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => '<span class="material-symbols-outlined">chevron_left</span>',
                    'next_text' => '<span class="material-symbols-outlined">chevron_right</span>',
                    'class'     => 'woocommerce-pagination',
                ) );
                ?>
            </div>

        <?php else : ?>
            <div class="text-center py-20">
                <span class="material-symbols-outlined text-6xl text-slate-300 mb-4">article</span>
                <h3 class="text-xl font-bold mb-2">Belum Ada Artikel</h3>
                <p class="text-slate-500 mb-6">Belum ada artikel yang dipublikasikan. Kembali lagi nanti!</p>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                   class="inline-flex items-center gap-2 bg-primary text-white px-6 py-3 rounded-md font-bold hover:bg-primary/90 transition-all">
                    <span class="material-symbols-outlined">arrow_back</span> Kembali ke Beranda
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
