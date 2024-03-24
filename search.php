<?php
get_header(); // Include header.php
?>

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
            <li><?php printf( esc_html__( 'Search Results for: %s', 'tempo' ), '<span>' . get_search_query() . '</span>' ); ?></li>
        </ol>
        <h2><?php printf( esc_html__( 'Search Results for: %s', 'tempo' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
    </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Blog Section with Search Results ======= -->
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
        <div class="row">

            <?php
            // Check if any widgets are active in the sidebar
            if (is_active_sidebar('sidebar-1')) {
                $search_results_class = 'col-lg-8'; // Use 8 columns for the main content
                $sidebar_class = 'col-lg-4'; // Use 4 columns for the sidebar
            } else {
                $search_results_class = 'col-lg-12'; // Use 12 columns for the main content if no sidebar
                $sidebar_class = ''; // No need for columns in the sidebar if no sidebar
            }
            ?>

            <div class="<?php echo esc_attr($search_results_class); ?> entries">

                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); // Start the loop ?>
                        <article <?php post_class('entry entry-single'); ?>>
                            <h2 class="entry-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <div class="entry-content">
                                <?php the_excerpt(); ?>
                            </div>
                        </article><!-- End search result entry -->
                    <?php endwhile; ?>
                    <?php the_posts_navigation(); ?>
                <?php else : ?>
                    <?php get_template_part('template-parts/content', 'none'); ?>
                <?php endif; ?>

            </div>

            <?php
            // Check if sidebar-1 is active to display the sidebar
            if (is_active_sidebar('sidebar-1')) :
            ?>
                <aside id="secondary" class="<?php echo esc_attr($sidebar_class); ?> sidebar widget-area">
                    <?php get_sidebar(); ?>
                </aside>
            <?php endif; ?>

        </div>
    </div>
</section>

<?php
get_footer(); // Include footer.php
?>
