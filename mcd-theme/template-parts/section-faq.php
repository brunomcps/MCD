<?php
/**
 * Template Part: FAQ Section
 *
 * @package MCD_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

$title = mcd_get_field('faq_title', 'Perguntas Frequentes');
$faqs = get_field('faq_list');

// Default FAQs
$default_faqs = array(
    array(
        'question' => 'Já tentei vários métodos e nenhum funcionou. Por que o MCD seria diferente?',
        'answer' => 'Porque o MCD não é um método de produtividade genérico adaptado pro TDAH. É um protocolo neurocientífico criado especificamente pra tratar a Labilidade Dopaminérgica — o mecanismo que os outros métodos ignoram. Você não vai aprender "dicas de organização". Vai aprender a operar seu sistema dopaminérgico.',
    ),
    array(
        'question' => 'Preciso ter diagnóstico de TDAH pra fazer o MCD?',
        'answer' => 'O MCD foi criado pra adultos com TDAH diagnosticado. Se você ainda não tem diagnóstico mas se identifica fortemente com os sintomas, o conteúdo pode ajudar, mas recomendamos buscar avaliação profissional em paralelo.',
    ),
    array(
        'question' => 'O MCD substitui a medicação?',
        'answer' => 'Não. O MCD complementa a medicação. A medicação ajuda a estabilizar o sistema, mas não ensina o que fazer no dia a dia. O MCD ensina. Juntos, funcionam melhor do que qualquer um sozinho.',
    ),
    array(
        'question' => 'Quanto tempo preciso dedicar por dia?',
        'answer' => 'As aulas são curtas (10-20 minutos). O mais importante é a aplicação prática, que se integra ao seu dia a dia. Não é mais uma tarefa — é um sistema de operar sua vida.',
    ),
    array(
        'question' => 'E se não funcionar pra mim?',
        'answer' => 'Você tem 90 dias de garantia. Se aplicar o método e não perceber melhorias, devolvemos 100% do seu investimento. Sem perguntas, sem burocracia.',
    ),
    array(
        'question' => 'Por quanto tempo tenho acesso?',
        'answer' => 'Acesso vitalício. O conteúdo é seu pra sempre, incluindo atualizações futuras.',
    ),
);
?>

<section class="faq">
    <div class="container">
        <div class="section-header fade-in">
            <h2><?php echo esc_html($title); ?></h2>
        </div>

        <div class="faq-list">
            <?php $faq_list = $faqs ?: $default_faqs; ?>
            <?php foreach ($faq_list as $faq) : ?>
                <div class="faq-item fade-in">
                    <button class="faq-question">
                        <span><?php echo esc_html($faq['question']); ?></span>
                        <span class="faq-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <?php echo esc_html($faq['answer']); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
