<?php
/**
 * Default Page Template
 *
 * @package MBSCCTV
 */

get_header();

while ( have_posts() ) : the_post();
?>

<!-- Page Hero -->
<section class="relative py-14 lg:py-20 overflow-hidden">
    <div class="absolute inset-0">
        <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'full', array( 'class' => 'w-full h-full object-cover' ) ); ?>
        <?php else : ?>
            <img src="https://mbs.growandbless.com/wp-content/uploads/2026/03/1987.jpg" alt="" class="w-full h-full object-cover">
        <?php endif; ?>
        <div class="absolute inset-0 bg-slate-900/85"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="mb-6 text-sm text-slate-400">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-white transition-colors">Beranda</a>
            <span class="material-symbols-outlined text-xs align-middle mx-1">chevron_right</span>
            <span class="text-white font-semibold"><?php the_title(); ?></span>
        </nav>
        <h1 class="text-3xl lg:text-4xl font-black text-white"><?php the_title(); ?></h1>
    </div>
</section>

<!-- Page Content -->
<section class="py-12 lg:py-16 bg-white dark:bg-background-dark">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg max-w-none
                    prose-headings:font-black prose-headings:text-slate-900 dark:prose-headings:text-white
                    prose-p:text-slate-600 dark:prose-p:text-slate-400 prose-p:leading-relaxed
                    prose-a:text-primary prose-a:font-semibold
                    prose-img:rounded-lg prose-img:shadow-md
                    prose-strong:text-slate-900 dark:prose-strong:text-white
                    prose-li:text-slate-600 dark:prose-li:text-slate-400">
            <?php the_content(); ?>
        </div>
    </div>
</section>

<?php endwhile; ?>

<?php
get_footer();
