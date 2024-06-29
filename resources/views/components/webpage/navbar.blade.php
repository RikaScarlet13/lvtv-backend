<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <style>
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
            
        }

        .modal-body {
            border-radius: 3px;        
        }

        .nav-tabs {
            
            color: #212529;
            border-radius: 3px;
        }

        .navbar-nav {
            justify-content: space-between;
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
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="/TeleRadio">TeleRadio</a>
                        </li> -->
                        <li class="nav-item dropdown me-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Courses
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                <li><a class="dropdown-item" href="/courses/Bab">BAB</a></li>
                                <li><a class="dropdown-item" href="/courses/BsisAct">BSIS/ACT</a></li>
                                <li><a class="dropdown-item" href="/courses/BsaBsais">BSA/BSAIS</a></li>
                                <li><a class="dropdown-item" href="/courses/Bssw">BSSW</a></li>
                            </ul>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link" href="/our-story">Our Story</a>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Archives
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                <li><a class="dropdown-item" href="/Archives">Archives</a></li>
                                <li><a class="dropdown-item" href="/PastArchives">Past Archives</a></li>
                            </ul>
                        </li> -->
                    </ul>
                </div>
                <div>
                    <button class="btn btn-warning me-2" onclick="toggleLoginModal()">Log In</button>
                </div>
            </div>
        </nav>
    </header>

    <!-- Login Modal -->
    

    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="authTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-controls="login" aria-selected="true">Log In</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab" aria-controls="register" aria-selected="false">Register</button>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                        @include('loginAdmin')
                    </div>
                    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                        @include('createAdminPage')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>

    <script>
        function toggleLoginModal() {
            var myModal = new bootstrap.Modal(document.getElementById('loginModal'), {
                keyboard: false
            });
            myModal.toggle();
        }
    </script>
</body>
</html>
