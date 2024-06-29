

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Story</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
    .text-primary {
        color: #232848 !important;
    }

    .text-4xl{
        color: #232848;
    }
</style>
<body>

    <div>
        @include('components.webpage.navbar')
        <!-- Add your other components and content here -->
        <div class="container mt-5">
            <!-- Bachelor of Arts in Broadcasting Section -->
            <div class="mb-5">
                <h1 class="text-2xl font-bold">
                    Bachelor of Arts in Broadcasting
                </h1>
                <br>
                <div class="d-flex flex-column align-items-center space-y-4 p-2">
                    <img
                        class="mx-auto rounded-sm banner-size img-fluid shadow-lg"
                        src="{{ asset('images/banner.jpg') }}"
                        alt="Descriptive text"
                    />
                </div>
            </div>
            <!-- Course End -->

            <!-- Events Start -->
            <div>
                <div class="text-center pt-10">
                    <h2 class="text-2xl font-bold text-primary">
                        Events
                    </h2>
                </div>
                <div class="d-flex justify-content-center flex-wrap gap-4">
                    <div class="m-3">
                        <div class="card shadow-lg">
                            <img
                                src="{{ asset('images/bab/bab1.jpg') }}"
                                class="card-img-top"
                                alt="program"
                            />
                        </div>
                        <div class="card shadow-lg mt-4">
                            <img
                                src="{{ asset('images/bab/bab2.jpg') }}"
                                class="card-img-top"
                                alt="program"
                            />
                        </div>
                        <div class="card shadow-lg mt-4">
                            <img
                                src="{{ asset('images/bab/bab3.jpg') }}"
                                class="card-img-top"
                                alt="program"
                            />
                        </div>
                    </div>
                    <div class="m-3">
                        <div class="card shadow-lg">
                            <img
                                src="{{ asset('images/bab/bab4.jpg') }}"
                                class="card-img-top"
                                alt="program"
                            />
                        </div>
                        <div class="card shadow-lg mt-4">
                            <img
                                src="{{ asset('images/bab/bab5.jpg') }}"
                                class="card-img-top"
                                alt="program"
                            />
                        </div>
                        <div class="card shadow-lg mt-4">
                            <img
                                src="{{ asset('images/bab/bab6.jpg') }}"
                                class="card-img-top"
                                alt="program"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Events End -->
    </div>
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>

    @include('components.webpage.footer')
</body>
</html>
