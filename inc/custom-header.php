<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package bootstrap
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses bootstrap_theme_header_style()
 */


if ( ! function_exists( 'bootstrap_theme_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see bootstrap_theme_custom_header_setup().
	 */
	function bootstrap_theme_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
				}
			<?php
			// If the user has set a custom color for the text use that.
		else :
			?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif;


function wpdevs_customizer_header( $wp_customize ){

    $wp_customize->add_section(
        'sec_header',
        array(
            'title' => __('Header', 'tempo'),
            'priority' => 10,
            'active_callback' => 'is_front_page',
        )
    );

    // Setting and control for Header Title 1
    $wp_customize->add_setting(
        'set_header_title',
        array(
            'type' => 'theme_mod',
            'default' => __('Add a Title', 'tempo'),
            'sanitize_callback' => 'sanitize_textarea_field'
        )
    );

    $wp_customize->add_control(
        'set_header_title',
        array(
            'label' => __('Title', 'tempo'),
            'description' => __('Write Your Title', 'tempo'),
            'section' => 'sec_header',
            'type' => 'textarea'
        )
    );  

    // Setting and control for Header Title 2
    $wp_customize->add_setting(
        'set_header_title_2',
        array(
            'type' => 'theme_mod',
            'default' => __('Add a Title', 'tempo'),
            'sanitize_callback' => 'sanitize_textarea_field'
        )
    );

    $wp_customize->add_control(
        'set_header_title_2',
        array(
            'label' => __('Title', 'tempo'),
            'description' => __('Write Your Title', 'tempo'),
            'section' => 'sec_header',
            'type' => 'textarea'
        )
    );  

    // Setting and control for Header Subtitle
    $wp_customize->add_setting(
        'set_header_subtitle',
        array(
            'type' => 'theme_mod',
            'default' => __('Add a Subtitle', 'tempo'),
            'sanitize_callback' => 'sanitize_textarea_field'
        )
    );

    $wp_customize->add_control(
        'set_header_subtitle',
        array(
            'label' => __('Subtitle', 'tempo'),
            'description' => __('Your Text', 'tempo'),
            'section' => 'sec_header',
            'type' => 'textarea'
        )
    ); 

    // Setting and control for Header Button Text
    $wp_customize->add_setting(
        'set_header_button_text',
        array(
            'type' => 'theme_mod',
            'default' => __('Read More', 'tempo'),
            'sanitize_callback' => 'sanitize_textarea_field'
        )
    );

    $wp_customize->add_control(
        'set_header_button_text',
        array(
            'label' => __('Button Text', 'tempo'),
            'description' => __('Add Button Text', 'tempo'),
            'section' => 'sec_header',
            'type' => 'text'
        )
    );

    // Setting and control for Header Button Link
    $wp_customize->add_setting(
        'set_header_button_link',
        array(
            'type' => 'theme_mod',
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(
        'set_header_button_link',
        array(
            'label' => __('Button Link', 'tempo'),
            'description' => __('Add Button Link', 'tempo'),
            'section' => 'sec_header',
            'type' => 'url'
        )
    );           

    // Setting and control for Header Image
    $wp_customize->add_setting(
        'set_header_image',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize,
        'set_header_image',
        array(
            'label' => __('Header Image', 'tempo'),
            'section'   => 'sec_header',
            'mime_type' => 'image'
        )
    ));
}

add_action( 'customize_register', 'wpdevs_customizer_header' );
