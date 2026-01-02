<?php
/**
 * Template Part: Solution Section (6 Pillars)
 *
 * @package MCD_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

$title = mcd_get_field('solution_title', 'A Solução: Método de Controle Dopaminérgico');
$description = mcd_get_field('solution_description', 'O MCD é o primeiro protocolo neurocientífico brasileiro que ensina adultos com TDAH a fazer com sua dopamina o que o diabético faz com a glicose: monitorar e ajustar, todo dia, na prática.');
$pillars_title = mcd_get_field('solution_pillars_title', 'Os 6 Pilares do MCD');
$pillars = get_field('solution_pillars');
$promise_title = mcd_get_field('solution_promise_title', '◆ A Promessa do MCD ◆');
$promise_text = mcd_get_field('solution_promise_text', 'Você vai sair sabendo o que fazer com sua dopamina — todo dia, na prática, com ferramentas. Assim como o diabético sabe o que fazer com a glicose.');

// Default pillars
$default_pillars = array(
    array('icon' => '📚', 'title' => 'Conhecimento', 'question' => '"Por que eu sou assim?"', 'description' => 'Entender como a dopamina funciona no seu cérebro e o que é a Síndrome de Labilidade Dopaminérgica. Parar de se culpar. Entender o jogo.'),
    array('icon' => '🔍', 'title' => 'Checagem', 'question' => '"Como eu estou agora?"', 'description' => 'Aprender a identificar seu estado dopaminérgico agora — o "glicosímetro cerebral". Saber onde você está antes de decidir o que fazer.'),
    array('icon' => '⚡', 'title' => 'Intervenções', 'question' => '"O que eu faço agora?"', 'description' => 'Um arsenal de ações práticas pra ajustar sua dopamina no momento — a "insulina comportamental". Saber o que fazer em cada estado.'),
    array('icon' => '🔄', 'title' => 'Rotinas', 'question' => '"Como eu me mantenho estável?"', 'description' => 'Estruturas diárias que sustentam seu sistema estável — a "dieta dopaminérgica". Prevenção em vez de correção.'),
    array('icon' => '🆘', 'title' => 'Protocolos de Crise', 'question' => '"O que faço quando colapsa?"', 'description' => 'O que fazer quando tudo colapsa — o "kit de emergência". Paralisia, burnout, procrastinação, shutdown. Você vai ter um plano.'),
    array('icon' => '📊', 'title' => 'Acompanhamento', 'question' => '"Como sei se funciona?"', 'description' => 'Registrar e monitorar ao longo do tempo — o "diário de glicose dopaminérgico". Identificar padrões, ajustar com base em dados.'),
);
?>

<section class="solution" id="solution">
    <div class="container">
        <div class="solution-intro fade-in">
            <h2><?php echo esc_html($title); ?></h2>
            <p><?php echo wp_kses_post($description); ?></p>
            <div class="solution-formula">
                <span class="formula-item">Não é mais diagnóstico</span>
                <span class="formula-operator">+</span>
                <span class="formula-item">Não é mais remédio sozinho</span>
                <span class="formula-operator">=</span>
                <span class="formula-item highlight">É saber O QUE FAZER</span>
            </div>
        </div>

        <div class="decorative-line">
            <span class="ornament">◆</span>
        </div>

        <h3 class="fade-in" style="text-align: center; margin-bottom: 48px;"><?php echo esc_html($pillars_title); ?></h3>

        <div class="pillars-grid">
            <?php $pillar_list = $pillars ?: $default_pillars; ?>
            <?php foreach ($pillar_list as $index => $pillar) : ?>
                <div class="pillar-card fade-in">
                    <div class="pillar-header">
                        <div class="pillar-number"><?php echo $index + 1; ?></div>
                        <div class="pillar-icon"><?php echo esc_html($pillar['icon']); ?></div>
                    </div>
                    <h4><?php echo esc_html($pillar['title']); ?></h4>
                    <p class="pillar-question"><?php echo esc_html($pillar['question']); ?></p>
                    <p><?php echo esc_html($pillar['description']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="promise-box fade-in">
            <h3><?php echo esc_html($promise_title); ?></h3>
            <p><?php echo wp_kses_post($promise_text); ?></p>
        </div>
    </div>
</section>
