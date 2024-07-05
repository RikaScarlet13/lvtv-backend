<style>
.row.content {
    height: 100vh; /* Full viewport height */
}
.sidenav {
    background-color: #232848;
    height: 100%;
    padding: 20px;
    width: 15%;
    position: fixed;
    top: 0;
    left: 0;
    display: flex;
    flex-direction: column;
}
.sidenav .nav {
    flex-grow: 1;
}
.logout-container {
    margin-top: auto;
}
.main-content {
    margin-left: 15%; /* Same width as the sidebar */
    padding: 20px;
    height: 100vh;
    overflow-y: auto; /* Allow scrolling */
}
.navbar-header img,
.sidenav img {
    max-width: 100%;
    height: auto;
    width: 100px;
    display: block;
    margin: 0 auto;
    margin-bottom: 10px;
}
.well {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
    margin-top: 20px;
}
.table-bordered {
    margin-top: 20px;
}
/* Modal Content */
.modal-content {
    padding: 20px;
}
/* Form Sections */
section {
    margin-bottom: 20px;
}
/* Form Headers */
section header {
    margin-bottom: 10px;
}
/* Form Labels */
section label {
    display: inline-block;
    width: 120px; /* Adjust width as needed */
    margin-bottom: 5px;
}
/* Form Inputs */
section input[type="text"],
section input[type="email"],
section input[type="password"] {
    width: calc(100% - 120px); /* Adjust width to align with label width */
    padding: 8px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
/* Error Messages */
.input-error {
    color: red;
    font-size: 12px;
}
/* Button Alignment */
section .flex-buttons {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    margin-top: 10px;
}
/* Button Styles */
.primary-button, .secondary-button, .danger-button {
    padding: 10px 20px;
    font-size: 14px;
    cursor: pointer;
    border: none;
    border-radius: 4px;
}
.primary-button {
    background-color: #4CAF50;
    color: white;
}
.secondary-button {
    background-color: #f0f0f0;
    color: black;
}
.danger-button {
    background-color: #f44336;
    color: white;
}
.modal-content p {
    max-width: 100%;
    word-wrap: break-word;
    overflow-wrap: break-word;
}
@media screen and (max-width: 767px) {
    .row.content {
        height: auto;
    }
    .sidenav {
        position: static;
        width: 100%;
    }
    .main-content {
        margin-left: 0;
    }
}
</style>

<div class="col-sm-3 sidenav hidden-xs">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-responsive">
    <ul class="nav nav-pills nav-stacked flex-column flex-grow-1">
        <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
            <a href="{{ route('home') }}">Admin Dashboard</a>
        </li>  
        <li class="{{ request()->routeIs('usersPage') ? 'active' : '' }}">
            <a href="{{ route('usersPage') }}">Users</a>
        </li>
        @if(Auth::user()->role !== 'streamer')
        <li class="{{ request()->routeIs('approval') ? 'active' : '' }}">
            <a href="{{ route('approval') }}">Pending Approval</a>
        </li>
        <li class="{{ request()->routeIs('logs') ? 'active' : '' }}">
            <a href="{{ route('logs') }}">Logs</a>
        </li>
        @endif
        <!-- Example additional menu item -->
        <!-- <li class="{{ request()->routeIs('archives') ? 'active' : '' }}">
            <a href="{{ route('archives') }}">Archives</a>
        </li> -->
        <li class="{{ request()->routeIs('authHome') ? 'active' : '' }}">
            <a href="{{ route('authHome') }}">Access LVTV Website</a>
        </li>
        <!-- <li class="">
            <a href="">Owncast</a>
        </li> -->
        <li class="{{ request()->routeIs('owncastAdmin') ? 'active' : '' }}">
            <a href="{{ route('owncastAdmin') }}" target="_blank">Owncast Admin</a>
        </li>
    </ul>
    <div class="logout-container">
        <ul class="nav nav-pills nav-stacked flex-column flex-grow-1">
            <li><a href="#" class="profile-name" data-toggle="modal" data-target="#profileModal">Profile</a></li>
        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger btn-block">Logout</button>
        </form>
    </div>
</div>

<!-- Profile Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="profileForm">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password if you want to change it">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm new password">
                    </div>
                </form>
                <!-- Error and success messages -->
                <div id="errorMessages" class="alert alert-danger mt-3" style="display:none"></div>
                <div id="successMessage" class="alert alert-success mt-3" style="display:none"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveProfileButton">Save changes</button>
            </div>
        </div>
    </div>
</div>
