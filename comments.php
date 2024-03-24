<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bootstrap
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password, we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ($comments_number !== 0) :
                ?>
                <h4 class="comments-count"><?php echo esc_html($comments_number) . ' ' . esc_html(_n('Comment', 'Comments', $comments_number, 'tempo')); ?></h4>
                </h2><!-- .comments-title -->

                <?php the_comments_navigation(); ?>

                <ul class="comment-list">
                    <?php
                    wp_list_comments(['callback' => 'custom_comments_callback']);
                    ?>
                </ul><!-- .comment-list -->
            <?php endif;
        
        // If comments are closed and there are comments, let's leave a little note
        if (!comments_open()) : ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'tempo'); ?></p>
        <?php endif;

    endif; // Check for have_comments().
    ?>

    <div class="reply-form">
        <?php
        // Define comment form arguments
        $comment_form_args = array(
            'class_submit'  => 'btn btn-primary', // Customize the submit button class
            'comment_field' => '<div class="row"><div class="col form-group mb-3"><textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea></div></div>',
            'fields'        => array(
                'author' => '<div class="row"><div class="col-md-6 form-group mb-3"><input name="author" type="text" class="form-control" placeholder="Your Name*"></div>',
                'email'  => '<div class="col-md-6 form-group"><input name="email" type="text" class="form-control" placeholder="Your Email*"></div></div>',
                'url'    => '<div class="row"><div class="col form-group mb-3"><input name="url" type="text" class="form-control" placeholder="Your Website"></div></div>',
            ),
            'submit_button' => '<button name="%1$s" type="submit" id="%2$s" class="%3$s" style="background-color: #493c3e; border-color: #493c3e;">%4$s</button>',
        );

        // Output the comment form
        comment_form($comment_form_args);
        ?>
    </div>

</div><!-- #comments -->
