<?php
/**
 * The main template file
 *
 * @package MCD_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main class="site-main">
    <div class="container">
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                the_content();
            endwhile;
        else :
            ?>
            <p><?php esc_html_e('Nenhum conteúdo encontrado.', 'mcd-theme'); ?></p>
            <?php
        endif;
        ?>
    </div>
</main>

<?php
get_footer();
