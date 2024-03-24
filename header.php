<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bootstrap
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'tempo' ); ?></a>

    <?php
    $header_classes = 'fixed-top';
    if (!(is_front_page())) {
        $header_classes .= ' bg-dark';
    }
    ?>
    <header id="header" class="<?php echo esc_attr( $header_classes ); ?>">
        <div class="container d-flex align-items-center justify-content-between pt-3">
            <?php
            the_custom_logo();
            if (is_front_page() && is_home()) :
                ?>
                <h1 class="logo"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php else : ?>
                <p class="logo"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
            <?php endif;
            $bootstrap_theme_description = get_bloginfo('description', 'display');
            if ($bootstrap_theme_description || is_customize_preview()) :
                ?>
                <p class="site-description"><?php echo $bootstrap_theme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
            <?php endif; ?>
            <div i class="bi bi-list mobile-nav-toggle"></i></div>
            <nav id="navbar" class="navbar">
                <?php /* Primary navigation */ 
                    wp_nav_menu( array(
                    'theme_location' => 'top_menu',
                    'depth' => 2,
                    'container' => false,
                    'menu_class' => 'nav',
                    //Process nav menu using our custom nav walker 
                    'walker' => new wp_bootstrap_navwalker())
                    );
                ?>
            </nav>
        </div><!-- .site-branding -->
    </header><!-- #masthead -->
