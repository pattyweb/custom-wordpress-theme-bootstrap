<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bootstrap
 */

get_header();
?>

<main id="primary" class="site-main text-center mt-5">

    <section class="error-404 not-found">
        <header class="page-header">
            <h1 class="page-title mt-5"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'tempo'); ?></h1>
        </header><!-- .page-header -->
		<div class="big-404">
                <p>404</p>
            </div>
        <div class="page-content">
            <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'tempo'); ?></p>

			
            

           
        </div><!-- .page-content -->
    </section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();
