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
                @if(Auth::check() && Auth::user()->role === 'super_admin' && Auth::user()->id !== $user->id)
                  <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Change Role
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      @if($user->role === 'admin')
                        <li>
                          <a href="#" onclick="event.preventDefault(); document.getElementById('demote-to-streamer-{{ $user->id }}').submit();">Demote to Streamer</a>
                          <form id="demote-to-streamer-{{ $user->id }}" action="{{ route('users.updateRole', $user->id) }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="role" value="streamer">
                          </form>
                        </li>
                      @elseif($user->role === 'streamer')
                        <li>
                          <a href="#" onclick="event.preventDefault(); document.getElementById('promote-to-admin-{{ $user->id }}').submit();">Promote to Admin</a>
                          <form id="promote-to-admin-{{ $user->id }}" action="{{ route('users.updateRole', $user->id) }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="role" value="admin">
                          </form>
                        </li>
                      @endif
                    </ul>
                  </div>
                @endif
              </td>
              <td>
                @if(Auth::check() && Auth::user()->id !== $user->id)
                  <!-- Delete button with confirmation -->
                  <form action="{{ route('deleteUser', ['id' => $user->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete {{ $user->name }}?')">Delete</button>
                  </form>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
