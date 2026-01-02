<?php
/**
 * Template Part: Pricing Section
 *
 * @package MCD_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

$title = mcd_get_field('pricing_title', 'Quanto custa ter controle sobre sua dopamina?');
$anchor_items = get_field('pricing_anchor_items');
$old_price = mcd_get_field('pricing_old_price', 'De R$ 1.497');
$current_price = mcd_get_field('pricing_current_price', 'R$ 997');
$installments = mcd_get_field('pricing_installments', 'ou 12x de R$ 97,07');
$features = get_field('pricing_features');
$cta_text = mcd_get_field('pricing_cta_text', 'Quero Controlar Minha Dopamina');
$cta_url = mcd_get_field('pricing_cta_url', '#');
$guarantee_title = mcd_get_field('guarantee_title', 'Garantia Incondicional de 90 Dias');
$guarantee_text = mcd_get_field('guarantee_text', 'Se você aplicar o MCD e não perceber melhorias em 90 dias, devolvemos 100% do seu investimento. Sem perguntas. Sem burocracia. O risco é todo nosso.');

// Default anchor items
$default_anchor = array(
    array('label' => 'Sessão com psicólogo especializado em TDAH', 'value' => 'R$ 300-500'),
    array('label' => 'Consulta com psiquiatra', 'value' => 'R$ 400-800'),
    array('label' => 'Curso de produtividade genérico', 'value' => 'R$ 500-2.000'),
    array('label' => 'Anos de tentativa e erro, oportunidades perdidas', 'value' => 'Incalculável'),
);

// Default features
$default_features = array(
    '25 aulas em vídeo',
    '6 módulos estruturados',
    'Materiais de apoio pra cada módulo',
    'Ferramentas práticas pra usar no dia a dia',
    'Todos os bônus inclusos',
    'Acesso vitalício + atualizações',
    'Garantia de 90 dias',
);
?>

<section class="pricing" id="pricing">
    <div class="container">
        <div class="pricing-content">
            <h2 class="fade-in"><?php echo esc_html($title); ?></h2>

            <div class="pricing-anchor fade-in">
                <?php $anchor_list = $anchor_items ?: $default_anchor; ?>
                <?php foreach ($anchor_list as $item) : ?>
                    <div class="pricing-anchor-item">
                        <span><?php echo esc_html($item['label']); ?></span>
                        <span><?php echo esc_html($item['value']); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="pricing-card fade-in">
                <div class="pricing-old"><?php echo esc_html($old_price); ?></div>
                <div class="pricing-current"><?php echo esc_html($current_price); ?></div>
                <div class="pricing-installments"><?php echo esc_html($installments); ?></div>

                <ul class="pricing-features">
                    <?php if ($features) : ?>
                        <?php foreach ($features as $feature) : ?>
                            <li><?php echo esc_html($feature['feature']); ?></li>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <?php foreach ($default_features as $feature) : ?>
                            <li><?php echo esc_html($feature); ?></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>

                <div class="pricing-cta">
                    <a href="<?php echo esc_url($cta_url); ?>" class="btn btn-primary">
                        <?php echo esc_html($cta_text); ?>
                        <span>→</span>
                    </a>
                </div>
            </div>

            <div class="guarantee fade-in">
                <div class="guarantee-icon">🛡️</div>
                <div>
                    <h4><?php echo esc_html($guarantee_title); ?></h4>
                    <p><?php echo esc_html($guarantee_text); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
