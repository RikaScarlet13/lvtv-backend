<div class="col-sm-3 sidenav hidden-xs">
  <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-responsive">
  <ul class="nav nav-pills nav-stacked">
    <li><a href="{{ route('profile.edit') }}">{{ Auth::user()->name }}</a></li>
    <li class="active"><a href="{{ route('home') }}">Dashboard</a></li>
    <li><a href="{{ route('usersPage') }}">Users</a></li>
    <li><a href="{{ route('archives') }}">Archives</a></li>
    <li><a href="{{ route('logs') }}">Logs</a></li>
  </ul><br>
</div>