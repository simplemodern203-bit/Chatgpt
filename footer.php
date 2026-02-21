<?php
/**
 * Footer template.
 *
 * @package Glassfolio3D
 */

if (! defined('ABSPATH')) {
    exit;
}
?>
<footer class="site-footer glass-shell">
    <div class="container">
        <p>&copy; <?php echo esc_html((string) date_i18n('Y')); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'glassfolio-3d'); ?></p>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
