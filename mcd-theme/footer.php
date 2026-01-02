<?php
/**
 * Theme Footer
 *
 * @package MCD_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

// Get footer fields
$footer_logo = mcd_get_field('footer_logo', 'Dr. Bruno Salles');
$footer_tagline = mcd_get_field('footer_tagline', 'Ciência · Propósito · Lucidez');
$footer_copyright = mcd_get_field('footer_copyright', '© ' . date('Y') . ' Dr. Bruno Salles. Todos os direitos reservados.');
$footer_cnpj = mcd_get_field('footer_cnpj', '');
$footer_links = get_field('footer_links');
?>

<footer>
    <div class="footer-content">
        <div class="footer-logo"><?php echo esc_html($footer_logo); ?></div>
        <p class="footer-tagline"><?php echo esc_html($footer_tagline); ?></p>
        <p class="footer-info">
            <?php echo nl2br(esc_html($footer_copyright)); ?>
            <?php if ($footer_cnpj) : ?>
                <br><?php echo esc_html($footer_cnpj); ?>
            <?php endif; ?>
        </p>
        <?php if ($footer_links) : ?>
            <div class="footer-links">
                <?php foreach ($footer_links as $link) : ?>
                    <a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['text']); ?></a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
