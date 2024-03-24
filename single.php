<?php
get_header(); // Include header.php
?>
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container mt-5">

    <ol>
      <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
      <?php
      if (is_singular('post')) { // Check if it's a single blog post
        ?>
        <li><a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>">Blog</a></li>
        <li><?php the_title(); ?></li>
        <?php
      } else {
        ?>
        <li><?php the_title(); ?></li>
        <?php
      }
      ?>
    </ol>
    <h2><?php the_title(); ?></h2>

  </div>
</section><!-- End Breadcrumbs -->
<!-- ======= Blog Single Section ======= -->
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

        <?php while (have_posts()) : the_post(); // Start the loop ?>
          <article <?php post_class('entry entry-single'); ?>>

            <?php if (has_post_thumbnail()) : ?>
              <div class="entry-img">
                <?php the_post_thumbnail('full', ['class' => 'img-fluid', 'alt' => get_the_title()]); ?>
              </div>
            <?php endif; ?>

            <h2 class="entry-title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>

            <div class="entry-meta">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                    href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
                </li>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                    href="<?php the_permalink(); ?>"><time
                      datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('M j, Y'); ?></time></a>
                </li>
                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                    href="<?php comments_link(); ?>"><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></a>
                </li>
              </ul>
            </div>

            <div class="entry-content">
              <?php the_content(); ?>
            </div>

            <div class="entry-footer">
              <i class="bi bi-folder"></i>
              <ul class="cats">
                <li><?php the_category(', '); ?></li>
              </ul>

              <i class="bi bi-tags"></i>
              <ul class="tags">
                <?php the_tags('<li>', '</li><li>', '</li>'); ?>
              </ul>
            </div>

          </article><!-- End blog entry -->
          <!-- Author Bio Section -->
          <div class="blog-author d-flex align-items-center">
            <?php echo get_avatar(get_the_author_meta('ID'), 70, '', 'Author Avatar', ['class' => 'rounded-circle float-left']); ?>
            <div>
              <h4><?php the_author(); ?></h4>
              <div class="social-links">
                <a href="<?php echo esc_url(get_the_author_meta('twitter')); ?>"><i
                    class="bi bi-twitter"></i></a>
                <a href="<?php echo esc_url(get_the_author_meta('facebook')); ?>"><i
                    class="bi bi-facebook"></i></a>
                <a href="<?php echo esc_url(get_the_author_meta('linkedin')); ?>"><i
                    class="bi bi-linkedin"></i></a>
              </div>
              <p><?php the_author_meta('description'); ?></p>
            </div>
          </div><!-- End blog author bio -->
          <div class="blog-comments">

              <?php
              //wp_list_comments(['style' => 'div']);
              comments_template();
              ?>

          </div><!-- End blog comments -->

        <?php endwhile; ?>



      </div>
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

<?php
get_footer(); // Include footer.php
?>
