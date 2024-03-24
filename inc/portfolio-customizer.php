<?php
function customize_register_portfolio_settings($wp_customize) {
    // Add section for portfolio settings
    $wp_customize->add_section('portfolio_settings', array(
        'title' => __('Portfolio Settings', 'tempo'),
        'priority' => 50,
        'active_callback' => 'is_front_page',
    ));

    // Add setting for displaying the portfolio section
    $wp_customize->add_setting('display_portfolio_section', array(
        'default' => true, // Default to display the section
        'sanitize_callback' => 'sanitize_checkbox',
    ));

    // Add control for displaying the portfolio section
    $wp_customize->add_control('display_portfolio_section', array(
        'label' => __('Display Portfolio Section', 'tempo'),
        'section' => 'portfolio_settings',
        'type' => 'checkbox',
    ));

     // Add Setting for portfolio Description
     $wp_customize->add_setting(
        'portfolio_title',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'wp_kses_post',
        )
    );

    // Add Control for portfolio Description
    $wp_customize->add_control(
        'portfolio_title',
        array(
            'label' => __('Title', 'tempo'),
            'section' => 'portfolio_settings',
            'type' => 'text',
        )
    );

    // Add Setting for portfolio Description
    $wp_customize->add_setting(
        'portfolio_description',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_textarea_field',
        )
    );

    // Add Control for portfolio Description
    $wp_customize->add_control(
        'portfolio_description',
        array(
            'label' => __('Description', 'tempo'),
            'section' => 'portfolio_settings',
            'type' => 'textarea',
        )
    );

    // Add setting for selected portfolio categories
    $wp_customize->add_setting('selected_portfolio_categories', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Add control for selected portfolio categories
    $wp_customize->add_control('selected_portfolio_categories', array(
        'label' => __('Selected Portfolio Categories (separate by name and comma)', 'tempo'),
        'section' => 'portfolio_settings',
        'type' => 'text',
    ));
}


add_action('customize_register', 'customize_register_portfolio_settings');

// Sanitize checkbox value
function sanitize_checkbox($input) {
    return (bool) $input;
}
