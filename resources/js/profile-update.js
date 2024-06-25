// custom.js
$(document).ready(function() {
    $('#updatePasswordBtn').click(function(e) {
        e.preventDefault(); // Prevent default form submission

        // Gather form data
        var formData = $('#updatePasswordForm').serialize();

        // AJAX request
        $.ajax({
            url: $('#updatePasswordForm').attr('action'), // Form action URL
            type: 'PUT', // Form method
            data: formData, // Form data
            success: function(response) {
                // Handle success response
                $('#passwordUpdateStatus').text('Saved.'); // Display success message
                setTimeout(function() {
                    $('#passwordUpdateStatus').text(''); // Clear success message after 2 seconds
                }, 2000);
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText);
                alert('Error updating password. Please try again.'); // Replace with more sophisticated error handling
            }
        });
    });
});
