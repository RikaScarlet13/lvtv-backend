<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom border-primary">
    <div class="container-fluid">
        <!-- Sidebar Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand (Optional) -->
        <a class="navbar-brand" href="#">LVTV</a>

        <!-- Right Side of Navbar -->
        <div class="d-flex align-items-center w-100">
            <!-- Search Input -->
            <form class="d-flex mx-auto me-3">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85zm-5.44 1.415a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11z"/>
                        </svg>
                    </span>
                    <input class="form-control border-start-0" type="search" placeholder="Search" aria-label="Search">
                </div>
            </form>

            <!-- Right Side Icons -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex align-items-center">
                <!-- Profile Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://images.unsplash.com/photo-1528892952291-009c663ce843?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=296&q=80" class="rounded-circle" width="40" height="40" alt="Your avatar">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Products</a></li>
                        <li><a class="dropdown-item" href="/admin/login">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Sidebar menu -->
<div class="collapse" id="sidebarMenu">
    <div class="bg-light border-right p-4">
        <h5>Sidebar content</h5>
        <ul class="list-unstyled">
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 2</a></li>
            <li><a href="#">Link 3</a></li>
        </ul>
    </div>
</div>

<!-- Bootstrap JS (Ensure this is included in your project) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlUzQNwHl5WElE6KEe3BwSr0gWf/cOUxaJrfRY0hK6CZ11qZl1tFZCpcp4F" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-QksZHU+SIL+j4U4mI/DK2GmZVLVV0Wq1Kr3/Z3eo0EYrmhS4F4yeYb43wxzSy0Jh" crossorigin="anonymous"></script>
