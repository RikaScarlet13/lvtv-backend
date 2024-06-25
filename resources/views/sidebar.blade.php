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
    overflow: hidden; /* Prevent scrolling */
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
  <ul class="nav nav-pills nav-stacked">
    <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
      <a href="{{ route('home') }}">Dashboard</a>
    </li>
    <li class="{{ request()->routeIs('usersPage') ? 'active' : '' }}">
      <a href="{{ route('usersPage') }}">Users</a>
    </li>
    <li class="{{ request()->routeIs('archives') ? 'active' : '' }}">
      <a href="{{ route('archives') }}">Archives</a>
    </li>
    <li class="{{ request()->routeIs('logs') ? 'active' : '' }}">
      <a href="{{ route('logs') }}">Logs</a>
    </li>
    <li class="{{ request()->routeIs('approval') ? 'active' : '' }}">
      <a href="{{ route('approval') }}">Pending Approval</a>
    </li>
    <li class="{{ request()->routeIs('logs') ? 'active' : '' }}">
      <a href="{{ route('logs') }}">Owncast</a>
    </li>
  </ul>
  <div class="logout-container mt-auto">
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-danger btn-block">Logout</button>
    </form>
  </div>
</div>
