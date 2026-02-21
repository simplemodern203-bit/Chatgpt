<?php
/**
 * Main template fallback.
 *
 * @package Glassfolio3D
 */

get_header();
?>
<main class="page-main simple-layout">
    <section class="content-section glass-shell">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article <?php post_class(); ?>>
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    <?php the_excerpt(); ?>
                </article>
            <?php endwhile; ?>
            <?php the_posts_navigation(); ?>
        <?php else : ?>
            <p><?php esc_html_e('No content found.', 'glassfolio-3d'); ?></p>
        <?php endif; ?>
    </section>
</main>
<?php
get_footer();
