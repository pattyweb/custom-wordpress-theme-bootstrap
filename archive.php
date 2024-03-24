<?php
get_header(); // Include header.php
?>

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">
    <ol>
      <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
      <li><?php the_archive_title('<span>', '</span>'); ?></li>
    </ol>
    <h2><?php the_archive_title(); ?></h2>
  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Blog Archive Section ======= -->
<section id="blog" class="blog">
  <div class="container" data-aos="fade-up">
    <div class="row">

      <?php
      // Check if any widgets are active in the sidebar
      $blog_entries_class = is_active_sidebar('sidebar-1') ? 'col-lg-8' : 'col-lg-12';
      ?>

      <div class="<?php echo esc_attr($blog_entries_class); ?> entries">

        <?php if (have_posts()) : ?>

          <?php while (have_posts()) : the_post(); // Start the loop ?>
            <article <?php post_class('entry'); ?>>

              <div class="entry-img">
                <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail('full', ['class' => 'img-fluid', 'alt' => get_the_title()]); ?>
                <?php endif; ?>
              </div>

              <h2 class="entry-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="<?php the_permalink(); ?>"><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('M j, Y'); ?></time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="<?php comments_link(); ?>"><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></a></li>
                </ul>
              </div>

              <div class="entry-content">
                <?php the_excerpt(); // Display excerpt instead of full content for archive ?>
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
        <div class="col-lg-4">
          <?php get_sidebar(); ?>
        </div>
      <?php endif; ?>

    </div>
  </div>
</section>

<?php
get_footer(); // Include footer.php
?>
