<?php
function wpdevs_customizer_contact($wp_customize) {
    // Contact Form Section
    $wp_customize->add_section(
        'contact_form_section',
        array(
            'title' => __('Contact Form', 'tempo'),
            'priority' => 90,
            'active_callback' => 'is_front_page',
        )
    );

    // Setting to display the Contact Section
    $wp_customize->add_setting('display_contact_section', array(
        'default' => true,
        'sanitize_callback' => 'sanitize_checkbox',
    ));

    // Control to display the Contact Section
    $wp_customize->add_control('display_contact_section', array(
        'label' => __('Display Contact Section', 'tempo'),
        'section' => 'contact_form_section',
        'type' => 'checkbox',
    ));

    // Setting for contact Description
    $wp_customize->add_setting(
        'contact_title',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'wp_kses_post',
        )
    );

    // Control for contact Description
    $wp_customize->add_control(
        'contact_title',
        array(
            'label' => __('Title', 'tempo'),
            'section' => 'contact_form_section',
            'type' => 'texta',
        )
    );

    // Setting for contact Description
    $wp_customize->add_setting(
        'contact_description',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_textarea_field',
        )
    );

    // Control for contact Description
    $wp_customize->add_control(
        'contact_description',
        array(
            'label' => __('Description', 'tempo'),
            'section' => 'contact_form_section',
            'type' => 'textarea',
        )
    );

    // Setting for contact Location
    $wp_customize->add_setting(
        'contact_location',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_textarea_field',
        )
    );

    // Control for contact Location
    $wp_customize->add_control(
        'contact_location',
        array(
            'label' => __('Location', 'tempo'),
            'section' => 'contact_form_section',
            'type' => 'textarea',
        )
    );

    // Setting for contact email
    $wp_customize->add_setting(
        'contact_email',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Control for contact email
    $wp_customize->add_control(
        'contact_email',
        array(
            'label' => __('Email', 'tempo'),
            'section' => 'contact_form_section',
            'type' => 'text',
        )
    );

    // Setting for contact phone
    $wp_customize->add_setting(
        'contact_phone',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Control for contact phone
    $wp_customize->add_control(
        'contact_phone',
        array(
            'label' => __('Phone', 'tempo'),
            'section' => 'contact_form_section',
            'type' => 'text',
        )
    );

    // Setting for the contact form shortcode
    $wp_customize->add_setting('contact_form_shortcode', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post', // Allow HTML
    ));

    // Control for the contact form shortcode
    $wp_customize->add_control('contact_form_shortcode', array(
        'label' => __('Contact Form', 'tempo'),
        'section' => 'contact_form_section',
        'type' => 'text',
    ));

    // Setting for the custom Google Maps URL
    $wp_customize->add_setting('custom_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw', // Sanitize as a URL
    ));

    // Control for the custom Google Maps URL
    $wp_customize->add_control('custom_url', array(
        'label' => __('Google Maps', 'tempo'),
        'section' => 'contact_form_section',
        'type' => 'textarea',
    ));
}

add_action('customize_register', 'wpdevs_customizer_contact');