<?php
/**
 * Template Part: Analogy Section (Diabetic Comparison)
 *
 * @package MCD_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

$title = mcd_get_field('analogy_title', 'O diabético sabe. Você não sabe.');
$description = mcd_get_field('analogy_description', 'O diabético também tem labilidade — da glicose. O açúcar no sangue dele oscila, sobe e desce, não se mantém estável sozinho. Por isso ele não sai do consultório só com diagnóstico e receita.');

$diabetic_title = mcd_get_field('analogy_diabetic_title', 'O Diabético');
$diabetic_items = get_field('analogy_diabetic_items');

$tdah_title = mcd_get_field('analogy_tdah_title', 'Você com TDAH');
$tdah_items = get_field('analogy_tdah_items');

$insight = mcd_get_field('analogy_insight', 'O diabético sai sabendo o que fazer. Você saiu só com o diagnóstico e a receita.');

// Defaults
$default_diabetic = array(
    'Mede a glicose (sabe onde está)',
    'Interpreta os números (entende o que significa)',
    'Ajusta a insulina (age pra corrigir)',
    'Segue alimentação adequada (previne oscilações)',
    'Reconhece sinais de crise (hipo/hiperglicemia)',
    'Tem protocolo de emergência',
);

$default_tdah = array(
    'Não sabe medir seu estado dopaminérgico',
    'Não entende o que as oscilações significam',
    'Não sabe como ajustar no momento',
    'Não tem rotina que previna desregulação',
    'Não reconhece sinais antes da crise',
    'Não tem protocolo quando colapsa',
);
?>

<section class="analogy">
    <div class="container">
        <div class="section-header fade-in">
            <h2><?php echo esc_html($title); ?></h2>
            <p><?php echo esc_html($description); ?></p>
        </div>

        <div class="analogy-comparison fade-in">
            <div class="analogy-card diabetes">
                <div class="analogy-icon">💉</div>
                <h3><?php echo esc_html($diabetic_title); ?></h3>
                <ul>
                    <?php if ($diabetic_items) : ?>
                        <?php foreach ($diabetic_items as $item) : ?>
                            <li><?php echo esc_html($item['item']); ?></li>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <?php foreach ($default_diabetic as $item) : ?>
                            <li><?php echo esc_html($item); ?></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="analogy-divider">VS</div>
            <div class="analogy-card tdah">
                <div class="analogy-icon">🧠</div>
                <h3><?php echo esc_html($tdah_title); ?></h3>
                <ul>
                    <?php if ($tdah_items) : ?>
                        <?php foreach ($tdah_items as $item) : ?>
                            <li><?php echo esc_html($item['item']); ?></li>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <?php foreach ($default_tdah as $item) : ?>
                            <li><?php echo esc_html($item); ?></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <div class="analogy-insight fade-in">
            <p><?php echo esc_html($insight); ?></p>
        </div>
    </div>
</section>
