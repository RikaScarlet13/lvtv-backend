<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="m-5">
                <div class="card">
                    <div class="card-body">
                        <div id="status-message" class="alert alert-info" style="display: none;"></div>

                        <form id="login-form" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                                <span class="text-danger" id="email-error"></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                <span class="text-danger" id="password-error"></span>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                                <label class="form-check-label" for="remember_me">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                        
                        @if (Route::has('password.request'))
                        <div class="mt-3">
                            <a href="{{ route('password.request') }}">Forgot your password?</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#login-form').on('submit', function(e) {
            e.preventDefault();

            $('#email-error').text('');
            $('#password-error').text('');
            $('#status-message').hide().text('');

            $.ajax({
                url: "{{ route('login') }}",
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        window.location.href = response.redirectUrl;
                    } else {
                        if (response.field === 'email') {
                            $('#email-error').text(response.message);
                        } else if (response.field === 'password') {
                            $('#password-error').text(response.message);
                        } else if (response.field === 'status') {
                            $('#status-message').text(response.message).show();
                        }
                    }
                },
                error: function(xhr) {
                    var errors = xhr.responseJSON.errors;
                    if (errors.email) {
                        $('#email-error').text(errors.email[0]);
                    }
                    if (errors.password) {
                        $('#password-error').text(errors.password[0]);
                    }
                }
            });
        });
    });
    </script>

</body>
</html>
