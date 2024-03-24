<?php
if ( class_exists( 'Kirki' ) ) {

Kirki::add_config( 'theme_config', array(
    'capability'  => 'edit_theme_options',
    'option_type' => 'theme_mod',
) );

Kirki::add_section( 'theme_color_section', array(
    'title'    => esc_html__( 'Theme Colors', 'tempo' ),
    'priority' => 110,
) );

Kirki::add_field( 'theme_config', array(
    'settings' => 'theme_primary_color',
    'label'    => esc_html__( 'Primary Color', 'tempo' ),
    'section'  => 'theme_color_section',
    'type'     => 'color',
    'default'  => '#e43c5c',
) );

Kirki::add_field( 'theme_config', array(
    'settings' => 'theme_secondary_color',
    'label'    => esc_html__( 'Secondary Color', 'tempo' ),
    'section'  => 'theme_color_section',
    'type'     => 'color',
    'default'  => '#d01d3f',
) );

}
