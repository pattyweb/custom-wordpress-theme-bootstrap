<?php
// Check if the services section should be displayed
$display_services_section = get_theme_mod('display_services_section', true);

// Check if the checkbox is selected
if (!$display_services_section) {
    // The checkbox is not selected, so hide the services section
    return;
}

// Get the customizer repeater field
$another_repeater_example = get_theme_mod('another_repeater_example');

// Decode the JSON and set default values if not defined or empty
$another_repeater_example_decoded = json_decode($another_repeater_example, true);

// Set default values if the array is empty
$default_repeater_item = array(
    'title' => 'Lorem Ipsum',
    'subtitle' => 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi',
    'icon_value' => 'fa-map-signs', // Default Font Awesome icon class
    'image_url' => '', // Default image URL
);

$another_repeater_example_decoded = !empty($another_repeater_example_decoded) ? $another_repeater_example_decoded : array($default_repeater_item);
?>

<!-- ======= Services Section ======= -->
<section id="services" class="services">
    <div class="container">
        <div class="section-title">
            <h2><?php _e('Services', 'tempo'); ?></h2>
            <h3><?php echo wp_kses_post(get_theme_mod('services_title', 'We do offer awesome <span>Services</span>')); ?></h3>
            <p><?php echo esc_html(get_theme_mod('services_description', 'Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.')); ?></p>
        </div>

        <div class="row">
            <?php
            // Display up to three services
            for ($i = 0; $i < min(5, count($another_repeater_example_decoded)); $i++) :
                $repeater_item = $another_repeater_example_decoded[$i];
            ?>
                <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0 mt-3 mx-auto">
                    <div class="icon-box">
                        <div class="icon">
                            <?php
                            // Check if icon_value is an icon class (starts with 'fa' for example)
                            if (strpos($repeater_item['icon_value'], 'fa') === 0) {
                                echo '<i class="fa ' . esc_attr($repeater_item['icon_value']) . '"></i>';
                            } else {
                                // Assume it's an image URL, you might want to add more validation here
                                echo '<img src="' . esc_url($repeater_item['image_url']) . '" alt="Icon">';
                            }
                            ?>
                        </div>
                        <h4 class="title"><?php echo esc_html($repeater_item['title']); ?></h4>
                        <p class="description"><?php echo esc_html($repeater_item['subtitle']); ?></p>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section><!-- End Services Section -->
