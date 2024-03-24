<?php
// Check if the pricing section should be displayed
$display_pricing_section = get_theme_mod('display_pricing_section', true);

// Check if the checkbox is selected
if (!$display_pricing_section) {
    // The checkbox is not selected, so hide the pricing section
    return;
}
?>

<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing mb-5">
    <div class="container">

        <div class="section-title">
        <h2><?php _e('Pricing', 'tempo'); ?></h2>
        <h3><?php echo wp_kses_post(get_theme_mod('pricing_title', 'Our Competing <span>Prices</span>')); ?></h3>

            <p><?php echo esc_html(get_theme_mod('pricing_description', 'Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.')); ?></p>
        </div>

        <div class="row">
            <?php for ($i = 1; $i <= 3; $i++) :
                $plan_name = esc_html(get_theme_mod("pricing_plan_name_$i", 'Business'));
                $plan_price = esc_html(get_theme_mod("pricing_plan_price_$i", '41'));
                $plan_features = wpautop(wp_kses_post(get_theme_mod("pricing_plans_features_$i", '<ul> <li>Aida dere</li> <li>Nec feugiat nisl</li> <li>Nulla at volutpat dola</li> <li class=\"na\">Pharetra massa</li> <li class=\"na\">Massa ultricies mi</li> </ul>')));
                $button_link = esc_url(get_theme_mod("pricing_plan_button_link_$i", '#'));

                // Check if name and price are present before displaying the plan
                if ($plan_name && isset($plan_price)) :
                    ?>
                    <div class="col-lg-4 col-md-6 mt-4 mt-md-0<?php echo ($i === 2) ? ' highlighted' : ''; ?>">
                        <div class="box<?php echo ($i === 2) ? ' recommended' : ''; ?>">
                            <?php if ($i === 2) : ?>
                                <span class="recommended-badge">Recommended</span>
                            <?php endif; ?>
                            <h3><?php echo $plan_name; ?></h3>
                            <?php if ($plan_price !== '') : ?>
                                <?php if ($plan_price !== '0') : ?>
                                    <h4><sup>$</sup><?php echo $plan_price; ?><span> / month</span></h4>
                                <?php else : ?>
                                    <h4>Free</h4>
                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="plan-features">
                                <?php echo $plan_features; ?>
                            </div>
                            <div class="btn-wrap">
                                <a href="<?php echo $button_link; ?>" class="btn-buy">Buy Now</a>
                            </div>
                        </div>
                    </div>
                <?php endif;
            endfor; ?>
        </div>

    </div>
</section><!-- End Pricing Section -->
