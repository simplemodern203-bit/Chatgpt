<?php
/**
 * Glassfolio 3D theme setup.
 *
 * @package Glassfolio3D
 */

if (! defined('ABSPATH')) {
    exit;
}

function glassfolio_theme_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);

    register_nav_menus([
        'primary' => __('Primary Menu', 'glassfolio-3d'),
    ]);
}
add_action('after_setup_theme', 'glassfolio_theme_setup');

function glassfolio_enqueue_assets(): void
{
    wp_enqueue_style(
        'glassfolio-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap',
        [],
        null
    );

    wp_enqueue_style(
        'glassfolio-main-style',
        get_template_directory_uri() . '/assets/css/theme.css',
        ['glassfolio-fonts'],
        wp_get_theme()->get('Version')
    );

    wp_enqueue_script(
        'glassfolio-theme-script',
        get_template_directory_uri() . '/assets/js/theme.js',
        [],
        wp_get_theme()->get('Version'),
        true
    );
}
add_action('wp_enqueue_scripts', 'glassfolio_enqueue_assets');

function glassfolio_register_portfolio_cpt(): void
{
    register_post_type('portfolio', [
        'labels' => [
            'name' => __('Portfolio', 'glassfolio-3d'),
            'singular_name' => __('Project', 'glassfolio-3d'),
        ],
        'public' => true,
        'menu_icon' => 'dashicons-format-gallery',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'has_archive' => true,
        'rewrite' => ['slug' => 'portfolio'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'glassfolio_register_portfolio_cpt');

function glassfolio_customize_register(WP_Customize_Manager $wp_customize): void
{
    $wp_customize->add_section('glassfolio_hero', [
        'title' => __('Hero Content', 'glassfolio-3d'),
        'priority' => 30,
    ]);

    $wp_customize->add_setting('glassfolio_tag', ['default' => 'FUTURE PORTFOLIO', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_setting('glassfolio_heading', ['default' => '3D Glass Portfolio Experience', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_setting('glassfolio_subheading', ['default' => 'Showcase your best projects with immersive depth, mirror reflections, and premium motion.', 'sanitize_callback' => 'sanitize_textarea_field']);

    $wp_customize->add_control('glassfolio_tag', [
        'label' => __('Tagline', 'glassfolio-3d'),
        'section' => 'glassfolio_hero',
        'type' => 'text',
    ]);

    $wp_customize->add_control('glassfolio_heading', [
        'label' => __('Heading', 'glassfolio-3d'),
        'section' => 'glassfolio_hero',
        'type' => 'text',
    ]);

    $wp_customize->add_control('glassfolio_subheading', [
        'label' => __('Subheading', 'glassfolio-3d'),
        'section' => 'glassfolio_hero',
        'type' => 'textarea',
    ]);
}
add_action('customize_register', 'glassfolio_customize_register');
