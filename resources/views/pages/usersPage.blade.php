<!DOCTYPE html>
<html lang="en">
<head>
  <title>Users Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .row.content {height: 100vh;}
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
      .row.content {height: auto;}
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
        <h4>Users</h4>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Name</th>
              <th>Role</th>
              <th>Actions</th> <!-- New column for actions -->
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
              <tr>
                <td>{{ $user->name }}</td>
                <td>
                  {{ $user->role }}
                  <!-- Dropdown for role change -->
                  <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Change Role
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <li><a href="#">Promote to Admin</a></li>
                      <li><a href="#">Promote to Super Admin</a></li>
                      <li><a href="#">Demote to Admin</a></li>
                      <li><a href="#">Demote to Streamer</a></li>
                    </ul>
                  </div>
                </td>
                <td>
                  <!-- Delete button with confirmation -->
                  <form action="{{ route('deleteUser', ['id' => $user->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete {{ $user->name }}?')">Delete</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

</body>
</html>
