<?php

/**
 * bootstrap functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bootstrap
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */



function bootstrap_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on bootstrap, use a find and replace
		* to change 'tempo' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'tempo', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'top_menu' => esc_html__('Top Menu', 'tempo'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

    add_theme_support('post-thumbnails');
    add_image_size('medium', 300, 300, true);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'bootstrap_theme_setup' );

add_theme_support('responsive-embeds');
add_theme_support('align-wide');


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bootstrap_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bootstrap_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'bootstrap_theme_content_width', 0 );

function bootstrap_theme_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'tempo' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'tempo' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
           
        )
    );
}
add_action( 'widgets_init', 'bootstrap_theme_widgets_init' );

// Register widget areas for the footer
function theme_register_footer_widgets() {
    register_sidebar(array(
        'name'          => __('Contact Info', 'tempo'),
        'id'            => 'footer-contact',
        'description'   => __('Widgets in this area will be displayed in the contact info section of the footer.', 'tempo'),
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Useful Links', 'tempo'),
        'id'            => 'footer-links-1',
        'description'   => __('Widgets in this area will be displayed in the first links section of the footer.', 'tempo'),
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Our Services', 'tempo'),
        'id'            => 'footer-links-2',
        'description'   => __('Widgets in this area will be displayed in the second links section of the footer.', 'tempo'),
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Newsletter', 'tempo'),
        'id'            => 'footer-newsletter',
        'description'   => __('Widgets in this area will be displayed in the newsletter section of the footer.', 'tempo'),
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Copyright', 'tempo'),
        'id'            => 'footer-copyright',
        'description'   => __('Widgets in this area will be displayed in the newsletter section of the footer.', 'tempo'),
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<strong>',
        'after_title'   => '</strong>',
    ));

    register_sidebar(array(
        'name'          => __('Social Links', 'tempo'),
        'id'            => 'footer-social-links',
        'description'   => __('Widgets in this area will be displayed in the newsletter section of the footer.', 'tempo'),
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<a>',
        'after_title'   => '</a>',
    ));
}

add_action('widgets_init', 'theme_register_footer_widgets');
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// function bootstrap_theme_widgets_init() {
// 	register_sidebar(
// 		array(
// 			'name'          => esc_html__( 'Sidebar', 'tempo' ),
// 			'id'            => 'sidebar-1',
// 			'description'   => esc_html__( 'Add widgets here.', 'tempo' ),
// 			'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 			'after_widget'  => '</section>',
// 			'before_title'  => '<h2 class="widget-title">',
// 			'after_title'   => '</h2>',
// 		)
// 	);
// }
// add_action( 'widgets_init', 'bootstrap_theme_widgets_init' );

//Customizer Settings
locate_template('/kirki/kirki.php', true, true);

//Check if Kirki is active
if (class_exists('Kirki')) {
    locate_template('/inc/about-customizer.php', true, true);
    locate_template('/inc/color-customizer.php', true, true);
}
/**
 * Customizer additions.
 */
//require get_template_directory() . '/cmb2-functions.php';
require get_template_directory() . '/customizer-repeater/functions.php';

locate_template('/customizer-repeater/class/customizer-repeater-control.php', true, true);

// Include the file that contains the Customizer_Repeater class
if (class_exists('Customizer_Repeater')) {
    locate_template('/inc/faq-customizer.php', true, true);
    locate_template('/inc/services-customizer.php', true, true);
}

require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/custom-header.php';
//require get_template_directory() . '/inc/services-customizer.php';
//require get_template_directory() . '/inc/faq-customizer.php';
require get_template_directory() . '/inc/portfolio-customizer.php';
require get_template_directory() . '/inc/team-customizer.php';
require get_template_directory() . '/inc/price-customizer.php';
require get_template_directory() . '/inc/contact-customizer.php';
//require get_template_directory() . '/inc/about-customizer.php';
require get_template_directory() . '/inc/cta-customizer.php';
//require get_template_directory() . '/inc/social-links-customizer.php';
//require get_template_directory() . '/inc/repeater-demo-customizer.php';
/**
 * Enqueue scripts and styles.
 */
