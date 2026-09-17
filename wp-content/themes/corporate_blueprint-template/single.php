<?php
/**
 * Single Blog Post Template
 *
 * @package MBSCCTV
 */

get_header();

while ( have_posts() ) : the_post();

$categories = get_the_category();
$tags       = get_the_tags();
?>

<!-- Article Hero -->
<section class="relative py-14 lg:py-20 overflow-hidden">
    <div class="absolute inset-0">
        <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'full', array( 'class' => 'w-full h-full object-cover' ) ); ?>
        <?php else : ?>
            <img src="https://mbs.growandbless.com/wp-content/uploads/2026/03/1987.jpg" alt="" class="w-full h-full object-cover">
        <?php endif; ?>
        <div class="absolute inset-0 bg-slate-900/80"></div>
    </div>
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="mb-6 text-sm text-slate-400">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-white transition-colors">Beranda</a>
            <span class="material-symbols-outlined text-xs align-middle mx-1">chevron_right</span>
            <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>" class="hover:text-white transition-colors">Berita</a>
            <?php if ( ! empty( $categories ) ) : ?>
                <span class="material-symbols-outlined text-xs align-middle mx-1">chevron_right</span>
                <a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>" class="hover:text-white transition-colors"><?php echo esc_html( $categories[0]->name ); ?></a>
            <?php endif; ?>
        </nav>

        <!-- Meta -->
        <div class="flex items-center gap-3 mb-4">
            <?php if ( ! empty( $categories ) ) : ?>
                <span class="bg-primary text-white text-xs font-bold px-2.5 py-1 rounded-md"><?php echo esc_html( strtoupper( $categories[0]->name ) ); ?></span>
            <?php endif; ?>
            <span class="text-sm text-slate-400"><?php echo esc_html( get_the_date( 'd F Y' ) ); ?></span>
            <span class="text-slate-600">·</span>
            <span class="text-sm text-slate-400"><?php echo esc_html( mbscctv_reading_time() ); ?> menit baca</span>
        </div>

        <!-- Title -->
        <h1 class="text-2xl lg:text-4xl font-black text-white leading-tight mb-6"><?php the_title(); ?></h1>

        <!-- Author -->
        <div class="flex items-center gap-3">
            <div class="size-10 bg-primary/20 rounded-full flex items-center justify-center">
                <span class="material-symbols-outlined text-primary">person</span>
            </div>
            <div>
                <p class="text-sm font-bold text-white"><?php the_author(); ?></p>
                <p class="text-xs text-slate-400">Penulis</p>
            </div>
        </div>
    </div>
</section>

<!-- Article Content -->
<section class="py-12 lg:py-16 bg-white dark:bg-background-dark">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:flex lg:gap-12">
            <!-- Main Content -->
            <article class="flex-1 min-w-0">
                <div class="prose prose-lg max-w-none
                            prose-headings:font-black prose-headings:text-slate-900 dark:prose-headings:text-white
                            prose-p:text-slate-600 dark:prose-p:text-slate-400 prose-p:leading-relaxed
                            prose-a:text-primary prose-a:font-semibold prose-a:no-underline hover:prose-a:underline
                            prose-img:rounded-lg prose-img:shadow-md
                            prose-strong:text-slate-900 dark:prose-strong:text-white
                            prose-blockquote:border-primary prose-blockquote:bg-background-light dark:prose-blockquote:bg-slate-800 prose-blockquote:rounded-r-lg prose-blockquote:py-1 prose-blockquote:px-2
                            prose-li:text-slate-600 dark:prose-li:text-slate-400
                            prose-code:text-primary prose-code:bg-primary/5 prose-code:px-1.5 prose-code:py-0.5 prose-code:rounded prose-code:text-sm prose-code:font-semibold">
                    <?php the_content(); ?>
                </div>

                <!-- Tags -->
                <?php if ( ! empty( $tags ) ) : ?>
                <div class="mt-10 pt-8 border-t border-slate-200 dark:border-slate-800">
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="material-symbols-outlined text-slate-400 text-lg">label</span>
                        <?php foreach ( $tags as $tag ) : ?>
                            <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"
                               class="text-xs font-bold bg-background-light dark:bg-slate-800 text-slate-600 dark:text-slate-400 px-3 py-1.5 rounded-md hover:bg-primary hover:text-white transition-all">
                                <?php echo esc_html( $tag->name ); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Share -->
                <div class="mt-8 pt-8 border-t border-slate-200 dark:border-slate-800">
                    <p class="text-sm font-bold mb-3">Bagikan Artikel:</p>
                    <div class="flex gap-2">
                        <a href="https://wa.me/?text=<?php echo urlencode( get_the_title() . ' - ' . get_the_permalink() ); ?>"
                           target="_blank" rel="noopener"
                           class="size-10 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center text-green-600 hover:bg-green-600 hover:text-white transition-all"
                           aria-label="Share via WhatsApp">
                            <span class="material-symbols-outlined text-xl">chat</span>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_the_permalink() ); ?>"
                           target="_blank" rel="noopener"
                           class="size-10 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center text-blue-600 hover:bg-blue-600 hover:text-white transition-all"
                           aria-label="Share via Facebook">
                            <span class="material-symbols-outlined text-xl">share</span>
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode( get_the_permalink() ); ?>&title=<?php echo urlencode( get_the_title() ); ?>"
                           target="_blank" rel="noopener"
                           class="size-10 bg-sky-100 dark:bg-sky-900/30 rounded-lg flex items-center justify-center text-sky-600 hover:bg-sky-600 hover:text-white transition-all"
                           aria-label="Share via LinkedIn">
                            <span class="material-symbols-outlined text-xl">public</span>
                        </a>
                        <button onclick="navigator.clipboard.writeText('<?php echo esc_js( get_the_permalink() ); ?>'); this.querySelector('span').textContent='check'; setTimeout(() => this.querySelector('span').textContent='link', 2000);"
                                class="size-10 bg-slate-100 dark:bg-slate-800 rounded-lg flex items-center justify-center text-slate-600 hover:bg-primary hover:text-white transition-all"
                                aria-label="Copy Link">
                            <span class="material-symbols-outlined text-xl">link</span>
                        </button>
                    </div>
                </div>

                <!-- Author Bio -->
                <div class="mt-8 p-6 bg-background-light dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700">
                    <div class="flex items-start gap-4">
                        <div class="size-14 bg-primary/10 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-outlined text-2xl text-primary">person</span>
                        </div>
                        <div>
                            <p class="font-bold mb-1"><?php the_author(); ?></p>
                            <p class="text-sm text-slate-500 leading-relaxed"><?php echo esc_html( get_the_author_meta( 'description' ) ?: 'Tim redaksi MBS CCTV yang berdedikasi menyajikan informasi terbaru seputar teknologi keamanan dan electronic security system.' ); ?></p>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- Post Navigation -->
