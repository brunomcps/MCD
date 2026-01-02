<?php
/**
 * Template Part: Pain Points Section
 *
 * @package MCD_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

$title = mcd_get_field('pain_title', 'Você se reconhece em alguma dessas situações?');
$pain_points = get_field('pain_points');
$transition_text = mcd_get_field('pain_transition_text', 'Se você marcou 3 ou mais, continue lendo.');
$transition_highlight = mcd_get_field('pain_transition_highlight', 'O problema não é você. É que ninguém te ensinou a parte mais importante.');

// Default pain points if none set
$default_pain_points = array(
    'Fez avaliação, recebeu o diagnóstico de TDAH, mas continua travado',
    'Toma medicação, mas sente que ela "parou de funcionar" ou não resolve tudo',
    'Já fez terapia, mas sai das sessões sem saber o que fazer na prática',
    'Começa o dia motivado e no meio da tarde já não consegue fazer mais nada',
    'Sua motivação, foco e energia oscilam sem você entender o porquê',
    'Já tentou várias rotinas, métodos e apps — nenhum durou mais de 2 semanas',
    'Procrastina mesmo sabendo que vai se arrepender depois',
    'Às vezes se pergunta se é TDAH mesmo ou se é só preguiça/falta de disciplina',
    'Sente que seu caso é "grave demais" e nada funciona pra você',
);
?>

<section class="pain-points">
    <div class="container">
        <div class="section-header fade-in">
            <h2><?php echo esc_html($title); ?></h2>
        </div>
        <div class="pain-grid">
            <?php if ($pain_points) : ?>
                <?php foreach ($pain_points as $point) : ?>
                    <div class="pain-item fade-in">
                        <div class="pain-checkbox"></div>
                        <p class="pain-text"><?php echo esc_html($point['text']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <?php foreach ($default_pain_points as $point) : ?>
                    <div class="pain-item fade-in">
                        <div class="pain-checkbox"></div>
                        <p class="pain-text"><?php echo esc_html($point); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="pain-transition fade-in">
            <p><?php echo esc_html($transition_text); ?><br><strong class="highlight-gold"><?php echo esc_html($transition_highlight); ?></strong></p>
        </div>
    </div>
</section>
