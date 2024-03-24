<?php
// Check if the team section should be displayed
$display_team_section = get_theme_mod('display_team_section', true);

// Check if the checkbox is selected
if (!$display_team_section) {
    // The checkbox is not selected, so hide the team section
    return;
}
?>
<!-- ======= Team Section ======= -->
<section id="team" class="team mb-5">
    <div class="container">

        <div class="section-title">
        <h2><?php _e('Team', 'tempo'); ?></h2>
        <h3><?php echo wp_kses_post(get_theme_mod('team_title', 'Our Hardworking <span>Team</span>')); ?></h3>

            <p><?php echo esc_html(get_theme_mod('team_description', 'Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.')); ?></p>
        </div>

        <div class="row justify-content-center">
            <?php for ($i = 1; $i <= 4; $i++) : ?>
                <?php
                $image_url = esc_url(get_theme_mod("team_member_image_$i", 'https://pattyweb.com.br/images/team-1.jpg'));
                $member_name = esc_html(get_theme_mod("team_member_name_$i", 'John Doe'));

                // Check if both image and name are present before displaying the member
                if ($image_url && $member_name) :
                ?>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <div class="member-img">
                                <img src="<?php echo $image_url; ?>" class="img-fluid" alt="">
                                <div class="social">
                                    <?php if ($facebook_url = esc_url(get_theme_mod("team_member_facebook_$i", '#'))) : ?>
                                        <a href="<?php echo $facebook_url; ?>"><i class="bi bi-facebook"></i></a>
                                    <?php endif; ?>
                                    <?php if ($instagram_url = esc_url(get_theme_mod("team_member_instagram_$i", '#'))) : ?>
                                        <a href="<?php echo $instagram_url; ?>"><i class="bi bi-instagram"></i></a>
                                    <?php endif; ?>
                                    <?php if ($twitter_url = esc_url(get_theme_mod("team_member_twitter_$i", '#'))) : ?>
                                        <a href="<?php echo $twitter_url; ?>"><i class="bi bi-twitter"></i></a>
                                    <?php endif; ?>
                                    <?php if ($linkedin_url = esc_url(get_theme_mod("team_member_linkedin_$i", '#'))) : ?>
                                        <a href="<?php echo $linkedin_url; ?>"><i class="bi bi-linkedin"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4><?php echo $member_name; ?></h4>
                                <span><?php echo esc_html(get_theme_mod("team_member_role_$i", 'CEO')); ?></span>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>

    </div>
</section><!-- End Team Section -->
