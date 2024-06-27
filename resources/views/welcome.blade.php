<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div>
        
        @include('components.webpage.navbar')

        <div class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <div class="row align-items-center mb-5">
                        <div class="col-md-6 text-center text-md-left">
                            <h1 class="display-4">LVTV</h1>
                            <p class="lead">
                                Livestreaming Website <br>
                                for La Verdad Christian College <br>
                                to improve academic excellence
                            </p>
                        </div>
                        <div class="col-md-6 text-center">
                            <img class="img-fluid rounded shadow" src="{{ asset('images/heroimage.jpg') }}" alt="Descriptive text">
                        </div>
                    </div>
                    <div class="row my-5">
                        <div class="col-12 text-center">
                            <h1>About LVTV</h1>
                            <p class="lead mt-3">
                                Creating a convenient streaming website that provides Bachelor of Arts in Broadcasting (BAB) <br>
                                students in La Verdad Christian College with an effective and accessible platform for streaming <br>
                                projects among the students of LVCC providing educational resources, engagement among students, <br>
                                participating in live streaming broadcasts, in that way enhancing their learning endeavors and <br>
                                providing academic excellence in the field of broadcasting.
                            </p>
                        </div>
                    </div>
                    <div class="row my-5">
                        <div class="col-md-6">
                            <h2 class="text-center">Schedules & Programs</h2>
                            <div class="card mb-3 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Sample</h5>
                                </div>
                            </div>
                            <div class="card mb-3 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Sample</h5>
                                </div>
                            </div>
                            <div class="card mb-3 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Sample</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h2 class="text-center">Recent Programs</h2>
                            <div class="card mb-3 shadow-sm"></div>
                            <div class="card mb-3 shadow-sm"></div>
                        </div>
                    </div>
                    <div class="row my-5">
                        <div class="col-12 text-center">
                            <h1>School News and Upcoming Events</h1>
                        </div>
                        <div class="col-12">
                            <div class="card mb-3 shadow-sm" style="height: 20rem;"></div>
                            <div class="card mb-3 shadow-sm" style="height: 20rem;"></div>
                        </div>
                    </div>
                    <!-- Commented out section can be included if needed -->
                    <!-- <div class="row my-5">
                        <div class="col-12">
                            <h1>We want to hear from you!</h1>
                            <p class="lead mt-3">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tortor nisl, dictum id pulvinar ut, fringilla bibendum elit. Morbi auctor lectus erat, a interdum magna lobortis vitae. Donec sapien purus, mattis id sollicitudin in, dapibus volutpat elit. Quisque sed dignissim urna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse blandit pharetra sapien at fringilla.
                            </p>
                            <div class="card shadow-sm mt-3">
                                <div class="card-body">
                                    <h5 class="card-title">Search Archives</h5>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlUzQNwHl5WElE6KEe3BwSr0gWf/cOUxaJrfRY0hK6CZ11qZl1tFZCpcp4F" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-QksZHU+SIL+j4U4mI/DK2GmZVLVV0Wq1Kr3/Z3eo0EYrmhS4F4yeYb43wxzSy0Jh" crossorigin="anonymous"></script>

<footer>
    @include('components.webpage.footer')
</footer>

</body>


</html>
