<?php
/**
 * Portfolio archive template.
 *
 * @package Glassfolio3D
 */

get_header();
?>
<main class="page-main simple-layout">
    <section class="content-section glass-shell">
        <h1><?php post_type_archive_title(); ?></h1>
        <div class="cards-grid">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article <?php post_class('project-card'); ?>>
                        <a href="<?php the_permalink(); ?>" class="project-link">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="project-thumb"><?php the_post_thumbnail('medium_large'); ?></div>
                            <?php endif; ?>
                            <h2><?php the_title(); ?></h2>
                            <p><?php echo esc_html(get_the_excerpt()); ?></p>
                        </a>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <p><?php esc_html_e('No projects yet.', 'glassfolio-3d'); ?></p>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php
get_footer();
