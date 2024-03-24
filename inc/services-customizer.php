<?php
// Include the file that contains the Customizer_Repeater class
//require_once get_template_directory() . '../customizer-repeater/class/customizer-repeater-control.php';

// Customizer Section and Control Setup
function customizer_repeater_setup_services($wp_customize) {

     // Add the second section
     $wp_customize->add_section('another_section', array(
        'title'    => esc_html__('Services Section', 'tempo'),
        'priority' => 30, // Adjust the priority as needed
        'active_callback' => 'is_front_page',
    ));

// Add setting for displaying the portfolio section
$wp_customize->add_setting('display_services_section', array(
    'default' => true, // Default to display the section
    'sanitize_callback' => 'sanitize_checkbox',
));

// Add control for displaying the portfolio section
$wp_customize->add_control('display_services_section', array(
    'label' => __('Display Services Section', 'tempo'),
    'section' => 'another_section',
    'type' => 'checkbox',
    'priority'                             => 1,
));

// Add Setting for services Description
$wp_customize->add_setting(
    'services_title',
    array(
        'type' => 'theme_mod',
        'sanitize_callback' => 'wp_kses_post',
    )
);

// Add Control for services Description
$wp_customize->add_control(
    'services_title',
    array(
        'label' => __('Title', 'tempo'),
        'section' => 'another_section',
        'type' => 'text',
        'priority'                             => 2,
    )
);

// Add Setting for services Description
$wp_customize->add_setting(
    'services_description',
    array(
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_textarea_field',
    )
);

// Add Control for services Description
$wp_customize->add_control(
    'services_description',
    array(
        'label' => __('Description', 'tempo'),
        'section' => 'another_section',
        'type' => 'textarea',
        'priority'                             => 3,
    )
);


    // Add your customizer setting and control to the second section
    $wp_customize->add_setting('another_repeater_example', array(
        'sanitize_callback' => 'customizer_repeater_sanitize',
    ));
    $wp_customize->add_control(new Customizer_Repeater(
        $wp_customize,
        'another_repeater_example',
        array(
            'label'                                => esc_html__('Services Section', 'tempo'),
            'section'                              => 'another_section',
            'priority'                             => 4,
            'customizer_repeater_image_control'   => true,
            'customizer_repeater_icon_control'    => true,
            'customizer_repeater_title_control'   => true,
            'customizer_repeater_subtitle_control' => true,
        )
    ));
    
}

// Add action hook to run the setup function
add_action('customize_register', 'customizer_repeater_setup_services');