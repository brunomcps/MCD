<?php
/**
 * Template Part: Gap Section (Professionals)
 *
 * @package MCD_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

$title = mcd_get_field('gap_title', 'O que cada profissional fez — e o que deixou de fazer');
$description = mcd_get_field('gap_description', 'Cada um fez sua parte. Mas faltou uma peça fundamental.');
$gap_cards = get_field('gap_cards');
$conclusion = mcd_get_field('gap_conclusion', 'Resultado: Você ficou com diagnóstico, receita e escuta — mas não sabe o que fazer com a labilidade dopaminérgica no dia a dia.');
$highlight = mcd_get_field('gap_highlight', 'Esse é o gap. E esse é exatamente o gap que o MCD preenche.');

// Default cards
$default_cards = array(
    array(
        'icon' => '📋',
        'title' => 'O Neuropsicólogo',
        'good' => 'Avaliou, testou, diagnosticou. Te deu o laudo.',
        'bad' => 'Acabou ali. Não ensina a viver com TDAH. O laudo virou papel na gaveta.',
        'result' => 'Te deu o nome, não mostrou o mecanismo nem ensinou a manejar.',
    ),
    array(
        'icon' => '💊',
        'title' => 'O Psiquiatra',
        'good' => 'Medicou corretamente.',
        'bad' => 'Consulta de 15-20 min. É generalista. Você saiu sem entender que a medicação sozinha não resolve.',
        'result' => 'A medicação ajuda, mas é só uma peça — e ninguém explicou isso.',
    ),
    array(
        'icon' => '🛋️',
        'title' => 'O Psicólogo',
        'good' => 'Acolheu, escutou, trabalhou questões emocionais.',
        'bad' => 'Maioria sem formação em neurociências. Foca no emocional vago. Você sai sem saber o que fazer segunda de manhã.',
        'result' => 'Não tem estratégias práticas pra estabilizar a labilidade dopaminérgica.',
    ),
);
?>

<section class="gap section-dark">
    <div class="container">
        <div class="section-header fade-in">
            <h2><?php echo esc_html($title); ?></h2>
            <p><?php echo esc_html($description); ?></p>
        </div>

        <div class="gap-cards">
            <?php $cards = $gap_cards ?: $default_cards; ?>
            <?php foreach ($cards as $card) : ?>
                <div class="gap-card fade-in">
                    <div class="gap-card-header">
                        <div class="gap-card-icon"><?php echo esc_html($card['icon']); ?></div>
                        <h4><?php echo esc_html($card['title']); ?></h4>
                    </div>
                    <div class="gap-section">
                        <div class="gap-section-label good">O que fez bem:</div>
                        <p><?php echo esc_html($card['good']); ?></p>
                    </div>
                    <div class="gap-section">
                        <div class="gap-section-label bad">O que faltou:</div>
                        <p><?php echo esc_html($card['bad']); ?></p>
                    </div>
                    <div class="gap-result">
                        <p>→ <?php echo esc_html($card['result']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="pain-transition fade-in" style="margin-top: 48px;">
            <p><strong><?php echo esc_html($conclusion); ?></strong><br><br><strong class="highlight-gold"><?php echo esc_html($highlight); ?></strong></p>
        </div>
    </div>
</section>