function bootstrap_theme_scripts() {
    // Enqueue styles
    //wp_enqueue_style('tempo-style', get_stylesheet_uri(), array(), _S_VERSION);
    //wp_style_add_data('tempo-style', 'rtl', 'replace');

	// Enqueue Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i');

    // Enqueue your main stylesheet
    wp_enqueue_style('main-style', get_stylesheet_uri(), array('google-fonts'), '1.0.0');

    //wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css');
    
    wp_enqueue_style('theme-vendor-css', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('theme-vendor-icons-css', get_template_directory_uri() . '/assets/vendor/bootstrap-icons/bootstrap-icons.min.css');
    //wp_enqueue_style('theme-vendor-boots-css', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('theme-vendor-glightbox-css', get_template_directory_uri() . '/assets/vendor/glightbox/css/glightbox.min.css');
    wp_enqueue_style('theme-vendor-plyr-css', get_template_directory_uri() . '/assets/vendor/glightbox/css/plyr.min.css');
    wp_enqueue_style('theme-vendor-boxicon-css', get_template_directory_uri() . '/assets/vendor/boxicons/css/boxicons.min.css');
    wp_enqueue_style('theme-vendor-remixicon-css', get_template_directory_uri() . '/assets/vendor/remixicon/remixicon.css');
	wp_enqueue_style('theme-vendor-swiper-css', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css');
	wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css');
    



    // Enqueue scripts
    wp_enqueue_script('jquery');
	
    //wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), _S_VERSION, true);
    wp_enqueue_script('theme-vendor-js', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), _S_VERSION, true);
    wp_enqueue_script('theme-vendor-glightbox-js', get_template_directory_uri() . '/assets/vendor/glightbox/js/glightbox.min.js', array('jquery'), _S_VERSION, true);
    wp_enqueue_script('theme-vendor-isotope-js', get_template_directory_uri() . '/assets/vendor/isotope-layout/isotope.pkgd.min.js', array('jquery'), _S_VERSION, true);
    wp_enqueue_script('theme-vendor-swiper-js', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('theme-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), _S_VERSION, true);
    
    //   $api_key = get_theme_mod('google_maps_api_key', '');

    //       wp_enqueue_script('google-maps-api', 'https://maps.googleapis.com/maps/api/js?key=' . $api_key . '&callback=Function.prototype', array(), null,  array(
    //         'in_footer' => true,
    //         'strategy'  => 'async',
    //     ));


    //wp_enqueue_script('faq-js', get_template_directory_uri() . '/assets/js/customizer-script.js', array('jquery'), _S_VERSION, true);
    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'bootstrap_theme_scripts');



/**
 * Custom template tags for this theme.
 */

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
//require get_template_directory() . '/customizer-repeater/functions.php';
require get_template_directory() . '/inc/template-functions.php';


// function add_svg_to_upload_mimes($mimes) {
//     $mimes['svg'] = 'image/svg+xml';
//     return $mimes;
// }

// add_filter('upload_mimes', 'add_svg_to_upload_mimes');


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

require_once('class-wp-bootstrap-navwalker.php');





//shortcodes
//require get_template_directory() . '/shortcodes/shortcodes.php';


function theme_enqueue_styles() {
    // Get the primary color from the Customizer
    $primary_color = get_theme_mod('theme_primary_color', '#e43c5c');
    $secondary_color = get_theme_mod('theme_secondary_color', '#d01d3f');

    // Enqueue your theme stylesheet
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), null);

    // Add inline styles for color customization
    $custom_css = '
    a {
        color: ' . esc_attr($primary_color) . ';
        text-decoration: none;
    }

    #breadcrumbs a:visited {
        color: ' . esc_attr($primary_color) . ';
    }
    
    .back-to-top {
        background: ' . esc_attr($primary_color) . ';
    }
    
    .navbar>ul>li>a:before {
        background-color: ' . esc_attr($primary_color) . ';
    }

	.navbar .dropdown ul a:hover,
	.navbar .dropdown ul .active:hover,
	.navbar .dropdown ul li:hover>a {
            color: ' . esc_attr($primary_color) . ';
        }

    .navbar-mobile a:hover,
    .navbar-mobile .active,
    .navbar-mobile li:hover>a {
            color: ' . esc_attr($primary_color) . ';
        }

    .navbar-mobile .dropdown ul a:hover,
    .navbar-mobile .dropdown ul .active:hover,
    .navbar-mobile .dropdown ul li:hover>a  {
            color: ' . esc_attr($primary_color) . ';
        }
    #hero .btn-get-started:hover {
            background: ' . esc_attr($primary_color) . ';
            border: 2px solid ' . esc_attr($primary_color) . ';
        }
    .section-title h2 {
            color: ' . esc_attr($primary_color) . ';
        }
    .section-title h3 span {
            color: ' . esc_attr($primary_color) . ';
        }
    .about .content ul i {
            color: ' . esc_attr($primary_color) . ';
        }
    .about .content .btn-learn-more {
    color: ' . esc_attr($primary_color) . ';
    border: 2px solid ' . esc_attr($primary_color) . ';
        }

    .about .content .btn-learn-more:hover {
        background: ' . esc_attr($primary_color) . ';
            }

    .services .icon-box:hover::before {
            background: ' . esc_attr($primary_color) . ';
        }
    .services .icon i {
            color: ' . esc_attr($primary_color) . ';
        }
    .services .icon-box:hover img {
        filter: brightness(0) invert(1);
    }
    .features .icon-box:hover a {
            background: ' . esc_attr($primary_color) . ';
        }
    .portfolio #portfolio-flters li:hover,
    .portfolio #portfolio-flters li.filter-active {
            background: ' . esc_attr($primary_color) . ';
        }
    .portfolio .portfolio-item .portfolio-info {
            background: ' . esc_attr($primary_color) . ';
        }
    .portfolio-details .portfolio-details-slider .swiper-pagination .swiper-pagination-bullet {
            border: ' . esc_attr($primary_color) . ';
        }
    .portfolio-details .portfolio-details-slider .swiper-pagination .swiper-pagination-bullet-active {
            background-color: ' . esc_attr($primary_color) . ';
        }
    .pricing .box h4 {
            color: ' . esc_attr($primary_color) . ';
        }
    .pricing .box ul i {
            color: ' . esc_attr($primary_color) . ';
        }
    .pricing .box .btn-buy {
            color: ' . esc_attr($primary_color) . ';
            border: 2px solid ' . esc_attr($primary_color) . ';
        }

    .pricing .box .btn-buy:hover {
            background: ' . esc_attr($primary_color) . ';
        }
    .pricing .recommended {
            border-color: ' . esc_attr($primary_color) . ';
        }
    .pricing .recommended .btn-buy {
            background: ' . esc_attr($primary_color) . ';
            color: white;
        }
    .pricing .recommended .btn-buy:hover {
        background: ' . esc_attr($secondary_color) . ';
        border-color: ' . esc_attr($secondary_color) . ';
    }
    .pricing .recommended-badge {
            color: ' . esc_attr($primary_color) . ';
        }
    .faq .faq-list .question:hover {
            font-family: ' . esc_attr($primary_color) . ';
        }
    .faq .faq-list .collapsed:hover {
            color: ' . esc_attr($primary_color) . ';
        }
    .team .member .social a:hover {
            color: ' . esc_attr($primary_color) . ';
        }
    .contact .info i {
            color: ' . esc_attr($primary_color) . ';
        }
    .contact .info .email:hover i,
    .contact .info .address:hover i,
    .contact .info .phone:hover i {
            background: ' . esc_attr($primary_color) . ';
        }
    .contact .php-email-form input:focus,
    .contact .php-email-form textarea:focus {
            border-color: ' . esc_attr($primary_color) . ';
        }
    .contact .php-email-form button[type=submit] {
            background: ' . esc_attr($primary_color) . ';
        }
    .blog .entry .entry-title a:hover {
            color: ' . esc_attr($primary_color) . ';
        }
    .blog .entry .entry-content .read-more a {
            background: ' . esc_attr($primary_color) . ';
        }
    .blog .entry .entry-content .read-more a:hover {
        background: ' . esc_attr($secondary_color) . ';
    }
    a.title:visited{
        color: ' . esc_attr($secondary_color) . ';
    }
    a.title:hover{
        color: ' . esc_attr($primary_color) . ';
    }
    .blog .entry .entry-footer a:hover {
            color: ' . esc_attr($primary_color) . ';
        }
    .blog .blog-comments .comment h5 a:hover {
            color: ' . esc_attr($primary_color) . ';
        }
    .blog .blog-pagination li.active,
    .blog .blog-pagination li:hover {
            background: ' . esc_attr($primary_color) . ';
        }
    .blog .sidebar .search-form form button {
            background: ' . esc_attr($primary_color) . ';
        }
    .blog .sidebar .search-form form button:hover {
        background: ' . esc_attr($secondary_color) . ';
    }
    .blog .sidebar .categories ul a:hover {
            color: ' . esc_attr($primary_color) . ';
        }
    .blog .sidebar .recent-posts h4 a:hover {
            color: ' . esc_attr($primary_color) . ';
        }
    .blog .sidebar .tags ul a:hover {
            border: ' . esc_attr($primary_color) . ';
            background: ' . esc_attr($primary_color) . ';
        }
    #footer .footer-top .footer-links ul a:hover {
            color: ' . esc_attr($primary_color) . ';
        }
    #footer .footer-newsletter form input[type=submit] {
            background: ' . esc_attr($primary_color) . ';
        }
    #footer .social-links a {
            background: ' . esc_attr($primary_color) . ';
        }
    .contact .php-email-form button[type=submit]:hover {
            background: ' . esc_attr($secondary_color) . ';
        }
    #footer .footer-newsletter form input[type=submit]:hover {
            background: ' . esc_attr($secondary_color) . ';
        }
    #footer .social-links a:hover {
            background: ' . esc_attr($secondary_color) . ';
        }
    #footer .footer-newsletter form {
            border: 1px solid ' . esc_attr($primary_color) . ';
        }
    ';
    wp_add_inline_style('theme-style', $custom_css);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

