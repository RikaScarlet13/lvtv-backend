@extends('layout')

@section('title', 'Users Page')

@section('content')
<div class="row">
  <div class="col-xs-12 col-sm-3">
    @include('sidebar') <!-- Include the sidebar -->
  </div>
  
  <div class="col-xs-12 col-sm-9">
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
@endsection
