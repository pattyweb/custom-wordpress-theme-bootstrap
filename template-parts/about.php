<?php
$display_about_section = get_theme_mod('display_about_section', true);

if ($display_about_section) {
    $about_title = wp_kses_post(get_theme_mod('about_title', 'Learn More <span>About Us</span>'));
    $about_description = get_theme_mod('about_description', 'Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.');
    $about_text_l = get_theme_mod('wysiwyg_setting_l', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><ul><li><i class=\"ri-check-double-line\"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li><li><i class=\"ri-check-double-line\"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li><li><i class=\"ri-check-double-line\"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li></ul>'); // Update to use the WYSIWYG control for left text
    $about_text_r = get_theme_mod('wysiwyg_setting_r', '<p>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'); // Update to use the WYSIWYG control for right text
    $about_button_text = get_theme_mod('about_button_text', 'Read More');
    $about_button_link = get_theme_mod('about_button_link', '#');
?>
    <!-- ======= About Section ======= -->
    <section id="about" class="about mt-5 mb-5">
        <div class="container">

            <div class="section-title">
            <h2><?php _e('About', 'tempo'); ?></h2>
            <h3><?php echo $about_title ?></h3>

                <p><?php echo $about_description ?></p>
            </div>

            <div class="row content">
                <div class="col-lg-6">
                    <p>
                        <?php echo $about_text_l ?>
                    </p>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                    <p>
                        <?php echo $about_text_r ?>
                    </p>
                    <a href="<?php echo esc_url($about_button_link) ?>" class="btn-learn-more"><?php echo esc_html($about_button_text) ?></a>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->
<?php
}
?>
