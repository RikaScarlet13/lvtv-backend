<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    

    <style>
        body, h1, h2, h3, h4, h5, h6, p, a, div, span, input, button {
            font-family: 'Poppins', sans-serif;
        }
        .custom-header {
            background-color: #232848;
            color: white;
        }
        .nav-link {
            color: #212529;
            background-color: #FFBC42;
            border-radius: 3px;
        }
        .nav-item {
            text-align: center;
        }

        .modal-header {
            background-color: #232848;
            color: white;
            border-bottom: none; /* Remove bottom border for cleaner look */
        }

        .modal-body {
            border-radius: 10px;
            padding: 20px;
            text-align: center;
        }

        .modal-footer {
            justify-content: center;
            border-top: none; /* Remove top border for cleaner look */
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .profile-info {
            margin-bottom: 20px;
        }

        .profile-info p {
            margin-bottom: 5px;
        }

        .logout-button {
            width: 100%;
            max-width: 200px;
            padding-left: 70px;
        }
    </style>
</head>
<body>
    <header class="custom-header">
        <nav class="navbar navbar-expand-lg navbar-light custom-header">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="d-inline-block align-text-top" height="50">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item me-3">
                            <a class="btn btn-warning me-2" href="/auth-home">Home</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="btn btn-warning me-2" href="/teleradio">TeleRadio</a>
                        </li>
                        <li class="nav-item dropdown me-3">
                            <a class="btn btn-warning me-2 dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Courses
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                <li><a class="dropdown-item" href="/auth-bab">BAB</a></li>
                                <li><a class="dropdown-item" href="/auth-ict">BSIS/ACT</a></li>
                            </ul>
                        </li>
                        <li class="nav-item me-3">
                            <a class="btn btn-warning me-2" href="/auth-our-story">Our Story</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="btn btn-warning me-2" href="/archives">Archives</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex">
                    <button class="btn btn-warning me-2" onclick="openOwncast()">Watch Live</button>
                    @if(Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->role === 'super_admin' || Auth::user()->role === 'streamer'))
                        <div>
                            <a href="/home" class="btn btn-warning me-2">Admin Dashboard</a>
                        </div>
                    @endif
                    <button class="btn btn-warning me-2" data-bs-toggle="modal" data-bs-target="#profileModal">Profile</button>
                </div>
            </div>
        </nav>
    </header>

    <!-- Profile Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('images/profile-pic.jpg') }}" alt="Profile Picture" class="profile-picture">
                    @auth
                        <div class="profile-info">
                            <p>Name: {{ Auth::user()->name }}</p>
                            <p>Email: {{ Auth::user()->email }}</p>
                            <p>Role: ({{ Auth::user()->role }})</p>
                        </div>
                    @else
                        <p>You are not logged in.</p>
                    @endauth
                </div>
                <div class="modal-footer">
                    @auth
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="logout-button">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    @else
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script>
        function openOwncast() {
            window.open('/owncast', '_blank');
        }
    </script>
</body>
</html>
