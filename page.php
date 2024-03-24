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

            <div class="col-lg-12 entries">

                <?php while (have_posts()) : the_post(); // Start the loop ?>
                    <article <?php post_class('entry entry-single pt-5'); ?>>

                       

                        <h2 class="entry-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                            href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a>
                                </li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="<?php the_permalink(); ?>"><time
                                                datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php echo esc_html(get_the_date()); ?></time></a>
                                </li>
                                
                            </ul>
                        </div>

						<?php if (has_post_thumbnail()) : ?>
                            <div class="entry-img pt-5 pb-5">
                                <?php the_post_thumbnail('full', ['class' => 'img-fluid', 'alt' => get_the_title()]); ?>
                            </div>
                        <?php endif; ?>

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
                <?php endwhile; ?>

            </div>
        </div>
    </div>
</section>

<?php
get_footer(); // Include footer.php
?>
