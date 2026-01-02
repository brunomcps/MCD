<?php
/**
 * Template Name: MCD Landing Page
 *
 * Template for the MCD landing page with all editable sections.
 * All content is managed through ACF (Advanced Custom Fields).
 *
 * @package MCD_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

// Hero Section
get_template_part('template-parts/section', 'hero');

// Pain Points Section
get_template_part('template-parts/section', 'pain-points');

// Problem Section
get_template_part('template-parts/section', 'problem');

// Analogy Section (Diabetic Comparison)
get_template_part('template-parts/section', 'analogy');

// Gap Section (Professionals)
get_template_part('template-parts/section', 'gap');

// Solution Section (6 Pillars)
get_template_part('template-parts/section', 'solution');

// Modules Section
get_template_part('template-parts/section', 'modules');

// Authority Section (Dr. Bruno)
get_template_part('template-parts/section', 'authority');

// Testimonials Section
get_template_part('template-parts/section', 'testimonials');

// FAQ Section
get_template_part('template-parts/section', 'faq');

// Pricing Section
get_template_part('template-parts/section', 'pricing');

// Final CTA Section
get_template_part('template-parts/section', 'final-cta');

get_footer();
