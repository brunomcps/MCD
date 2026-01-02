<?php
/**
 * MCD Theme functions and definitions
 *
 * @package MCD_Theme
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

define('MCD_THEME_VERSION', '1.0.0');
define('MCD_THEME_DIR', get_template_directory());
define('MCD_THEME_URI', get_template_directory_uri());

/**
 * Theme Setup
 */
function mcd_theme_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-width'  => true,
        'flex-height' => true,
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Set up the WordPress core custom background feature
    add_theme_support('custom-background', array(
        'default-color' => '0a0908',
    ));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for Block Styles
    add_theme_support('wp-block-styles');

    // Add support for responsive embedded content
    add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'mcd_theme_setup');

/**
 * Enqueue scripts and styles
 */
function mcd_theme_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'mcd-google-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Source+Sans+Pro:wght@400;600;700&display=swap',
        array(),
        null
    );

    // Main stylesheet
    wp_enqueue_style(
        'mcd-main-style',
        MCD_THEME_URI . '/assets/css/main.css',
        array('mcd-google-fonts'),
        MCD_THEME_VERSION
    );

    // Main script
    wp_enqueue_script(
        'mcd-main-script',
        MCD_THEME_URI . '/assets/js/main.js',
        array(),
        MCD_THEME_VERSION,
        true
    );
}
add_action('wp_enqueue_scripts', 'mcd_theme_scripts');

/**
 * Check if ACF is installed
 */
function mcd_check_acf() {
    if (!class_exists('ACF')) {
        add_action('admin_notices', 'mcd_acf_notice');
    }
}
add_action('admin_init', 'mcd_check_acf');

function mcd_acf_notice() {
    ?>
    <div class="notice notice-error">
        <p><strong>MCD Theme:</strong> Este tema requer o plugin <a href="https://www.advancedcustomfields.com/" target="_blank">Advanced Custom Fields (ACF)</a> para funcionar corretamente. Por favor, instale e ative o plugin.</p>
    </div>
    <?php
}

/**
 * ACF JSON Save Point
 */
function mcd_acf_json_save_point($path) {
    return MCD_THEME_DIR . '/acf-json';
}
add_filter('acf/settings/save_json', 'mcd_acf_json_save_point');

/**
 * ACF JSON Load Point
 */
function mcd_acf_json_load_point($paths) {
    unset($paths[0]);
    $paths[] = MCD_THEME_DIR . '/acf-json';
    return $paths;
}
add_filter('acf/settings/load_json', 'mcd_acf_json_load_point');

/**
 * Register ACF Fields Programmatically
 */
