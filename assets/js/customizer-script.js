(function($) {
    wp.customize.bind('ready', function() {
        // Add your custom logic to determine whether changes are made to the specific field
        function areChangesMade() {
            // Replace 'customizer_repeater_example' with the actual setting ID
            return wp.customize('customizer_repeater_example').hasChanged();
        }

        // Override the default action of the "Save & Publish" button
        $('#save').on('click', function(event) {
            if (areChangesMade()) {
                // Prevent the default action of the button
                event.preventDefault();
                
                // Optionally, you can display a message to the user or perform other actions
                alert('Changes detected in the specific field. Use a different action if needed.');
            }
        });
    });
})(jQuery);
