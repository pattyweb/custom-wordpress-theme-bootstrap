<?php
function customize_pricing_section($wp_customize) {
    // Pricing Section
    $wp_customize->add_section('pricing_section', array(
        'title' => __('Pricing Section', 'tempo'),
        'priority' => 60,
        'active_callback' => 'is_front_page',
    ));
    
}

add_action('customize_register', 'customize_pricing_section');

// Add setting for displaying the portfolio section
Kirki::add_field('tempo', array(
    'type' => 'checkbox',
    'settings' => 'display_pricing_section',
    'label' => __('Display Pricing Section', 'tempo'),
    'section' => 'pricing_section',
    'default' => true,
));

// Add Setting for pricing Description
Kirki::add_field('tempo', array(
    'type' => 'text',
    'settings' => 'pricing_title',
    'label' => __('Title', 'tempo'),
    'section' => 'pricing_section',
    'default' => '',
    'sanitize_callback' => 'wp_kses_post', // Sanitize as allowed HTML
));

// Add Setting for pricing Description
Kirki::add_field('tempo', array(
    'type' => 'textarea',
    'settings' => 'pricing_description',
    'label' => __('Description', 'tempo'),
    'section' => 'pricing_section',
    'default' => '',
    'sanitize_callback' => 'wp_kses_post', // Sanitize as allowed HTML
));

// Add settings and controls for each pricing plan
for ($i = 1; $i <= 3; $i++) {
    // Plan Name Text Control
    Kirki::add_field('tempo', array(
        'type' => 'text',
        'settings' => "pricing_plan_name_$i",
        'label' => sprintf(__('Pricing Plan %s Name', 'tempo'), $i),
        'section' => 'pricing_section',
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Plan Price Text Control
    Kirki::add_field('tempo', array(
        'type' => 'text',
        'settings' => "pricing_plan_price_$i",
        'label' => sprintf(__('Pricing Plan %s Price', 'tempo'), $i),
        'section' => 'pricing_section',
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Plan Features WYSIWYG Control
    Kirki::add_field('tempo', array(
        'type' => 'editor',
        'settings' => "pricing_plans_features_$i",
        'label' => sprintf(__('Pricing Plan %s Features', 'tempo'), $i),
        'section' => 'pricing_section',
        'default' => '',
        'sanitize_callback' => 'wp_kses_post', // Sanitize as allowed HTML
    ));

    // Buy Now Button Link Text Control
    Kirki::add_field('tempo', array(
        'type' => 'text',
        'settings' => "pricing_plan_button_link_$i",
        'label' => sprintf(__('Pricing Plan %s Buy Now Button Link', 'tempo'), $i),
        'section' => 'pricing_section',
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
}
?>
