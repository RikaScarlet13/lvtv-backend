<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title', 'Your Website')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">


  
<style>
    body {
        font-family: 'Poppins', sans-serif; /* Apply Poppins font to the entire body */
        font-weight: 400; /* Normal weight for body text */
        font-style: normal; /* Normal style for body text */
    }

    h1, h2, h3, h4, h5, h6 {
        font-family: 'Poppins', sans-serif; /* Apply Poppins font to headings */
        font-weight: 700; /* Bold weight for headings */
        font-style: normal; /* Normal style for headings */
    }

    /* Other CSS styles as per your layout */
    .row.content {
        height: 100vh;
    }

    .sidenav {
        background-color: #232848;
        height: 100%;
        padding: 20px;
        width: 15%;
        position: fixed;
        top: 0;
        left: 0;
        overflow: hidden;
    }

    .main-content {
        margin-left: 15%;
        padding: 20px;
        height: 100vh;
        overflow-y: auto;
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


</head>
<body>

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-responsive">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
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
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-xs-12 col-sm-3 sidenav">
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
      </ul>
      <br>
      <div class="logout-container">
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger btn-block">Logout</button>
        </form>
      </div>
    </div>

    <div class="col-xs-12 col-sm-9">
   
    @yield('content') <!-- This is where the content of the extending views will be injected -->
  </div>
</div>

  </div>
</div>

<footer class="container-fluid">
  <p>Footer content here</p>
</footer>

</body>
</html>