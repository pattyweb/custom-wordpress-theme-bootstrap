<?php
// Include the file that contains the Customizer_Repeater class
//require_once get_template_directory() . '../customizer-repeater/class/customizer-repeater-control.php';

// Customizer Section and Control Setup
function customizer_repeater_setup($wp_customize) {
    // Add a new section
    $wp_customize->add_section('repeater_controls_section', array(
        'title'    => esc_html__('FAQ Section', 'tempo'),
        'priority' => 70, // Adjust the priority as needed
        'active_callback' => 'is_front_page',
    ));

// Add setting for displaying the portfolio section
$wp_customize->add_setting('display_faq_section', array(
    'default' => true, // Default to display the section
    'sanitize_callback' => 'sanitize_checkbox',
));

// Add control for displaying the portfolio section
$wp_customize->add_control('display_faq_section', array(
    'label' => __('Display FAQ Section', 'tempo'),
    'section' => 'repeater_controls_section',
    'type' => 'checkbox',
    'priority'                             => 1,
));

// Add Setting for services Description
$wp_customize->add_setting(
    'faq_title',
    array(
        'type' => 'theme_mod',
        'sanitize_callback' => 'wp_kses_post',
    )
);


// Add Control for services Description
$wp_customize->add_control(
    'faq_title',
    array(
        'label' => __('Title', 'tempo'),
        'section' => 'repeater_controls_section',
        'type' => 'text',
        'priority'                             => 2,
    )
);

    // Add your customizer setting and control to the new section
    $wp_customize->add_setting('customizer_repeater_example', array(
        'sanitize_callback' => 'customizer_repeater_sanitize',
    ));
    $wp_customize->add_control(new Customizer_Repeater(
        $wp_customize,
        'customizer_repeater_example',
        array(
            'label'                                => esc_html__('FAQ', 'tempo'),
            'section'                              => 'repeater_controls_section',
            'priority'                             => 3,
            'customizer_repeater_title_control'   => true,
            'customizer_repeater_subtitle_control' => true,
        )
    ));
    
}

// Add action hook to run the setup function
add_action('customize_register', 'customizer_repeater_setup');

// Filter to modify input label in repeater control
function repeater_labels($string, $id, $control) {
    if ($id === 'customizer_repeater_example') {
        if ($control === 'customizer_repeater_title_control') {
            return esc_html__('Question', 'tempo');
        }
    }
    return $string;
}
add_filter('repeater_input_labels_filter', 'repeater_labels', 10, 3);
