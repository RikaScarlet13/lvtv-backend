<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .row.content {
      height: 100vh; /* Set to 100% of the viewport height for full-height sidebar */
    }

    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
      padding: 20px;
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
        <li class="active"><a href="{{ route('home') }}">Dashboard</a></li>
        <li><a href="{{ route('usersPage') }}">Users</a></li>
        <li><a href="{{ route('archives') }}">Archives</a></li>
        <li><a href="{{ route('logs') }}">Logs</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    @include('sidebar') <!-- Include the sidebar -->

    <div class="col-sm-9">
      <div class="well">
        <h4>Dashboard</h4>
        <p>Some text..</p>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="well">
            <h4>Users</h4>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Role</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->role }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="well">
            <h4>Pages</h4>
            <p>100 Million</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
