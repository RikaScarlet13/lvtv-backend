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
      <a href="{{ route('home') }}">Dashboard</a>
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
    <li class="{{ request()->routeIs('archives') ? 'active' : '' }}">
      <a href="{{ route('archives') }}">Archives</a>
    </li>
    <li class="{{ request()->routeIs('authHome') ? 'active' : '' }}">
      <a href="{{ route('authHome') }}">Dashboard</a>
    </li>
    <li class="">
      <a href="">Owncast</a>
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






        <!-- Success and Error Messages -->
        <!-- @if(session('success'))
          <div class="alert alert-success mt-3">
            {{ session('success') }}
          </div>
        @endif

        @if($errors->any())
          <div class="alert alert-danger mt-3">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" form="profile-edit-form" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->
