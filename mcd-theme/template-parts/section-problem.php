<?php
/**
 * Template Part: Problem Section
 *
 * @package MCD_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

$title = mcd_get_field('problem_title', 'Por que nada funcionou até agora?');
$description = mcd_get_field('problem_description', 'Você fez o caminho "certo": avaliação neuropsicológica, diagnóstico de TDAH, medicação com psiquiatra, terapia com psicólogo. E mesmo assim... continua no mesmo lugar.');

$known_label = mcd_get_field('problem_known_label', 'O lado que todo mundo conhece');
$known_title = mcd_get_field('problem_known_title', 'O TDAH "oficial"');
$known_items = get_field('problem_known_items');
$known_note = mcd_get_field('problem_known_note', 'É o que está no diagnóstico. É o que a medicação tenta tratar.');

$hidden_label = mcd_get_field('problem_hidden_label', 'O lado que ninguém te explicou');
$hidden_title = mcd_get_field('problem_hidden_title', 'A Síndrome de Labilidade Dopaminérgica');
$hidden_items = get_field('problem_hidden_items');
$hidden_note = mcd_get_field('problem_hidden_note', 'É esse segundo lado que o diagnóstico não resolve e a medicação sozinha não estabiliza.');

$sld_title = mcd_get_field('sld_title', 'O que é a Síndrome de Labilidade Dopaminérgica (SLD)?');
$sld_description = mcd_get_field('sld_description', 'Você não tem simplesmente "falta de dopamina". Você tem labilidade dopaminérgica — sua dopamina oscila, flutua, não se mantém estável.');
$sld_symptoms = get_field('sld_symptoms');
$sld_conclusion = mcd_get_field('sld_conclusion', 'Isso não é falta de força de vontade. É um sistema instável que ninguém te ensinou a estabilizar.');

// Defaults
$default_known = array('Desatenção', 'Hiperatividade', 'Impulsividade');
$default_hidden = array('Oscilação constante da dopamina', 'Motivação que vai e vem', 'Energia instável', 'Foco imprevisível');
$default_symptoms = array(
    'Num momento você tá focado, no outro apagou',
    'Num dia acorda produtivo, no outro não consegue sair da cama',
    'Uma hora tá motivado, na outra não consegue nem começar',
    'Às vezes o remédio parece funcionar, às vezes parece que parou',
);
?>

<section class="problem">
    <div class="container">
        <div class="section-header fade-in">
            <h2><?php echo esc_html($title); ?></h2>
            <p><?php echo esc_html($description); ?></p>
        </div>

        <div class="problem-visual fade-in">
            <div class="problem-side known">
                <div class="problem-label"><?php echo esc_html($known_label); ?></div>
                <h3><?php echo esc_html($known_title); ?></h3>
                <ul>
                    <?php if ($known_items) : ?>
                        <?php foreach ($known_items as $item) : ?>
                            <li><?php echo esc_html($item['item']); ?></li>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <?php foreach ($default_known as $item) : ?>
                            <li><?php echo esc_html($item); ?></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
                <p class="text-muted" style="margin-top: 20px; font-size: 14px;"><?php echo esc_html($known_note); ?></p>
            </div>
            <div class="problem-side hidden">
                <div class="problem-label"><?php echo esc_html($hidden_label); ?></div>
                <h3><?php echo esc_html($hidden_title); ?></h3>
                <ul>
                    <?php if ($hidden_items) : ?>
                        <?php foreach ($hidden_items as $item) : ?>
                            <li><?php echo esc_html($item['item']); ?></li>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <?php foreach ($default_hidden as $item) : ?>
                            <li><?php echo esc_html($item); ?></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
                <p class="text-muted" style="margin-top: 20px; font-size: 14px;"><?php echo esc_html($hidden_note); ?></p>
            </div>
        </div>

        <div class="sld-box fade-in">
            <h3><?php echo esc_html($sld_title); ?></h3>
            <p><?php echo wp_kses_post($sld_description); ?></p>
            <div class="sld-symptoms">
                <?php if ($sld_symptoms) : ?>
                    <?php foreach ($sld_symptoms as $symptom) : ?>
                        <div class="sld-symptom"><?php echo esc_html($symptom['symptom']); ?></div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <?php foreach ($default_symptoms as $symptom) : ?>
                        <div class="sld-symptom"><?php echo esc_html($symptom); ?></div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <p style="margin-top: 28px; text-align: center; margin-bottom: 0;"><strong><?php echo esc_html($sld_conclusion); ?></strong></p>
        </div>
    </div>
</section>
