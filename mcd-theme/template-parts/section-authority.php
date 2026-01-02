<?php
/**
 * Template Part: Authority Section (Dr. Bruno)
 *
 * @package MCD_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

$name = mcd_get_field('authority_name', 'Dr. Bruno Salles');
$crp = mcd_get_field('authority_crp', 'CRP: 05/52904');
$image = get_field('authority_image');
$credentials = get_field('authority_credentials');
$quote = mcd_get_field('authority_quote', 'Depois de mais de 10.000 atendimentos, eu percebi um padrão: as pessoas chegavam com diagnóstico, medicação, terapia — e continuavam travadas. Faltava uma peça. Elas não sabiam o que fazer com a dopamina delas no dia a dia. Ninguém tinha ensinado. Foi pra preencher esse gap que eu criei o MCD.');

// Default credentials
$default_credentials = array(
    'Psicólogo clínico especializado em TDAH adulto',
    'PhD em Neurociência pela PUC-Rio',
    '+10.000 atendimentos realizados com adultos com TDAH',
    'Psicólogo mais bem avaliado do Doctoralia Brasil na categoria',
    'Criador de conteúdo sobre TDAH e neurociência no YouTube',
);
?>

<section class="authority">
    <div class="container">
        <div class="authority-content">
            <div class="authority-image fade-in">
                <div class="authority-photo">
                    <?php if ($image) : ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?: $name); ?>">
                    <?php else : ?>
                        <img src="<?php echo esc_url(MCD_THEME_URI . '/assets/images/bruno-salles-hero.png'); ?>" alt="<?php echo esc_attr($name); ?>">
                    <?php endif; ?>
                </div>
            </div>
            <div class="authority-info fade-in">
                <h3><?php echo esc_html($name); ?></h3>
                <p class="authority-crp"><?php echo esc_html($crp); ?></p>
                <ul class="authority-credentials">
                    <?php if ($credentials) : ?>
                        <?php foreach ($credentials as $credential) : ?>
                            <li><?php echo wp_kses_post($credential['credential']); ?></li>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <?php foreach ($default_credentials as $credential) : ?>
                            <li><?php echo wp_kses_post($credential); ?></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
                <div class="authority-quote">
                    <p>"<?php echo esc_html($quote); ?>"</p>
                </div>
            </div>
        </div>
    </div>
</section>
