<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Admin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="m-5">
            <div class="card">
                <div class="card-body">
                    <form id="createAdminForm" action="{{ route('storeAdmin') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="terms" name="terms" disabled required>
                            <label class="form-check-label" for="terms">I agree to the <a href="#" id="termsConditionsLink">Terms of Use</a></label>
                        </div>
                        <input type="hidden" name="role" value="viewer">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>

                    @if(session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div id="errorMessages" class="alert alert-danger mt-3" style="display: none;">
                        <ul class="mb-0">
                            <!-- Errors will be displayed here dynamically -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Terms and Conditions -->
<div class="modal fade" id="termsConditionsModal" tabindex="-1" role="dialog" aria-labelledby="termsConditionsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsConditionsModalLabel">Terms of Use</h5>
                <button type="button" class="close" id="closeTermsConditionsBtn" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul>
                    <li><span class="font-weight-bold">User Role:</span> Registering into this system will give you a default role as a 'Viewer'. A 'Viewer' will have full access of the website and will be able to watch our live stream sessions</li>
                    <li><span class="font-weight-bold">Lawful Conduct:</span> Use LVTV in accordance with all applicable laws and regulations. You must not use the site for any illegal activities or to promote any illegal acts.</li>
                    <li><span class="font-weight-bold">Content Posting:</span> Ensure any content you upload or post is appropriate and does not contain offensive, defamatory, obscene, or unlawful material. Respect intellectual property rights and do not upload content you do not own or have permission to use.</li>
                    <li><span class="font-weight-bold">Respectful Interaction:</span> Engage with other users in a respectful manner. Avoid any form of harassment, bullying, or abusive behavior.</li>
                    <li><span class="font-weight-bold">Security:</span> Keep your account information confidential and secure. You are responsible for all activities that occur under your account. Notify us immediately if you suspect any unauthorized use of your account.</li>
                    <li><span class="font-weight-bold">Accurate Information:</span> Provide accurate and truthful information when creating an account or interacting on LVTV. Do not impersonate others or provide misleading information.</li>
                    <li><span class="font-weight-bold">System Integrity:</span> Do not attempt to interfere with the operation of LVTV. This includes, but is not limited to, uploading or distributing viruses, hacking, or any other activity that disrupts LVTV’s functionality.</li>
                    <li><span class="font-weight-bold">Feedback and Reporting:</span> If you encounter any issues or see any content or behavior that violates these terms, report it to LVTV administrators promptly.</li>
                </ul>
                <p class="text-justify">
                    Failure to comply with these responsibilities may result in the suspension or termination of your access to LVTV.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeTermsConditionsBtn2">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Enable checkbox only when terms link is clicked
        $('#termsConditionsLink').on('click', function(event) {
            event.preventDefault();
            $('#termsConditionsModal').modal('show');
        });

        $('#closeTermsConditionsBtn').on('click', function(event) {
            $('#termsConditionsModal').modal('hide');
        });

        $('#closeTermsConditionsBtn2').on('click', function(event) {
            $('#termsConditionsModal').modal('hide');
        });

        // When terms modal is closed, enable terms checkbox
        $('#termsConditionsModal').on('hidden.bs.modal', function (e) {
            $('#terms').prop('disabled', false);
        });

        // Handle form submission via AJAX
        $('#createAdminForm').on('submit', function(event) {
            event.preventDefault();
            
            // Check if terms checkbox is checked
            if (!$('#terms').is(':checked')) {
                $('#errorMessages').html('<ul><li>Please click and read the Terms of Use before registering.</li></ul>').show();
                return;
            }

            var formData = $(this).serialize();
            
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('#errorMessages').hide();
                    $('#createAdminForm')[0].reset();
                    $('#termsConditionsModal').modal('show');
                    $('#createAdminForm').prepend('<div class="alert alert-success mt-3">Registration complete. Please wait for admin approval.</div>');
                },
                error: function(xhr, status, error) {
                    var errors = xhr.responseJSON.errors;
                    var errorList = '<ul>';
                    $.each(errors, function(key, value) {
                        errorList += '<li>' + value + '</li>';
                    });
                    errorList += '</ul>';
                    $('#errorMessages').html(errorList).show();
                }
            });
        });
    });
</script>

</body>
</html>