function mcd_register_acf_fields() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    // Hero Section
    acf_add_local_field_group(array(
        'key' => 'group_mcd_hero',
        'title' => 'Seção Hero',
        'fields' => array(
            array(
                'key' => 'field_hero_badge',
                'label' => 'Badge (Texto do Topo)',
                'name' => 'hero_badge',
                'type' => 'text',
                'default_value' => 'Primeiro Protocolo Neurocientífico Brasileiro',
            ),
            array(
                'key' => 'field_hero_title',
                'label' => 'Título Principal',
                'name' => 'hero_title',
                'type' => 'text',
                'default_value' => 'Controle Dopaminérgico em Tempo Real para Adultos com TDAH',
            ),
            array(
                'key' => 'field_hero_title_highlight',
                'label' => 'Texto Destacado no Título',
                'name' => 'hero_title_highlight',
                'type' => 'text',
                'default_value' => 'Tempo Real',
                'instructions' => 'Parte do título que será destacada em amarelo',
            ),
            array(
                'key' => 'field_hero_description',
                'label' => 'Descrição',
                'name' => 'hero_description',
                'type' => 'textarea',
                'default_value' => 'O MCD (Método de Controle Dopaminérgico) é o primeiro protocolo neurocientífico brasileiro que ensina você a monitorar e ajustar sua dopamina no dia a dia — como o diabético faz com a glicose — mesmo que a medicação não tenha resolvido e você nunca tenha mantido uma rotina antes.',
            ),
            array(
                'key' => 'field_hero_guarantee_text',
                'label' => 'Texto da Garantia',
                'name' => 'hero_guarantee_text',
                'type' => 'text',
                'default_value' => 'Garantia de 90 dias: funcionou ou seu dinheiro de volta',
            ),
            array(
                'key' => 'field_hero_cta_primary_text',
                'label' => 'Texto do Botão Principal',
                'name' => 'hero_cta_primary_text',
                'type' => 'text',
                'default_value' => 'Quero Controlar Minha Dopamina',
            ),
            array(
                'key' => 'field_hero_cta_primary_url',
                'label' => 'URL do Botão Principal',
                'name' => 'hero_cta_primary_url',
                'type' => 'url',
                'default_value' => '#pricing',
            ),
            array(
                'key' => 'field_hero_cta_secondary_text',
                'label' => 'Texto do Botão Secundário',
                'name' => 'hero_cta_secondary_text',
                'type' => 'text',
                'default_value' => 'Saiba Mais',
            ),
            array(
                'key' => 'field_hero_cta_secondary_url',
                'label' => 'URL do Botão Secundário',
                'name' => 'hero_cta_secondary_url',
                'type' => 'url',
                'default_value' => '#solution',
            ),
            array(
                'key' => 'field_hero_image',
                'label' => 'Imagem do Hero',
                'name' => 'hero_image',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-mcd-landing.php',
                ),
            ),
        ),
        'menu_order' => 0,
    ));

    // Pain Points Section
    acf_add_local_field_group(array(
        'key' => 'group_mcd_pain_points',
        'title' => 'Seção Pain Points (Dores)',
        'fields' => array(
            array(
                'key' => 'field_pain_title',
                'label' => 'Título da Seção',
                'name' => 'pain_title',
                'type' => 'text',
                'default_value' => 'Você se reconhece em alguma dessas situações?',
            ),
            array(
                'key' => 'field_pain_points',
                'label' => 'Lista de Pain Points',
                'name' => 'pain_points',
                'type' => 'repeater',
                'min' => 1,
                'max' => 12,
                'layout' => 'table',
                'button_label' => 'Adicionar Pain Point',
                'sub_fields' => array(
                    array(
                        'key' => 'field_pain_point_text',
                        'label' => 'Texto',
                        'name' => 'text',
                        'type' => 'text',
                    ),
                ),
            ),
            array(
                'key' => 'field_pain_transition_text',
                'label' => 'Texto de Transição',
                'name' => 'pain_transition_text',
                'type' => 'textarea',
                'default_value' => 'Se você marcou 3 ou mais, continue lendo.',
            ),
            array(
                'key' => 'field_pain_transition_highlight',
                'label' => 'Texto Destacado na Transição',
                'name' => 'pain_transition_highlight',
                'type' => 'text',
                'default_value' => 'O problema não é você. É que ninguém te ensinou a parte mais importante.',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-mcd-landing.php',
                ),
            ),
        ),
        'menu_order' => 1,
    ));

    // Problem Section
    acf_add_local_field_group(array(
        'key' => 'group_mcd_problem',
        'title' => 'Seção Problema',
        'fields' => array(
            array(
                'key' => 'field_problem_title',
                'label' => 'Título',
                'name' => 'problem_title',
                'type' => 'text',
                'default_value' => 'Por que nada funcionou até agora?',
            ),
            array(
                'key' => 'field_problem_description',
                'label' => 'Descrição',
                'name' => 'problem_description',
                'type' => 'textarea',
                'default_value' => 'Você fez o caminho "certo": avaliação neuropsicológica, diagnóstico de TDAH, medicação com psiquiatra, terapia com psicólogo. E mesmo assim... continua no mesmo lugar.',
            ),
            array(
                'key' => 'field_problem_known_label',
                'label' => 'Label - Lado Conhecido',
                'name' => 'problem_known_label',
                'type' => 'text',
                'default_value' => 'O lado que todo mundo conhece',
            ),
            array(
                'key' => 'field_problem_known_title',
                'label' => 'Título - Lado Conhecido',
                'name' => 'problem_known_title',
                'type' => 'text',
                'default_value' => 'O TDAH "oficial"',
            ),
            array(
                'key' => 'field_problem_known_items',
                'label' => 'Itens - Lado Conhecido',
                'name' => 'problem_known_items',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Adicionar Item',
                'sub_fields' => array(
                    array(
                        'key' => 'field_problem_known_item',
                        'label' => 'Item',
                        'name' => 'item',
                        'type' => 'text',
                    ),
                ),
            ),
            array(
                'key' => 'field_problem_known_note',
                'label' => 'Nota - Lado Conhecido',
                'name' => 'problem_known_note',
                'type' => 'text',
                'default_value' => 'É o que está no diagnóstico. É o que a medicação tenta tratar.',
            ),
            array(
                'key' => 'field_problem_hidden_label',
                'label' => 'Label - Lado Oculto',
                'name' => 'problem_hidden_label',
                'type' => 'text',
                'default_value' => 'O lado que ninguém te explicou',
            ),
            array(
                'key' => 'field_problem_hidden_title',
                'label' => 'Título - Lado Oculto',
                'name' => 'problem_hidden_title',
                'type' => 'text',
                'default_value' => 'A Síndrome de Labilidade Dopaminérgica',
            ),
            array(
                'key' => 'field_problem_hidden_items',
                'label' => 'Itens - Lado Oculto',
                'name' => 'problem_hidden_items',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Adicionar Item',
                'sub_fields' => array(
                    array(
                        'key' => 'field_problem_hidden_item',
                        'label' => 'Item',
                        'name' => 'item',
                        'type' => 'text',
                    ),
                ),
            ),
            array(
                'key' => 'field_problem_hidden_note',
                'label' => 'Nota - Lado Oculto',
                'name' => 'problem_hidden_note',
                'type' => 'text',
                'default_value' => 'É esse segundo lado que o diagnóstico não resolve e a medicação sozinha não estabiliza.',
            ),
            array(
                'key' => 'field_sld_title',
                'label' => 'SLD - Título',
                'name' => 'sld_title',
                'type' => 'text',
                'default_value' => 'O que é a Síndrome de Labilidade Dopaminérgica (SLD)?',
            ),
            array(
                'key' => 'field_sld_description',
                'label' => 'SLD - Descrição',
                'name' => 'sld_description',
                'type' => 'textarea',
                'default_value' => 'Você não tem simplesmente "falta de dopamina". Você tem labilidade dopaminérgica — sua dopamina oscila, flutua, não se mantém estável.',
            ),
            array(
                'key' => 'field_sld_symptoms',
                'label' => 'SLD - Sintomas',
                'name' => 'sld_symptoms',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Adicionar Sintoma',
                'sub_fields' => array(
                    array(
                        'key' => 'field_sld_symptom',
                        'label' => 'Sintoma',
                        'name' => 'symptom',
                        'type' => 'text',
                    ),
                ),
            ),
            array(
                'key' => 'field_sld_conclusion',
                'label' => 'SLD - Conclusão',
                'name' => 'sld_conclusion',
                'type' => 'text',
                'default_value' => 'Isso não é falta de força de vontade. É um sistema instável que ninguém te ensinou a estabilizar.',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-mcd-landing.php',
                ),
            ),
        ),
        'menu_order' => 2,
    ));

    // Analogy Section
    acf_add_local_field_group(array(
        'key' => 'group_mcd_analogy',
        'title' => 'Seção Analogia (Diabético)',
        'fields' => array(
            array(
                'key' => 'field_analogy_title',
                'label' => 'Título',
                'name' => 'analogy_title',
                'type' => 'text',
                'default_value' => 'O diabético sabe. Você não sabe.',
            ),
            array(
                'key' => 'field_analogy_description',
                'label' => 'Descrição',
                'name' => 'analogy_description',
                'type' => 'textarea',
                'default_value' => 'O diabético também tem labilidade — da glicose. O açúcar no sangue dele oscila, sobe e desce, não se mantém estável sozinho. Por isso ele não sai do consultório só com diagnóstico e receita.',
            ),
            array(
                'key' => 'field_analogy_diabetic_title',
                'label' => 'Título - Diabético',
                'name' => 'analogy_diabetic_title',
                'type' => 'text',
                'default_value' => 'O Diabético',
            ),
            array(
                'key' => 'field_analogy_diabetic_items',
                'label' => 'Itens - Diabético',
                'name' => 'analogy_diabetic_items',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Adicionar Item',
                'sub_fields' => array(
                    array(
                        'key' => 'field_analogy_diabetic_item',
                        'label' => 'Item',
                        'name' => 'item',
                        'type' => 'text',
                    ),
                ),
            ),
            array(
                'key' => 'field_analogy_tdah_title',
                'label' => 'Título - TDAH',
                'name' => 'analogy_tdah_title',
                'type' => 'text',
                'default_value' => 'Você com TDAH',
            ),
            array(
                'key' => 'field_analogy_tdah_items',
                'label' => 'Itens - TDAH',
                'name' => 'analogy_tdah_items',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Adicionar Item',
                'sub_fields' => array(
                    array(
                        'key' => 'field_analogy_tdah_item',
                        'label' => 'Item',
                        'name' => 'item',
                        'type' => 'text',
                    ),
                ),
            ),
            array(
                'key' => 'field_analogy_insight',
                'label' => 'Insight Final',
                'name' => 'analogy_insight',
                'type' => 'text',
                'default_value' => 'O diabético sai sabendo o que fazer. Você saiu só com o diagnóstico e a receita.',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-mcd-landing.php',
                ),
            ),
        ),
        'menu_order' => 3,
    ));

    // Gap Section
    acf_add_local_field_group(array(
        'key' => 'group_mcd_gap',
        'title' => 'Seção Gap (Profissionais)',
        'fields' => array(
            array(
                'key' => 'field_gap_title',
                'label' => 'Título',
                'name' => 'gap_title',
                'type' => 'text',
                'default_value' => 'O que cada profissional fez — e o que deixou de fazer',
            ),
            array(
                'key' => 'field_gap_description',
                'label' => 'Descrição',
                'name' => 'gap_description',
                'type' => 'text',
                'default_value' => 'Cada um fez sua parte. Mas faltou uma peça fundamental.',
            ),
            array(
                'key' => 'field_gap_cards',
                'label' => 'Cards de Profissionais',
                'name' => 'gap_cards',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Adicionar Card',
                'sub_fields' => array(
                    array(
                        'key' => 'field_gap_card_icon',
                        'label' => 'Ícone (Emoji)',
                        'name' => 'icon',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_gap_card_title',
                        'label' => 'Título',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_gap_card_good',
                        'label' => 'O que fez bem',
                        'name' => 'good',
                        'type' => 'textarea',
                    ),
                    array(
                        'key' => 'field_gap_card_bad',
                        'label' => 'O que faltou',
                        'name' => 'bad',
                        'type' => 'textarea',
                    ),
                    array(
                        'key' => 'field_gap_card_result',
                        'label' => 'Resultado',
                        'name' => 'result',
                        'type' => 'text',
                    ),
                ),
            ),
            array(
                'key' => 'field_gap_conclusion',
                'label' => 'Conclusão',
                'name' => 'gap_conclusion',
                'type' => 'textarea',
                'default_value' => 'Resultado: Você ficou com diagnóstico, receita e escuta — mas não sabe o que fazer com a labilidade dopaminérgica no dia a dia.',
            ),
            array(
                'key' => 'field_gap_highlight',
                'label' => 'Texto Destacado',
                'name' => 'gap_highlight',
                'type' => 'text',
                'default_value' => 'Esse é o gap. E esse é exatamente o gap que o MCD preenche.',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-mcd-landing.php',
                ),
            ),
        ),
        'menu_order' => 4,
    ));

    // Solution Section
    acf_add_local_field_group(array(
        'key' => 'group_mcd_solution',
        'title' => 'Seção Solução (6 Pilares)',
        'fields' => array(
            array(
                'key' => 'field_solution_title',
                'label' => 'Título',
                'name' => 'solution_title',
                'type' => 'text',
                'default_value' => 'A Solução: Método de Controle Dopaminérgico',
            ),
            array(
                'key' => 'field_solution_description',
                'label' => 'Descrição',
                'name' => 'solution_description',
                'type' => 'textarea',
                'default_value' => 'O MCD é o primeiro protocolo neurocientífico brasileiro que ensina adultos com TDAH a fazer com sua dopamina o que o diabético faz com a glicose: monitorar e ajustar, todo dia, na prática.',
            ),
            array(
                'key' => 'field_solution_pillars_title',
                'label' => 'Título dos Pilares',
                'name' => 'solution_pillars_title',
                'type' => 'text',
                'default_value' => 'Os 6 Pilares do MCD',
            ),
            array(
                'key' => 'field_solution_pillars',
                'label' => 'Pilares',
                'name' => 'solution_pillars',
                'type' => 'repeater',
                'min' => 6,
                'max' => 6,
                'layout' => 'block',
                'button_label' => 'Adicionar Pilar',
                'sub_fields' => array(
                    array(
                        'key' => 'field_pillar_icon',
                        'label' => 'Ícone (Emoji)',
                        'name' => 'icon',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_pillar_title',
                        'label' => 'Título',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_pillar_question',
                        'label' => 'Pergunta',
                        'name' => 'question',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_pillar_description',
                        'label' => 'Descrição',
                        'name' => 'description',
                        'type' => 'textarea',
                    ),
                ),
            ),
            array(
                'key' => 'field_solution_promise_title',
                'label' => 'Título da Promessa',
                'name' => 'solution_promise_title',
                'type' => 'text',
                'default_value' => '◆ A Promessa do MCD ◆',
            ),
            array(
                'key' => 'field_solution_promise_text',
                'label' => 'Texto da Promessa',
                'name' => 'solution_promise_text',
                'type' => 'textarea',
                'default_value' => 'Você vai sair sabendo o que fazer com sua dopamina — todo dia, na prática, com ferramentas. Assim como o diabético sabe o que fazer com a glicose.',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-mcd-landing.php',
                ),
            ),
        ),
        'menu_order' => 5,
    ));

    // Modules Section
    acf_add_local_field_group(array(
        'key' => 'group_mcd_modules',
        'title' => 'Seção Módulos',
        'fields' => array(
            array(
                'key' => 'field_modules_title',
                'label' => 'Título',
                'name' => 'modules_title',
                'type' => 'text',
                'default_value' => 'O que você recebe no MCD',
            ),
            array(
                'key' => 'field_modules_description',
                'label' => 'Descrição',
                'name' => 'modules_description',
                'type' => 'text',
                'default_value' => 'Um programa completo e estruturado com tudo que você precisa para controlar sua dopamina.',
            ),
            array(
                'key' => 'field_modules_list',
                'label' => 'Lista de Módulos',
                'name' => 'modules_list',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Adicionar Módulo',
                'sub_fields' => array(
                    array(
                        'key' => 'field_module_number',
                        'label' => 'Número',
                        'name' => 'number',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_module_title',
                        'label' => 'Título',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_module_description',
                        'label' => 'Descrição',
                        'name' => 'description',
                        'type' => 'textarea',
                    ),
                    array(
                        'key' => 'field_module_lessons',
                        'label' => 'Número de Aulas',
                        'name' => 'lessons',
                        'type' => 'text',
                    ),
                ),
            ),
            array(
                'key' => 'field_bonus_title',
                'label' => 'Título Bônus',
                'name' => 'bonus_title',
                'type' => 'text',
                'default_value' => 'Bônus Inclusos',
            ),
            array(
                'key' => 'field_bonus_list',
                'label' => 'Lista de Bônus',
                'name' => 'bonus_list',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Adicionar Bônus',
                'sub_fields' => array(
                    array(
                        'key' => 'field_bonus_icon',
                        'label' => 'Ícone (Emoji)',
                        'name' => 'icon',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_bonus_item_title',
                        'label' => 'Título',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_bonus_description',
                        'label' => 'Descrição',
                        'name' => 'description',
                        'type' => 'textarea',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-mcd-landing.php',
                ),
            ),
        ),
        'menu_order' => 6,
    ));

    // Authority Section
    acf_add_local_field_group(array(
        'key' => 'group_mcd_authority',
        'title' => 'Seção Autoridade (Dr. Bruno)',
        'fields' => array(
            array(
                'key' => 'field_authority_name',
                'label' => 'Nome',
                'name' => 'authority_name',
                'type' => 'text',
                'default_value' => 'Dr. Bruno Salles',
            ),
            array(
                'key' => 'field_authority_crp',
                'label' => 'CRP',
                'name' => 'authority_crp',
                'type' => 'text',
                'default_value' => 'CRP: 05/52904',
            ),
            array(
                'key' => 'field_authority_image',
                'label' => 'Foto',
                'name' => 'authority_image',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
            ),
            array(
                'key' => 'field_authority_credentials',
                'label' => 'Credenciais',
                'name' => 'authority_credentials',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Adicionar Credencial',
                'sub_fields' => array(
                    array(
                        'key' => 'field_authority_credential',
                        'label' => 'Credencial',
                        'name' => 'credential',
                        'type' => 'text',
                    ),
                ),
            ),
            array(
                'key' => 'field_authority_quote',
                'label' => 'Citação',
                'name' => 'authority_quote',
                'type' => 'textarea',
                'default_value' => 'Depois de mais de 10.000 atendimentos, eu percebi um padrão: as pessoas chegavam com diagnóstico, medicação, terapia — e continuavam travadas. Faltava uma peça. Elas não sabiam o que fazer com a dopamina delas no dia a dia. Ninguém tinha ensinado. Foi pra preencher esse gap que eu criei o MCD.',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-mcd-landing.php',
                ),
            ),
        ),
        'menu_order' => 7,
    ));

    // Testimonials Section
    acf_add_local_field_group(array(
        'key' => 'group_mcd_testimonials',
        'title' => 'Seção Depoimentos',
        'fields' => array(
            array(
                'key' => 'field_testimonials_title',
                'label' => 'Título',
                'name' => 'testimonials_title',
                'type' => 'text',
                'default_value' => 'O que dizem os alunos',
            ),
            array(
                'key' => 'field_testimonials_list',
                'label' => 'Depoimentos',
                'name' => 'testimonials_list',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Adicionar Depoimento',
                'sub_fields' => array(
                    array(
                        'key' => 'field_testimonial_text',
                        'label' => 'Texto',
                        'name' => 'text',
                        'type' => 'textarea',
                    ),
                    array(
                        'key' => 'field_testimonial_name',
                        'label' => 'Nome',
                        'name' => 'name',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_testimonial_role',
                        'label' => 'Profissão/Idade',
                        'name' => 'role',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_testimonial_initials',
                        'label' => 'Iniciais (Avatar)',
                        'name' => 'initials',
                        'type' => 'text',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-mcd-landing.php',
                ),
            ),
        ),
        'menu_order' => 8,
    ));

    // FAQ Section
    acf_add_local_field_group(array(
        'key' => 'group_mcd_faq',
        'title' => 'Seção FAQ',
        'fields' => array(
            array(
                'key' => 'field_faq_title',
                'label' => 'Título',
                'name' => 'faq_title',
                'type' => 'text',
                'default_value' => 'Perguntas Frequentes',
            ),
            array(
                'key' => 'field_faq_list',
                'label' => 'Perguntas e Respostas',
                'name' => 'faq_list',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Adicionar Pergunta',
                'sub_fields' => array(
                    array(
                        'key' => 'field_faq_question',
                        'label' => 'Pergunta',
                        'name' => 'question',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_faq_answer',
                        'label' => 'Resposta',
                        'name' => 'answer',
                        'type' => 'textarea',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-mcd-landing.php',
                ),
            ),
        ),
        'menu_order' => 9,
    ));

    // Pricing Section
    acf_add_local_field_group(array(
        'key' => 'group_mcd_pricing',
        'title' => 'Seção Preços',
        'fields' => array(
            array(
                'key' => 'field_pricing_title',
                'label' => 'Título',
                'name' => 'pricing_title',
                'type' => 'text',
                'default_value' => 'Quanto custa ter controle sobre sua dopamina?',
            ),
            array(
                'key' => 'field_pricing_anchor_items',
                'label' => 'Itens de Comparação (Âncora de Preço)',
                'name' => 'pricing_anchor_items',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Adicionar Item',
                'sub_fields' => array(
                    array(
                        'key' => 'field_pricing_anchor_label',
                        'label' => 'Descrição',
                        'name' => 'label',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_pricing_anchor_value',
                        'label' => 'Valor',
                        'name' => 'value',
                        'type' => 'text',
                    ),
                ),
            ),
            array(
                'key' => 'field_pricing_old_price',
                'label' => 'Preço Antigo',
                'name' => 'pricing_old_price',
                'type' => 'text',
                'default_value' => 'De R$ 1.497',
            ),
            array(
                'key' => 'field_pricing_current_price',
                'label' => 'Preço Atual',
                'name' => 'pricing_current_price',
                'type' => 'text',
                'default_value' => 'R$ 997',
            ),
            array(
                'key' => 'field_pricing_installments',
                'label' => 'Parcelamento',
                'name' => 'pricing_installments',
                'type' => 'text',
                'default_value' => 'ou 12x de R$ 97,07',
            ),
            array(
                'key' => 'field_pricing_features',
                'label' => 'Features Incluídas',
                'name' => 'pricing_features',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Adicionar Feature',
                'sub_fields' => array(
                    array(
                        'key' => 'field_pricing_feature',
                        'label' => 'Feature',
                        'name' => 'feature',
                        'type' => 'text',
                    ),
                ),
            ),
            array(
                'key' => 'field_pricing_cta_text',
                'label' => 'Texto do Botão',
                'name' => 'pricing_cta_text',
                'type' => 'text',
                'default_value' => 'Quero Controlar Minha Dopamina',
            ),
            array(
                'key' => 'field_pricing_cta_url',
                'label' => 'URL do Botão',
                'name' => 'pricing_cta_url',
                'type' => 'url',
            ),
            array(
                'key' => 'field_guarantee_title',
                'label' => 'Título da Garantia',
                'name' => 'guarantee_title',
                'type' => 'text',
                'default_value' => 'Garantia Incondicional de 90 Dias',
            ),
            array(
                'key' => 'field_guarantee_text',
                'label' => 'Texto da Garantia',
                'name' => 'guarantee_text',
                'type' => 'textarea',
                'default_value' => 'Se você aplicar o MCD e não perceber melhorias em 90 dias, devolvemos 100% do seu investimento. Sem perguntas. Sem burocracia. O risco é todo nosso.',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-mcd-landing.php',
                ),
            ),
        ),
        'menu_order' => 10,
    ));

    // Final CTA Section
    acf_add_local_field_group(array(
        'key' => 'group_mcd_final_cta',
        'title' => 'Seção CTA Final',
        'fields' => array(
            array(
                'key' => 'field_final_title',
                'label' => 'Título',
                'name' => 'final_title',
                'type' => 'text',
                'default_value' => 'A decisão é sua',
            ),
            array(
                'key' => 'field_final_old_title',
                'label' => 'Título - Opção Antiga',
                'name' => 'final_old_title',
                'type' => 'text',
                'default_value' => 'Continuar como está:',
            ),
            array(
                'key' => 'field_final_old_items',
                'label' => 'Itens - Opção Antiga',
                'name' => 'final_old_items',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Adicionar Item',
                'sub_fields' => array(
                    array(
                        'key' => 'field_final_old_item',
                        'label' => 'Item',
                        'name' => 'item',
                        'type' => 'text',
                    ),
                ),
            ),
            array(
                'key' => 'field_final_new_title',
                'label' => 'Título - Opção Nova',
                'name' => 'final_new_title',
                'type' => 'text',
                'default_value' => 'Aprender o que fazer:',
            ),
            array(
                'key' => 'field_final_new_items',
                'label' => 'Itens - Opção Nova',
                'name' => 'final_new_items',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Adicionar Item',
                'sub_fields' => array(
                    array(
                        'key' => 'field_final_new_item',
                        'label' => 'Item',
                        'name' => 'item',
                        'type' => 'text',
                    ),
                ),
            ),
            array(
                'key' => 'field_final_highlight',
                'label' => 'Frase de Destaque',
                'name' => 'final_highlight',
                'type' => 'textarea',
                'default_value' => '"O diabético não espera. Ele aprende a controlar a glicose. Você também pode aprender a controlar sua dopamina."',
            ),
            array(
                'key' => 'field_final_note',
                'label' => 'Nota Final',
                'name' => 'final_note',
                'type' => 'text',
                'default_value' => 'Garantia de 90 dias · Acesso vitalício · Pagamento seguro',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-mcd-landing.php',
                ),
            ),
        ),
        'menu_order' => 11,
    ));

    // Footer Section
    acf_add_local_field_group(array(
        'key' => 'group_mcd_footer',
        'title' => 'Rodapé',
        'fields' => array(
            array(
                'key' => 'field_footer_logo',
                'label' => 'Logo/Nome',
                'name' => 'footer_logo',
                'type' => 'text',
                'default_value' => 'Dr. Bruno Salles',
            ),
            array(
                'key' => 'field_footer_tagline',
                'label' => 'Tagline',
                'name' => 'footer_tagline',
                'type' => 'text',
                'default_value' => 'Ciência · Propósito · Lucidez',
            ),
            array(
                'key' => 'field_footer_copyright',
                'label' => 'Copyright',
                'name' => 'footer_copyright',
                'type' => 'textarea',
                'default_value' => '© 2025 Dr. Bruno Salles. Todos os direitos reservados.',
            ),
            array(
                'key' => 'field_footer_cnpj',
                'label' => 'CNPJ',
                'name' => 'footer_cnpj',
                'type' => 'text',
                'default_value' => 'CNPJ: XX.XXX.XXX/XXXX-XX',
            ),
            array(
                'key' => 'field_footer_links',
                'label' => 'Links do Rodapé',
                'name' => 'footer_links',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Adicionar Link',
                'sub_fields' => array(
                    array(
                        'key' => 'field_footer_link_text',
                        'label' => 'Texto',
                        'name' => 'text',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_footer_link_url',
                        'label' => 'URL',
                        'name' => 'url',
                        'type' => 'url',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-mcd-landing.php',
                ),
            ),
        ),
        'menu_order' => 12,
    ));
}
add_action('acf/init', 'mcd_register_acf_fields');

/**
 * Helper function to get field with default value
 */
function mcd_get_field($field_name, $default = '') {
    $value = get_field($field_name);
    return $value ? $value : $default;
}

/**
 * Helper function to highlight text in title
 */
function mcd_highlight_text($text, $highlight) {
    if (empty($highlight)) {
        return $text;
    }
    return str_replace($highlight, '<span class="highlight">' . $highlight . '</span>', $text);
}
