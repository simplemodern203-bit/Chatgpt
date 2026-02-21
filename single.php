<?php
/**
 * Single template.
 *
 * @package Glassfolio3D
 */

get_header();
?>
<main class="page-main simple-layout">
    <section class="content-section glass-shell">
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class(); ?>>
                <h1><?php the_title(); ?></h1>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="single-thumb"><?php the_post_thumbnail('large'); ?></div>
                <?php endif; ?>
                <?php the_content(); ?>
            </article>
        <?php endwhile; ?>
    </section>
</main>
<?php
get_footer();
