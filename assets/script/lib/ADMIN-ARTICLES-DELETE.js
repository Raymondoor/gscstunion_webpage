document.addEventListener('DOMContentLoaded', function() {
    // Select all buttons with the class 'show'
    var showButtons = document.querySelectorAll('.show');

    // Add click event listener to each button
    showButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            // Get the ID of the form to show from the button's data attribute
            var formId = this.getAttribute('data-target');
            // Find the form by ID
            var form = document.getElementById(formId);
            
            // Toggle visibility of the form
            if (form.classList.contains('hidden')) {
                // Hide all forms first to ensure only one is visible
                var allForms = document.querySelectorAll('.confirm');
                allForms.forEach(f => f.classList.add('hidden'));
                
                // Then show this form
                form.classList.remove('hidden');
            } else {
                // If the form is already visible, hide it
                form.classList.add('hidden');
            }
        });
    });
});