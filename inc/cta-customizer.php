<?php
function wpdevs_customizer_cta( $wp_customize ) {

    // Add CTA Section
    $wp_customize->add_section(
        'sec_cta',
        array(
            'title' => __('Call To Action', 'tempo'),
            'priority' => 40,
            'active_callback' => 'is_front_page',
        )
    );

    // Add setting for displaying the CTA section
    $wp_customize->add_setting('display_cta_section', array(
        'default' => true,
        'sanitize_callback' => 'sanitize_checkbox',
    ));

    // Add control for displaying the CTA section
    $wp_customize->add_control('display_cta_section', array(
        'label' => __('Display CTA Section', 'tempo'),
        'section' => 'sec_cta',
        'type' => 'checkbox',
    ));

    // Add Setting for CTA Image
    $wp_customize->add_setting(
        'cta_image',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    // Add Control for CTA Image
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize,
        'cta_image',
        array(
            'label' => __('Background Image', 'tempo'),
            'section' => 'sec_cta',
            'settings' => 'cta_image',
        )
    ));

    // Add Setting for CTA Title
    $wp_customize->add_setting(
        'cta_title',
        array(
            'type' => 'theme_mod',
            'default' => __('Call To Action', 'tempo'),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Add Control for CTA Title
    $wp_customize->add_control(
        'cta_title',
        array(
            'label' => __('Title', 'tempo'),
            'section' => 'sec_cta',
            'type' => 'text',
        )
    );

    // Add Setting for CTA Description
    $wp_customize->add_setting(
        'cta_description',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_textarea_field',
        )
    );

    // Add Control for CTA Description
    $wp_customize->add_control(
        'cta_description',
        array(
            'label' => __('Description', 'tempo'),
            'section' => 'sec_cta',
            'type' => 'textarea',
        )
    );

    // Add Setting for CTA Button Text
    $wp_customize->add_setting(
        'cta_button_text',
        array(
            'type' => 'theme_mod',
            'default' => __('Call To Action', 'tempo'),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Add Control for CTA Button Text
    $wp_customize->add_control(
        'cta_button_text',
        array(
            'label' => __('Button Text', 'tempo'),
            'section' => 'sec_cta',
            'type' => 'text',
        )
    );

    // Add Setting for CTA Button Link
    $wp_customize->add_setting(
        'cta_button_link',
        array(
            'type' => 'theme_mod',
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    // Add Control for CTA Button Link
    $wp_customize->add_control(
        'cta_button_link',
        array(
            'label' => __('Button Link', 'tempo'),
            'section' => 'sec_cta',
            'type' => 'url',
        )
    );

}
add_action( 'customize_register', 'wpdevs_customizer_cta' );


