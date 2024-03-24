<?php
get_header();

// Start the Loop.
while (have_posts()) :
    the_post();

    // Get taxonomy terms for the post
    $categories = get_the_terms(get_the_ID(), 'portfolio_category');
    $clients = get_post_meta(get_the_ID(), '_client', true);
    $project_dates = get_post_meta(get_the_ID(), '_project_date', true);
    $project_urls = get_post_meta(get_the_ID(), '_project_url', true);

    // Get gallery images
    $gallery_images = get_post_meta(get_the_ID(), '_portfolio_gallery_images', true);
    $gallery_images = explode(',', $gallery_images);

    // Get the featured image URL or use a placeholder if not available
    $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
    $placeholder_image_url = get_template_directory_uri() . '/assets/images/placeholder-portfolio.png';
    ?>

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                    <li>Portfolio Details</li>
                </ol>
                <h2><?php the_title(); ?></h2>
            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">
                <div class="row gy-4">

                    <div class="col-lg-8">
                        <div class="portfolio-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">
                                <?php
                                // Add the featured image as the first slide or use a placeholder
                                if ($featured_image_url) :
                                    ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo esc_url($featured_image_url); ?>" alt="">
                                    </div>
                                <?php else : ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo esc_url($placeholder_image_url); ?>" alt="Placeholder Image">
                                    </div>
                                <?php endif;

                                // Add the gallery images
                                foreach ($gallery_images as $image_url) :
                                    ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo esc_url($image_url); ?>" alt="">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3>Project information</h3>
                            <ul>
                                <li><strong>Category</strong>: <?php echo !empty($categories) ? esc_html($categories[0]->name) : ''; ?></li>
                                <li><strong>Client</strong>: <?php echo esc_html($clients); ?></li>
                                <li><strong>Project date</strong>: <?php echo esc_html($project_dates); ?></li>
                                <li><strong>Project URL</strong>: <a href="<?php echo esc_url($project_urls); ?>"><?php echo esc_html($project_urls); ?></a></li>
                            </ul>
                        </div>
                        <div class="portfolio-description">
                            <h2><?php the_title(); ?></h2>
                            <p><?php the_content(); ?></p>
                        </div>
                    </div>

                </div>
            </div>
        </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <!-- Your footer code goes here -->

    <!-- Add your scripts and close the body and html tags -->
    </body>
    </html>

<?php endwhile;

get_footer();
?>