// require_once get_template_directory() . '/class-tgm-plugin-activation.php';

// add_action( 'tgmpa_register', 'tempo_required_plugin' );


// Include the TGM Plugin Activation class.
require_once get_template_directory() . '/class-tgm-plugin-activation.php';

// Register the required plugins.
function tempo_required_plugins() {
    $plugins = array(
        array(
            'name'     => 'Shortcodes and Custom Post Types for tempo-plugin Template', // Updated name
            'slug'     => 'tempo-plugin',
            'source'   => 'https://pattyweb.com.br/assets/tempo-plugin.zip',
            'required' => true,
        ),
        array(
            'name'     => 'One Click Demo Import',
            'slug'     => 'one-click-demo-import', // Slug for One Click Demo Import plugin
            'required' => true,
        ),
    );

    $config = array(
        'id'           => 'tempo-theme-plugins',      // Unique ID for your theme.
        'default_path' => '',                         // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins',    // Menu slug.
        'parent_slug'  => 'themes.php',               // Parent menu slug.
        'capability'   => 'edit_theme_options',       // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                       // Show admin notices or not.
        'dismissable'  => true,                       // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                         // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                       // Automatically activate plugins after installation or not.
        'message'      => '',                         // Message to output right before the plugins table.
    );

    tgmpa($plugins, $config);
}
add_action('tgmpa_register', 'tempo_required_plugins');




function custom_comments_callback($comment, $args, $depth)
{
    ?>
    <div id="comment-<?php comment_ID(); ?>" <?php comment_class('comment'); ?>>
        <div class="d-flex">
            <div class="comment-img"><?php echo get_avatar($comment, 64); ?></div>
            <div>
                <h5><?php comment_author_link(); ?>&nbsp;&nbsp; <i class="bi bi-reply-fill"></i>&nbsp;<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?></h5>
                <time datetime="<?php comment_time('Y-m-d'); ?>"><?php comment_time('d M, Y'); ?></time>
                <p><?php comment_text(); ?></p>
            </div>
        </div>
    </div>
    <?php
}
