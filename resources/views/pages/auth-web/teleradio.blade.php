<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<style>
    body, h1, h2, h3, h4, h5, h6, p, a, div, span, input, button {
    font-family: 'Poppins', sans-serif;
}
    .program{
        width: 10px;
        height: 10px;
    }
    .custom-card {
        width: 18rem; /* Adjust the width as needed */
        height: 12rem; /* Adjust the height as needed */
    }
    .custom-card img {
        object-fit: cover;
        height: 100%;
    }

    .text-primary {
        color: #232848 !important;
    }

    .text-4xl{
        color: #232848;
    }

    
</style>
<body>
<div>
@include('components.auth-webpage.auth-navbar')
    <!-- Add your other components and content here -->
    <div class="container my-5">
        <div class="mb-5">
            <div class="text-center mb-4">
                <h1 class="text-4xl fw-bold mt-5">TeleRadio</h1>
            </div>
            <div class="border-top border-3 border-warning my-4"></div>
            <div class="d-flex justify-content-center align-items-center">
                <div class="position-relative p-4">
                    <div class="position-absolute w-100 h-100 bg-light" style="cursor: pointer;" onclick="window.open('http://128.199.166.235:8080/', '_blank')"></div>
                    <iframe
                        src="http://128.199.166.235:8080/embed/video"
                        width="854"
                        height="480"
                        frameborder="0"
                        scrolling="no"
                        class="w-100"
                    ></iframe>
                </div>
            </div>
        </div>
        
        <!-- Programs Start -->
        <div>
            <div class="text-center pt-4">
                <h2 class="h2 font-weight-bold text-primary">Programs</h2>
            </div>
            <div class="d-flex justify-content-center flex-wrap gap-4 mt-4">
                <div class="m-3">
                    <div class="card shadow-lg custom-card">
                        <img
                            src="{{ asset('images/programs/program1.jpg') }}"
                            class="card-img-top"
                            alt="program 1"
                        />
                    </div>
                    <div class="card shadow-lg mt-4 custom-card">
                        <img
                            src="{{ asset('images/programs/program2.jpg') }}"
                            class="card-img-top"
                            alt="program 2"
                        />
                    </div>
                    <div class="card shadow-lg mt-4 custom-card">
                        <img
                            src="{{ asset('images/programs/program3.jpg') }}"
                            class="card-img-top"
                            alt="program 3"
                        />
                    </div>
                    <div class="card shadow-lg mt-4 custom-card">
                        <img
                            src="{{ asset('images/programs/program4.jpg') }}"
                            class="card-img-top"
                            alt="program 4"
                        />
                    </div>
                </div>
                <div class="m-3">
                    <div class="card shadow-lg custom-card">
                        <img
                            src="{{ asset('images/programs/program5.jpg') }}"
                            class="card-img-top"
                            alt="program 5"
                        />
                    </div>
                    <div class="card shadow-lg mt-4 custom-card">
                        <img
                            src="{{ asset('images/programs/program6.jpg') }}"
                            class="card-img-top"
                            alt="program 6"
                        />
                    </div>
                    <div class="card shadow-lg mt-4 custom-card">
                        <img
                            src="{{ asset('images/programs/program7.jpg') }}"
                            class="card-img-top"
                            alt="program 7"
                        />
                    </div>
                    <div class="card shadow-lg mt-4 custom-card">
                        <img
                            src="{{ asset('images/programs/program8.jpg') }}"
                            class="card-img-top"
                            alt="program 8"
                        />
                    </div>
                </div>
            </div>
        </div>
        <!-- Programs End -->
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlUzQNwHl5WElE6KEe3BwSr0gWf/cOUxaJrfRY0hK6CZ11qZl1tFZCpcp4F" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-QksZHU+SIL+j4U4mI/DK2GmZVLVV0Wq1Kr3/Z3eo0EYrmhS4F4yeYb43wxzSy0Jh" crossorigin="anonymous"></script>

<footer>
    @include('components.auth-webpage.auth-footer')
</footer>

</body>


</html>