<section class="py-8 bg-background-light dark:bg-slate-900/50 border-t border-slate-200 dark:border-slate-800">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 gap-4">
            <?php
            $prev_post = get_previous_post();
            $next_post = get_next_post();
            ?>
            <div>
                <?php if ( $prev_post ) : ?>
                    <a href="<?php echo esc_url( get_permalink( $prev_post ) ); ?>" class="group block p-4 rounded-lg hover:bg-white dark:hover:bg-slate-800 transition-colors">
                        <span class="flex items-center gap-1 text-xs font-bold text-slate-400 mb-1">
                            <span class="material-symbols-outlined text-sm">chevron_left</span> Sebelumnya
                        </span>
                        <p class="text-sm font-bold line-clamp-1 group-hover:text-primary transition-colors"><?php echo esc_html( $prev_post->post_title ); ?></p>
                    </a>
                <?php endif; ?>
            </div>
            <div class="text-right">
                <?php if ( $next_post ) : ?>
                    <a href="<?php echo esc_url( get_permalink( $next_post ) ); ?>" class="group block p-4 rounded-lg hover:bg-white dark:hover:bg-slate-800 transition-colors">
                        <span class="flex items-center justify-end gap-1 text-xs font-bold text-slate-400 mb-1">
                            Selanjutnya <span class="material-symbols-outlined text-sm">chevron_right</span>
                        </span>
                        <p class="text-sm font-bold line-clamp-1 group-hover:text-primary transition-colors"><?php echo esc_html( $next_post->post_title ); ?></p>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php endwhile; ?>

<!-- Related Posts -->
<?php
$related_query = new WP_Query( array(
    'posts_per_page' => 3,
    'post__not_in'   => array( get_the_ID() ),
    'category__in'   => ! empty( $categories ) ? array( $categories[0]->term_id ) : array(),
    'post_status'    => 'publish',
) );

if ( $related_query->have_posts() ) :
?>
<section class="py-12 lg:py-16 bg-white dark:bg-background-dark border-t border-slate-200 dark:border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-black mb-8">Artikel Terkait</h2>
        <div class="grid md:grid-cols-3 gap-6">
            <?php while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
                <article class="group bg-background-light dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700 overflow-hidden hover:shadow-lg hover:border-primary/30 transition-all duration-300">
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
                        </div>
                        <h3 class="font-bold text-sm mb-2 leading-snug">
                            <a href="<?php the_permalink(); ?>" class="hover:text-primary transition-colors line-clamp-2"><?php the_title(); ?></a>
                        </h3>
                        <p class="text-slate-500 text-xs line-clamp-2"><?php echo esc_html( get_the_excerpt() ); ?></p>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php
wp_reset_postdata();
endif;
?>

<?php
get_footer();
