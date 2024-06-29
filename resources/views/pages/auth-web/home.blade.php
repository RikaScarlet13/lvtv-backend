<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style>
    .program{
        width: 10px;
        height: 10px;
    }

</style>
<body>
    <div>
        
        @include('components.auth-webpage.auth-navbar')

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
                            <h1>About</h1>
                            <p class="lead mt-3">
                                Creating a convenient streaming website that provides Bachelor of Arts in Broadcasting (BAB) <br>
                                students in La Verdad Christian College with an effective and accessible platform for streaming <br>
                                projects among the students of LVCC providing educational resources, engagement among students, <br>
                                participating in live streaming broadcasts, in that way enhancing their learning endeavors and <br>
                                providing academic excellence in the field of broadcasting.
                            </p>
                        </div>
                    </div>
                    <div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            <h2 class="text-center">Schedules & Programs</h2>
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <div class="mb-4">
                        <!-- <h1 class="text-2xl myFont py-3 text-center">Schedules & Programs</h1> -->
                    </div>
                    <div class="d-flex mb-4 bg-white shadow hover:shadow-lg p-3 rounded">
                        <div class="program w-25 h-25 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('images/programs/program8.jpg') }}" alt="program 8" class="img-fluid" />
                        </div>
                        <div class="ml-3">
                            <h5 class="font-weight-bold">INTRAMURALS</h5>
                            <article>
                                Synergized La Verdarians:
                                <br /> Embracing Excellence Through
                                <br /> Sports and Good Works
                            </article>
                            <p class="font-weight-bold mt-2">December 8-10</p>
                        </div>
                    </div>
                    <div class="d-flex mb-4 bg-white shadow hover:shadow-lg p-3 rounded">
                        <div class="program w-25 h-25 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('images/programs/program6.jpg') }}" alt="program 6" class="img-fluid" />
                        </div>
                        <div class="ml-3">
                            <h5 class="font-weight-bold">Mr & Ms Commweek</h5>
                            <article>
                                #PromotingFilipinoValues
                                <br /> AndCulture
                            </article>
                            <p class="font-weight-bold mt-2">January 12-14</p>
                        </div>
                    </div>
                    <div class="d-flex mb-4 bg-white shadow hover:shadow-lg p-3 rounded">
                        <div class="program w-25 h-25 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('images/programs/program3.jpg') }}" alt="program 3" class="img-fluid" />
                        </div>
                        <div class="ml-3">
                            <h5 class="font-weight-bold">FIESTANGHALIAN</h5>
                            <article>
                                Makisaya sa nagiisang
                                <br /> Fiesta ng Sambayanan
                            </article>
                            <p class="font-weight-bold mt-2">January 10</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h2 class="text-center">Recent Programs</h2>
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <div class="d-flex mb-4 bg-white shadow hover:shadow-lg p-3 rounded">
                        <img src="{{ asset('images/programs/program5.jpg') }}" alt="program 5" class="img-fluid w-100" />
                    </div>
                    <div class="d-flex mb-4 bg-white shadow hover:shadow-lg p-3 rounded">
                        <img src="{{ asset('images/programs/program1.jpg') }}" alt="program 1" class="img-fluid w-100" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-5">
        <div class="col-12 text-center">
            <h1>School News and Upcoming Events</h1>
        </div>
        <div class="col-12">
            <div class="card mb-3 shadow-sm">
                <img src="{{ asset('images/foundation week banner.jpg') }}" class="card-img-top img-fluid" alt="Foundation Banner" />
            </div>
            <div class="card mb-3 shadow-sm">
                <img src="{{ asset('images\zoomustahan.png') }}" class="card-img-top img-fluid" alt="Zoomustahan" />
            </div>
        </div>
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
    @include('components.auth-webpage.auth-footer')
</footer>

</body>


</html>
