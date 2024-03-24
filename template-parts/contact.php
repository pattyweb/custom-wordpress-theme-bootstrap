<?php
// Check if the contact section should be displayed
$display_contact_section = get_theme_mod('display_contact_section', true);

// Check if the checkbox is selected
if (!$display_contact_section) {
    // The checkbox is not selected, so hide the contact section
    return;
}

$custom_url = get_theme_mod('custom_url', 'https://www.google.com/maps/d/embed?mid=1HzygwtZ9fxm29xzCVSqDB98yo_E&hl=en&ehbc=2E312F');
 //$api_key = get_theme_mod('google_maps_api_key', '');
 ?>

<!-- script remove console warns sobre google maps 
<script>
window.onload = () => {console.clear()}
</script> -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
        <h2><?php _e('Contact', 'tempo'); ?></h2>
        <h3><?php echo wp_kses_post(get_theme_mod('contact_title', 'Contact <span>Us</span>')); ?></h3>

          <p><?php echo esc_html(get_theme_mod('contact_description', 'Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.')); ?></p>
        </div>

        <div>
          <?php


          if (!empty($custom_url)) {
          echo '<iframe 
              src="' . esc_url($custom_url) . '" 
              class="responsive-iframe-maps" allowfullscreen="yes" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
          </iframe>';
          }
          ?>


        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4><?php _e('Location:', 'tempo'); ?></h4>
                <p><?php echo esc_html(get_theme_mod('contact_location', 'A108 Adam Street, New York, NY 535022')); ?></p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p><?php echo esc_html(get_theme_mod('contact_email', 'contact@example.com')); ?></p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4><?php _e('Call:', 'tempo'); ?></h4>
                <p><?php echo esc_html(get_theme_mod('contact_phone', '123-456-7890')); ?></p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0 mb-5">

          <?php
        $contact_form_shortcode = get_theme_mod('contact_form_shortcode', '[custom_contact_form]');
        if (!empty($contact_form_shortcode)) {
            echo do_shortcode($contact_form_shortcode);
        }
        ?>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
