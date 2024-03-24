<?php

// Check if the cta section should be displayed
$display_cta_section = get_theme_mod('display_cta_section', true);

// Check if the checkbox is selected
if (!$display_cta_section) {
    // The checkbox is not selected, so hide the cta section
    return;
}

$cta_image = get_theme_mod('cta_image', 'https://pattyweb.com.br/images/cta-bg.jpg'); // Retrieve CTA Image URL from Customizer
$cta_title = get_theme_mod('cta_title', 'Call To Action'); // Retrieve CTA Title from Customizer
$cta_description = get_theme_mod('cta_description', 'Duis aute irure dolor...'); // Retrieve CTA Description from Customizer
$cta_button_text = get_theme_mod('cta_button_text', 'Call To Action'); // Retrieve CTA Button Text from Customizer
$cta_button_link = get_theme_mod('cta_button_link', '#'); // Retrieve CTA Button Link from Customizer
?>
<style>
  .cta {
  background: linear-gradient(rgba(2, 2, 2, 0.5), rgba(0, 0, 0, 0.8)), url('<?php echo esc_url($cta_image); ?>') center center;
  background-size: cover;
  padding: 60px 0;
}  

.cta h3 {
  color: #fff;
  font-size: 28px;
  font-weight: 700;
}

.cta p {
  color: #fff;
}

.cta .cta-btn {
  font-family: "Nunito", sans-serif;
  text-transform: uppercase;
  font-weight: 500;
  font-size: 16px;
  letter-spacing: 1px;
  display: inline-block;
  padding: 8px 28px;
  border-radius: 25px;
  transition: 0.5s;
  margin-top: 10px;
  border: 2px solid #fff;
  color: #fff;
}

.cta .cta-btn:hover {
  background: #e43c5c;
  border: 2px solid #e43c5c;
}

@media (min-width: 1024px) {
  .cta {
    background-attachment: fixed;
  }
}
</style>

<!-- ======= Cta Section ======= -->
<section id="cta" class="cta mt-5 mb-5">
      <div class="container">

        <div class="text-center">
          <h3><?php echo esc_html($cta_title); ?></h3>
          <p><?php echo esc_html($cta_description); ?></p>
            <a class="cta-btn" href="<?php echo esc_url($cta_button_link); ?>"><?php echo esc_html($cta_button_text); ?></a>
        </div>

      </div>
    </section><!-- End Cta Section -->