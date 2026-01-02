<?php
/**
 * Template Part: Hero Section
 *
 * @package MCD_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields with defaults
$badge = mcd_get_field('hero_badge', 'Primeiro Protocolo Neurocientífico Brasileiro');
$title = mcd_get_field('hero_title', 'Controle Dopaminérgico em Tempo Real para Adultos com TDAH');
$title_highlight = mcd_get_field('hero_title_highlight', 'Tempo Real');
$description = mcd_get_field('hero_description', 'O MCD (Método de Controle Dopaminérgico) é o primeiro protocolo neurocientífico brasileiro que ensina você a monitorar e ajustar sua dopamina no dia a dia — como o diabético faz com a glicose — mesmo que a medicação não tenha resolvido e você nunca tenha mantido uma rotina antes.');
$guarantee_text = mcd_get_field('hero_guarantee_text', 'Garantia de 90 dias: funcionou ou seu dinheiro de volta');
$cta_primary_text = mcd_get_field('hero_cta_primary_text', 'Quero Controlar Minha Dopamina');
$cta_primary_url = mcd_get_field('hero_cta_primary_url', '#pricing');
$cta_secondary_text = mcd_get_field('hero_cta_secondary_text', 'Saiba Mais');
$cta_secondary_url = mcd_get_field('hero_cta_secondary_url', '#solution');
$hero_image = get_field('hero_image');

// Process title with highlight
$formatted_title = mcd_highlight_text($title, $title_highlight);
?>

<section class="hero">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-content">
                <div class="hero-badge">
                    <?php echo esc_html($badge); ?>
                </div>
                <h1><?php echo wp_kses_post($formatted_title); ?></h1>
                <p class="hero-subheadline">
                    <?php echo esc_html($description); ?>
                </p>
                <div class="hero-guarantee">
                    <span class="shield">🛡️</span>
                    <span><?php echo esc_html($guarantee_text); ?></span>
                </div>
                <div class="hero-cta">
                    <a href="<?php echo esc_url($cta_primary_url); ?>" class="btn btn-primary">
                        <?php echo esc_html($cta_primary_text); ?>
                        <span>→</span>
                    </a>
                    <a href="<?php echo esc_url($cta_secondary_url); ?>" class="btn btn-secondary">
                        <?php echo esc_html($cta_secondary_text); ?>
                    </a>
                </div>
            </div>
            <div class="hero-image">
                <div class="hero-image-frame"></div>
                <div class="hero-image-corner top-left"></div>
                <div class="hero-image-corner top-right"></div>
                <div class="hero-image-corner bottom-left"></div>
                <div class="hero-image-corner bottom-right"></div>
                <?php if ($hero_image) : ?>
                    <img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt'] ?: 'Dr. Bruno Salles'); ?>">
                <?php else : ?>
                    <img src="<?php echo esc_url(MCD_THEME_URI . '/assets/images/bruno-salles-hero.png'); ?>" alt="Dr. Bruno Salles - Psicólogo e Neurocientista">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
