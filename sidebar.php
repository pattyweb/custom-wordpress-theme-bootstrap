<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bootstrap
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="sidebar widget-area">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>

    <!-- Closing the sidebar-1 widget area div -->
    </div>

    <!-- Opening the sidebar categories div -->
    <div class="sidebar-categories">
        <!-- Your sidebar categories content goes here -->
    </div><!-- End sidebar categories -->
</aside><!-- #secondary -->
