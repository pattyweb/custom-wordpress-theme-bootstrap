<?php
// Retrieve values from Customizer settings
$header_title = get_theme_mod('set_header_title', 'WE ARE A CREATIVE AGENCY');
$header_title_2 = get_theme_mod('set_header_title_2', 'Welcome to Tempo');
$header_subtitle = get_theme_mod('set_header_subtitle', 'Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.');
$header_button_text = get_theme_mod('set_header_button_text', 'Read More');
$header_button_link = esc_url(get_theme_mod('set_header_button_link', '#'));

// Retrieve header image attachment ID
$header_image_id = get_theme_mod('set_header_image');

// Use the attachment ID to get the image URL
$header_image = $header_image_id ? wp_get_attachment_url($header_image_id) : 'https://pattyweb.com.br/images/hero-bg.jpg';
?>

<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container opacity-50" style="background: url('<?php echo esc_url($header_image); ?>') no-repeat center top; background-size: cover;"></div>

    <div class="hero-container">
        <h3><?php echo esc_html($header_title_2); ?></h3>
        <h1><?php echo esc_html($header_title); ?></h1>
        <h2><?php echo esc_html($header_subtitle); ?></h2>
        <a href="<?php echo esc_url($header_button_link); ?>" class="btn-get-started scrollto"><?php echo esc_html($header_button_text); ?></a>
    </div>
</section><!-- End Hero -->
