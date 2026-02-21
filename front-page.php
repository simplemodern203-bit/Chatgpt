<?php
/**
 * Front page template.
 *
 * @package Glassfolio3D
 */

get_header();

$hero_tag = get_theme_mod('glassfolio_tag', 'FUTURE PORTFOLIO');
$hero_heading = get_theme_mod('glassfolio_heading', '3D Glass Portfolio Experience');
$hero_subheading = get_theme_mod('glassfolio_subheading', 'Showcase your best projects with immersive depth, mirror reflections, and premium motion.');
?>

<div class="scene-bg" aria-hidden="true"></div>
<main class="page-main" id="hero">
    <div class="orb orb-1" aria-hidden="true"></div>
    <div class="orb orb-2" aria-hidden="true"></div>

    <section class="glass-panel" id="panel">
        <p class="tag"><?php echo esc_html($hero_tag); ?></p>
        <h1><?php echo esc_html($hero_heading); ?></h1>
        <p><?php echo esc_html($hero_subheading); ?></p>
        <div class="cta-row">
            <a class="btn btn-primary" href="#portfolio"><?php esc_html_e('See Projects', 'glassfolio-3d'); ?></a>
            <a class="btn btn-ghost" href="#contact"><?php esc_html_e('Contact Me', 'glassfolio-3d'); ?></a>
        </div>
    </section>

    <section id="portfolio" class="content-section glass-shell">
        <h2><?php esc_html_e('Featured Work', 'glassfolio-3d'); ?></h2>
        <div class="cards-grid">
            <?php
            $projects = new WP_Query([
                'post_type' => 'portfolio',
                'posts_per_page' => 6,
            ]);

            if ($projects->have_posts()) :
                while ($projects->have_posts()) :
                    $projects->the_post();
                    ?>
                    <article <?php post_class('project-card'); ?>>
                        <a href="<?php the_permalink(); ?>" class="project-link">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="project-thumb"><?php the_post_thumbnail('medium_large'); ?></div>
                            <?php endif; ?>
                            <h3><?php the_title(); ?></h3>
                            <p><?php echo esc_html(get_the_excerpt()); ?></p>
                        </a>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <p><?php esc_html_e('Add portfolio projects in the dashboard to show your work here.', 'glassfolio-3d'); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <section id="contact" class="content-section glass-shell">
        <h2><?php esc_html_e('Let\'s Build Something', 'glassfolio-3d'); ?></h2>
        <p><?php esc_html_e('Add your contact form shortcode or details here from a page editor.', 'glassfolio-3d'); ?></p>
    </section>
</main>

<?php get_footer(); ?>
