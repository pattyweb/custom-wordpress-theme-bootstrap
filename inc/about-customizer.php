<?php

    // Add Kirki section for 'About' including WYSIWYG controls
    Kirki::add_section( 'about_section', array(
        'title'    => esc_html__( 'About Section', 'tempo' ),
        'priority' => 20,
        'active_callback' => 'is_front_page',
    ) );

    // Add Kirki field for displaying the 'About' section
    Kirki::add_field( 'your_theme', array(
        'type'     => 'checkbox',
        'settings' => 'display_about_section',
        'label'    => esc_html__( 'Display About Section', 'tempo' ),
        'section'  => 'about_section',
        'default'  => true,
        'priority' => 21,
    ) );

        // Add Kirki field for 'about_title'
    Kirki::add_field( 'your_theme', array(
        'type'     => 'text',
        'settings' => 'about_title',
        'label'    => esc_html__( 'Title', 'tempo' ),
        'section'  => 'about_section',
        'default'  => esc_html__( 'Add a title', 'tempo' ),
        'priority' => 22,
        'sanitize_callback' => 'wp_kses_post', // Allow all HTML tags
    ) );

            // Add Kirki field for 'about_description'
    Kirki::add_field( 'your_theme', array(
        'type'     => 'textarea',
        'settings' => 'about_description',
        'label'    => esc_html__( 'Description', 'tempo' ),
        'section'  => 'about_section',
        'default'  => esc_html__( 'Add a description', 'tempo' ),
        'priority' => 23,
    ) );

    // Add Kirki field for 'wysiwyg_setting_l'
    Kirki::add_field( 'your_theme', array(
        'type'     => 'editor',
        'settings' => 'wysiwyg_setting_l',
        'label'    => esc_html__( 'WYSIWYG Control for Left Text', 'tempo' ),
        'section'  => 'about_section',
        'default'  => '',
        'priority' => 24,
    ) );

    // Add Kirki field for 'wysiwyg_setting_r'
    Kirki::add_field( 'your_theme', array(
        'type'     => 'editor',
        'settings' => 'wysiwyg_setting_r',
        'label'    => esc_html__( 'WYSIWYG Control for Right Text', 'tempo' ),
        'section'  => 'about_section',
        'default'  => '',
        'priority' => 25,
    ) );

    // Add Kirki field for 'about_button_text'
    Kirki::add_field( 'your_theme', array(
        'type'     => 'text',
        'settings' => 'about_button_text',
        'label'    => esc_html__( 'Button Text', 'tempo' ),
        'section'  => 'about_section',
        'default'  => esc_html__( 'Read More', 'tempo' ),
        'priority' => 26,
    ) );

    // Add Kirki field for 'about_button_link'
    Kirki::add_field( 'your_theme', array(
        'type'     => 'url',
        'settings' => 'about_button_link',
        'label'    => esc_html__( 'Button Link', 'tempo' ),
        'section'  => 'about_section',
        'default'  => '#',
        'priority' => 27,
    ) );





    // Continue with other settings and controls for 'About' section
    // ...




