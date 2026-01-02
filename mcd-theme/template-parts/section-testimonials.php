<?php
/**
 * Template Part: Testimonials Section
 *
 * @package MCD_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

$title = mcd_get_field('testimonials_title', 'O que dizem os alunos');
$testimonials = get_field('testimonials_list');

// Default testimonials
$default_testimonials = array(
    array(
        'text' => 'Eu achava que meu caso era grave demais. Depois do MCD, finalmente entendi que não era eu — era um sistema que ninguém tinha me ensinado a operar. Hoje sei exatamente o que fazer quando a dopamina cai.',
        'name' => 'Mariana C.',
        'role' => 'Advogada, 34 anos',
        'initials' => 'MC',
    ),
    array(
        'text' => 'Já tinha tentado de tudo: apps, rotinas, coaching. Nada durava. O MCD foi diferente porque finalmente entendi o PORQUÊ das coisas. E aí consegui fazer funcionar.',
        'name' => 'Rafael F.',
        'role' => 'Designer, 29 anos',
        'initials' => 'RF',
    ),
    array(
        'text' => 'A analogia com o diabético mudou minha vida. Parei de me culpar e comecei a me cuidar. Simples assim. Agora tenho um sistema, não dependo mais só de força de vontade.',
        'name' => 'Patricia T.',
        'role' => 'Empreendedora, 41 anos',
        'initials' => 'PT',
    ),
);
?>

<section class="testimonials">
    <div class="container">
        <div class="section-header fade-in">
            <h2><?php echo esc_html($title); ?></h2>
        </div>

        <div class="testimonials-grid">
            <?php $testimonial_list = $testimonials ?: $default_testimonials; ?>
            <?php foreach ($testimonial_list as $testimonial) : ?>
                <div class="testimonial-card fade-in">
                    <p class="testimonial-text">"<?php echo esc_html($testimonial['text']); ?>"</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar"><?php echo esc_html($testimonial['initials']); ?></div>
                        <div>
                            <div class="testimonial-name"><?php echo esc_html($testimonial['name']); ?></div>
                            <div class="testimonial-role"><?php echo esc_html($testimonial['role']); ?></div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
