<?php
/**
 * Template Part: Final CTA Section
 *
 * @package MCD_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

$title = mcd_get_field('final_title', 'A decisão é sua');
$old_title = mcd_get_field('final_old_title', 'Continuar como está:');
$old_items = get_field('final_old_items');
$new_title = mcd_get_field('final_new_title', 'Aprender o que fazer:');
$new_items = get_field('final_new_items');
$highlight = mcd_get_field('final_highlight', '"O diabético não espera. Ele aprende a controlar a glicose. Você também pode aprender a controlar sua dopamina."');
$note = mcd_get_field('final_note', 'Garantia de 90 dias · Acesso vitalício · Pagamento seguro');

// Get CTA info from pricing
$cta_text = mcd_get_field('pricing_cta_text', 'Quero Controlar Minha Dopamina');
$cta_url = mcd_get_field('pricing_cta_url', '#pricing');

// Default items
$default_old = array(
    'Esperando que o diagnóstico resolva',
    'Esperando que a medicação faça tudo',
    'Esperando a próxima rotina funcionar',
    'Se perguntando se é TDAH ou preguiça',
);

$default_new = array(
    'Entender seu sistema dopaminérgico',
    'Saber identificar onde você está',
    'Ter ferramentas pra ajustar no momento',
    'Ter um plano quando tudo colapsa',
);
?>

<section class="final-cta">
    <div class="container">
        <div class="final-cta-content">
            <h2 class="fade-in"><?php echo esc_html($title); ?></h2>

            <div class="final-options fade-in">
                <div class="final-option old">
                    <h4><?php echo esc_html($old_title); ?></h4>
                    <ul>
                        <?php $old_list = $old_items ?: $default_old; ?>
                        <?php foreach ($old_list as $item) : ?>
                            <li><?php echo esc_html(is_array($item) ? $item['item'] : $item); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="final-option new">
                    <h4><?php echo esc_html($new_title); ?></h4>
                    <ul>
                        <?php $new_list = $new_items ?: $default_new; ?>
                        <?php foreach ($new_list as $item) : ?>
                            <li><?php echo esc_html(is_array($item) ? $item['item'] : $item); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <p class="final-highlight fade-in"><?php echo nl2br(esc_html($highlight)); ?></p>

            <div class="final-buttons fade-in">
                <a href="<?php echo esc_url($cta_url); ?>" class="btn btn-primary">
                    <?php echo esc_html($cta_text); ?>
                    <span>→</span>
                </a>
                <p class="final-note"><?php echo esc_html($note); ?></p>
            </div>
        </div>
    </div>
</section>
