<?php get_header(); ?>

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">
    <ol>
    <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
      <li>Blog</li>
    </ol>
    <h2>Blog</h2>
  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
  <div class="container" data-aos="fade-up">
    <div class="row">

      <?php
      // Check if any widgets are active in the sidebar
      if (is_active_sidebar('sidebar-1')) {
        $blog_entries_class = 'col-lg-8'; // Use 8 columns for the main content
        $sidebar_class = 'col-lg-4'; // Use 4 columns for the sidebar
      } else {
        $blog_entries_class = 'col-lg-12'; // Use 12 columns for the main content if no sidebar
        $sidebar_class = ''; // No need for columns in the sidebar if no sidebar
      }
      ?>

      <div class="<?php echo esc_attr($blog_entries_class); ?> entries">

        <?php
        // Start the WordPress loop
        if (have_posts()) :
          while (have_posts()) : the_post();
        ?>

            <article <?php post_class('entry'); ?>>

              <div class="entry-img">
                <?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
              </div>

              <h2 class="entry-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <?php the_author_posts_link(); ?></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="<?php comments_link(); ?>"><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></a></li>
                </ul>
              </div>

              <div class="entry-content">
                <?php the_excerpt(); ?>
                <div class="read-more">
                  <a href="<?php the_permalink(); ?>">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->

        <?php
          endwhile;

          // Pagination
          the_posts_pagination(array(
            'prev_text' => 'Previous',
            'next_text' => 'Next',
          ));

        else :
          // If no posts are found
          echo '<p>No posts found.</p>';

        endif;
        ?>
      </div><!-- End blog entries list -->

      <?php
      // Check if sidebar-1 is active to display the sidebar
      if (is_active_sidebar('sidebar-1')) :
      ?>
        <div class="<?php echo esc_attr($sidebar_class); ?>">
          <?php get_sidebar(); ?>
        </div>
      <?php endif; ?>

    </div>
  </div>
</section>

<?php get_footer(); ?>
