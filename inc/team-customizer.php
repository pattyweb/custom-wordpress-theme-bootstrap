<?php
function customize_team_section($wp_customize) {
    // Team Section
    $wp_customize->add_section('team_section', array(
        'title' => __('Team Section', 'tempo'),
        'priority' => 80,
        'active_callback' => 'is_front_page',
    ));

    // Add setting for displaying the portfolio section
    $wp_customize->add_setting('display_team_section', array(
        'default' => true, // Default to display the section
        'sanitize_callback' => 'sanitize_checkbox',
    ));

    // Add control for displaying the portfolio section
    $wp_customize->add_control('display_team_section', array(
        'label' => __('Display Team Section', 'tempo'),
        'section' => 'team_section',
        'type' => 'checkbox',
    ));

    // Add Setting for team Description
    $wp_customize->add_setting(
        'team_title',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'wp_kses_post',
        )
    );

    // Add Control for team Description
    $wp_customize->add_control(
        'team_title',
        array(
            'label' => __('Title', 'tempo'),
            'section' => 'team_section',
            'type' => 'text',
        )
    );

    // Add Setting for team Description
    $wp_customize->add_setting(
        'team_description',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_textarea_field',
        )
    );

    // Add Control for team Description
    $wp_customize->add_control(
        'team_description',
        array(
            'label' => __('Description', 'tempo'),
            'section' => 'team_section',
            'type' => 'textarea',
        )
    );

     // Add settings and controls for each team member (you may adjust these as needed)
     for ($i = 1; $i <= 4; $i++) {
        // Image Upload Control
        $wp_customize->add_setting("team_member_image_$i", array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "team_member_image_$i", array(
            'label' => sprintf(__('Team Member %s Image', 'tempo'), $i),
            'section' => 'team_section',
            'settings' => "team_member_image_$i",
        )));

        // Name Text Control
        $wp_customize->add_setting("team_member_name_$i", array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("team_member_name_$i", array(
            'label' => sprintf(__('Team Member %s Name', 'tempo'), $i),
            'section' => 'team_section',
            'type' => 'text',
        ));

        // Role Text Control
        $wp_customize->add_setting("team_member_role_$i", array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("team_member_role_$i", array(
            'label' => sprintf(__('Team Member %s Role', 'tempo'), $i),
            'section' => 'team_section',
            'type' => 'text',
        ));

        // Facebook URL Text Control
        $wp_customize->add_setting("team_member_facebook_$i", array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("team_member_facebook_$i", array(
            'label' => sprintf(__('Team Member %s Facebook URL', 'tempo'), $i),
            'section' => 'team_section',
            'type' => 'text',
        ));

        // Instagram URL Text Control
        $wp_customize->add_setting("team_member_instagram_$i", array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("team_member_instagram_$i", array(
            'label' => sprintf(__('Team Member %s Instagram URL', 'tempo'), $i),
            'section' => 'team_section',
            'type' => 'text',
        ));

        // Twitter URL Text Control
        $wp_customize->add_setting("team_member_twitter_$i", array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("team_member_twitter_$i", array(
            'label' => sprintf(__('Team Member %s Twitter URL', 'tempo'), $i),
            'section' => 'team_section',
            'type' => 'text',
        ));

        // LinkedIn URL Text Control
        $wp_customize->add_setting("team_member_linkedin_$i", array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("team_member_linkedin_$i", array(
            'label' => sprintf(__('Team Member %s LinkedIn URL', 'tempo'), $i), // Add text-domain 'tempo'
            'section' => 'team_section',
            'type' => 'text',
        ));
    }
}

add_action('customize_register', 'customize_team_section');
?>