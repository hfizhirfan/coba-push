<?php
/**
 * Main Template File
 *
 * @package MBSCCTV
 */

get_header();
?>

<main class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-black mb-12">Latest Insights &amp; Updates</h1>

        <?php if ( have_posts() ) : ?>
            <div class="grid md:grid-cols-3 gap-8">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article class="space-y-4">
                        <div class="aspect-video bg-slate-200 rounded-xl overflow-hidden">
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
            <p class="text-slate-600 dark:text-slate-400">No posts found.</p>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
