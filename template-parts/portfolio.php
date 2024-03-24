<?php
// Check if the portfolio section should be displayed
$display_portfolio_section = get_theme_mod('display_portfolio_section', true);

// Check if the checkbox is selected
if (!$display_portfolio_section) {
    // The checkbox is not selected, so hide the portfolio section
    return;
}
$portfolio_description = get_theme_mod('portfolio_description', '');
$placeholder_image_url = get_template_directory_uri() . '/assets/images/placeholder-portfolio.png';
?>
<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
  <div class="container">

    <div class="section-title">
    <h2><?php _e('Portfolio', 'tempo'); ?></h2>
    <h3><?php echo wp_kses_post(get_theme_mod('portfolio_title', 'Check our <span>Portfolio</span>')); ?></h3>

      <p><?php echo esc_html($portfolio_description); ?></p>
    </div>

    <div class="row">
      <div class="col-lg-12 d-flex justify-content-center">
      <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>

            <?php
            // Get the selected categories from the customizer
            $selected_categories = get_theme_mod('selected_portfolio_categories', 'app,web,design');

            // Convert the selected categories into an array
            $selected_categories_array = !empty($selected_categories) ? explode(',', $selected_categories) : array();

            // Fetch all unique categories from the 'portfolio' post type
            $categories = get_terms(array(
                'taxonomy' => 'portfolio_category',
                'hide_empty' => true,
            ));

            // Display each category as a filter only if it's selected in the customizer
            foreach ($categories as $category) {
                if (in_array($category->slug, $selected_categories_array) || empty($selected_categories)) {
                    echo '<li data-filter=".' . $category->slug . '">' . $category->name . '</li>';
                }
            }
            ?>

        </ul>
      </div>
    </div>

    <div class="row portfolio-container">
    <?php
    // Custom query to fetch 'portfolio' posts with selected categories
    $portfolio_query = new WP_Query(array(
        'post_type' => 'portfolio',
        'posts_per_page' => -1, // Display all posts
        'tax_query' => array(
            array(
                'taxonomy' => 'portfolio_category',
                'field' => 'slug',
                'terms' => $selected_categories_array,
                'operator' => 'IN',
            ),
        ),
    ));

    // Loop through each portfolio item
    while ($portfolio_query->have_posts()) : $portfolio_query->the_post();

        // Get the post categories
        $post_categories = get_the_terms(get_the_ID(), 'portfolio_category');

        // Get the featured image URL or use a placeholder if not available
        $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
        $featured_image_url = $featured_image_url ? $featured_image_url : $placeholder_image_url;
        ?>

        <div class="col-lg-4 col-md-6 portfolio-item <?php echo esc_attr(join(' ', wp_list_pluck($post_categories, 'slug'))); ?>">
            <img src="<?php echo esc_url($featured_image_url); ?>" class="img-fluid" alt="">
            <div class="portfolio-info">
                <h4><?php the_title(); ?></h4>
                <?php
                // Display each category as a paragraph
                foreach ($post_categories as $post_category) {
                    echo '<p>' . $post_category->name . '</p>';
                }
                ?>
                <a href="<?php echo esc_url($featured_image_url); ?>" data-gallery="portfolioGallery"
                    class="portfolio-lightbox preview-link" title="<?php the_title(); ?>"><i
                        class="bx bx-plus"></i></a>
                <a href="<?php the_permalink(); ?>" class="details-link" title="More Details"><i
                        class="bx bx-link"></i></a>

            </div>
        </div>

    <?php endwhile;
    wp_reset_postdata(); // Reset post data to prevent conflicts
    ?>

</div>

  </div>
</section><!-- End Portfolio Section -->
