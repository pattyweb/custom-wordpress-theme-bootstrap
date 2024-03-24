<?php
// Check if the portfolio section should be displayed
$display_faq_section = get_theme_mod('display_faq_section', true);

// Check if the checkbox is selected
if (!$display_faq_section) {
    // The checkbox is not selected, so hide the portfolio section
    return;
}

// Get the customizer repeater field
$customizer_repeater_example = get_theme_mod('customizer_repeater_example');

// Decode the JSON and set default values if not defined or empty
$customizer_repeater_example_decoded = json_decode($customizer_repeater_example, true);

// Set default values if the array is empty
$default_repeater_item = array(
    'title' => 'Non consectetur a erat nam at lectus urna duis?',
    'subtitle' => 'Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.',
);

$customizer_repeater_example_decoded = !empty($customizer_repeater_example_decoded) ? $customizer_repeater_example_decoded : array($default_repeater_item);
?>

<!-- ======= F.A.Q Section ======= -->
<section id="faq" class="faq">
    <div class="container">
        <div class="section-title">
            <h2><?php _e('F.A.Q', 'tempo'); ?></h2>
            <h3><?php echo wp_kses_post(get_theme_mod('faq_title', 'Frequently Asked <span>Questions</span>')); ?></h3>
        </div>

        <ul class="faq-list">
            <?php foreach ($customizer_repeater_example_decoded as $index => $repeater_item) : ?>
                <li>
                    <div data-bs-toggle="collapse" class="collapsed question" href="#faq<?php echo $index + 1 ?>"><?php echo $repeater_item['title']; ?> <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                    <div id="faq<?php echo $index + 1 ?>" class="collapse" data-bs-parent=".faq-list">
                        <p><?php echo $repeater_item['subtitle']; ?></p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section><!-- End F.A.Q Section -->
