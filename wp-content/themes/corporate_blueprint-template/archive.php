<?php
/**
 * Archive Template (Blog Category, Tag, Author, Date archives)
 *
 * @package MBSCCTV
 */

get_header();
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
            <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>" class="hover:text-white transition-colors">Berita</a>
            <span class="material-symbols-outlined text-xs align-middle mx-1">chevron_right</span>
            <span class="text-white font-semibold"><?php the_archive_title( '', '' ); ?></span>
        </nav>
        <h1 class="text-3xl lg:text-4xl font-black text-white mb-3"><?php the_archive_title(); ?></h1>
        <?php the_archive_description( '<p class="text-slate-300 max-w-2xl leading-relaxed">', '</p>' ); ?>

        <!-- Category Tabs -->
        <?php if ( is_category() ) :
            $all_cats = get_categories( array( 'hide_empty' => true ) );
            $current  = get_queried_object();
            if ( ! empty( $all_cats ) ) :
        ?>
        <div class="mt-8 flex flex-wrap gap-2">
            <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"
               class="inline-flex items-center gap-1 px-4 py-2 rounded-md text-sm font-semibold transition-all bg-white/10 text-slate-300 hover:bg-white/20 hover:text-white">
                Semua
            </a>
            <?php foreach ( $all_cats as $cat ) :
                $is_active = ( $current->term_id === $cat->term_id );
            ?>
                <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"
                   class="inline-flex items-center gap-1 px-4 py-2 rounded-md text-sm font-semibold transition-all
                          <?php echo $is_active ? 'bg-primary text-white' : 'bg-white/10 text-slate-300 hover:bg-white/20 hover:text-white'; ?>">
                    <?php echo esc_html( $cat->name ); ?>
                </a>
            <?php endforeach; ?>
        </div>
        <?php endif; endif; ?>
    </div>
</section>

<!-- Posts Grid -->
<section class="py-12 lg:py-16 bg-background-light dark:bg-background-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <?php if ( have_posts() ) : ?>

            <p class="text-sm text-slate-500 mb-8"><?php
                global $wp_query;
                echo esc_html( $wp_query->found_posts ) . ' artikel ditemukan';
            ?></p>

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

            <div class="mt-12 flex justify-center">
                <?php
                the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => '<span class="material-symbols-outlined">chevron_left</span>',
                    'next_text' => '<span class="material-symbols-outlined">chevron_right</span>',
                ) );
                ?>
            </div>

        <?php else : ?>
            <div class="text-center py-20">
                <span class="material-symbols-outlined text-6xl text-slate-300 mb-4">article</span>
                <h3 class="text-xl font-bold mb-2">Belum Ada Artikel</h3>
                <p class="text-slate-500 mb-6">Belum ada artikel dalam kategori ini.</p>
                <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"
                   class="inline-flex items-center gap-2 bg-primary text-white px-6 py-3 rounded-md font-bold hover:bg-primary/90 transition-all">
                    <span class="material-symbols-outlined">arrow_back</span> Semua Berita
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
