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
                        <li>
                          <a href="#" onclick="event.preventDefault(); document.getElementById('demote-to-viewer-{{ $user->id }}').submit();">Demote to Viewer</a>
                          <form id="demote-to-viewer-{{ $user->id }}" action="{{ route('users.updateRole', $user->id) }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="role" value="viewer">
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
                        <li>
                          <a href="#" onclick="event.preventDefault(); document.getElementById('demote-to-viewer-{{ $user->id }}').submit();">Demote to Viewer</a>
                          <form id="demote-to-viewer-{{ $user->id }}" action="{{ route('users.updateRole', $user->id) }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="role" value="viewer">
                          </form>
                        </li>
                      @elseif($user->role === 'viewer')
                        <li>
                          <a href="#" onclick="event.preventDefault(); document.getElementById('promote-to-admin-{{ $user->id }}').submit();">Promote to Admin</a>
                          <form id="promote-to-admin-{{ $user->id }}" action="{{ route('users.updateRole', $user->id) }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="role" value="admin">
                          </form>
                        </li>
                        <li>
                          <a href="#" onclick="event.preventDefault(); document.getElementById('promote-to-streamer-{{ $user->id }}').submit();">Promote to Streamer</a>
                          <form id="promote-to-streamer-{{ $user->id }}" action="{{ route('users.updateRole', $user->id) }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="role" value="streamer">
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

    <!-- Button to Open Create Admin Modal -->
    @if(Auth::check() && Auth::user()->role === 'super_admin')
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createAdminModal">
        Create Admin
      </button>
    @endif

    <!-- Modal -->
    <div class="modal fade" id="createAdminModal" tabindex="-1" role="dialog" aria-labelledby="createAdminModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="createAdminModalLabel">Create Admin</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('storeAdmin') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
              </div>
              <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
              </div>
              <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role" name="role" required>
                  <option value="">Select Role</option>
                  <option value="super_admin">Super Admin</option>
                  <option value="admin">Admin</option>
                  <option value="streamer">Streamer</option>
                </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create</button>
              </div>
            </form>
            
          </div>
          
        </div>
      </div>
    </div>
    @if(session('success'))
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
  
  
</div>


@endsection
