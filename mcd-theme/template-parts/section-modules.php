<?php
/**
 * Template Part: Modules Section
 *
 * @package MCD_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

$title = mcd_get_field('modules_title', 'O que você recebe no MCD');
$description = mcd_get_field('modules_description', 'Um programa completo e estruturado com tudo que você precisa para controlar sua dopamina.');
$modules = get_field('modules_list');
$bonus_title = mcd_get_field('bonus_title', 'Bônus Inclusos');
$bonuses = get_field('bonus_list');

// Default modules
$default_modules = array(
    array('number' => '0', 'title' => 'Introdução', 'description' => 'O que está acontecendo com você, por que nada funcionou, e a revelação da SLD.', 'lessons' => '2 aulas'),
    array('number' => '1', 'title' => 'Conhecimento', 'description' => 'Dopamina, o cérebro TDAH, a Labilidade Dopaminérgica, ladrões e construtores de dopamina.', 'lessons' => '4 aulas'),
    array('number' => '2', 'title' => 'Checagem', 'description' => 'Os 3 estados dopaminérgicos, como fazer o check-in, identificando seus padrões pessoais.', 'lessons' => '3 aulas'),
    array('number' => '3', 'title' => 'Intervenções', 'description' => 'Arsenal completo de intervenções pra dopamina baixa, pico instável, e preparação pra tarefas.', 'lessons' => '5 aulas'),
    array('number' => '4', 'title' => 'Rotinas', 'description' => 'Rotina de manhã, trabalho, recuperação, noite, estrutura semanal.', 'lessons' => '5 aulas'),
    array('number' => '5', 'title' => 'Protocolos de Crise', 'description' => 'Reconhecendo a crise, protocolos específicos, prevenção e recuperação.', 'lessons' => '3 aulas'),
    array('number' => '6', 'title' => 'Acompanhamento', 'description' => 'O que registrar, como registrar, identificando padrões, revisões semanais e mensais.', 'lessons' => '3 aulas'),
);

// Default bonuses
$default_bonuses = array(
    array('icon' => '📋', 'title' => 'Checklist dos 3 Estados', 'description' => 'Documento de consulta rápida pra identificar onde você está.'),
    array('icon' => '🃏', 'title' => 'Cartões de Intervenção', 'description' => 'Cartões pra imprimir ou salvar no celular — o que fazer em cada situação.'),
    array('icon' => '📅', 'title' => 'Templates de Rotina', 'description' => 'Modelos prontos pra personalizar: manhã, trabalho, noite, semana.'),
    array('icon' => '🚨', 'title' => 'Cartões de Crise', 'description' => 'Um cartão pra cada tipo de crise — consultar no momento do colapso.'),
);
?>

<section class="modules">
    <div class="container">
        <div class="section-header fade-in">
            <h2><?php echo esc_html($title); ?></h2>
            <p><?php echo esc_html($description); ?></p>
        </div>

        <div class="modules-list">
            <?php $module_list = $modules ?: $default_modules; ?>
            <?php foreach ($module_list as $module) : ?>
                <div class="module-item fade-in">
                    <div class="module-number"><?php echo esc_html($module['number']); ?></div>
                    <div class="module-content">
                        <h4><?php echo esc_html($module['title']); ?></h4>
                        <p><?php echo esc_html($module['description']); ?></p>
                    </div>
                    <div class="module-meta"><?php echo esc_html($module['lessons']); ?></div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="decorative-line">
            <span class="ornament">◆</span>
        </div>

        <h3 class="fade-in" style="text-align: center; margin-top: 48px;"><?php echo esc_html($bonus_title); ?></h3>
        <div class="bonus-grid">
            <?php $bonus_list = $bonuses ?: $default_bonuses; ?>
            <?php foreach ($bonus_list as $bonus) : ?>
                <div class="bonus-item fade-in">
                    <div class="bonus-icon"><?php echo esc_html($bonus['icon']); ?></div>
                    <div>
                        <h4><?php echo esc_html($bonus['title']); ?></h4>
                        <p><?php echo esc_html($bonus['description']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
