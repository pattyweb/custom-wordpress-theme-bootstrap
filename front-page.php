<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bootstrap
 */

get_header();
?>

<?php 
        get_template_part( 'template-parts/hero' );
        get_template_part( 'template-parts/about' );
        get_template_part( 'template-parts/services' );
        get_template_part( 'template-parts/cta' );
        get_template_part( 'template-parts/portfolio' );
        get_template_part( 'template-parts/pricing' );
        get_template_part( 'template-parts/faq' );
        get_template_part( 'template-parts/team' );
        get_template_part( 'template-parts/contact' );

        ?>

<?php
//get_sidebar();
get_footer();
