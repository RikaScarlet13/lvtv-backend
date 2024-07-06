@extends('layout')

@section('title', 'Users Page')

@section('content')
<div class="row">
  <div class="col-xs-12 col-sm-3">
    @include('sidebar') <!-- Include the sidebar -->
  </div>
  
  <div class="col-md-20">
    <div class="well">
      <h4>Users</h4>
      <!-- Search and filter form -->
      <form action="{{ route('usersPage') }}" method="GET" class="form-inline mb-3">
        <div class="form-group mr-2">
          <input type="text" name="search" class="form-control" placeholder="Search by name, email or role" value="{{ request('search') }}">
        </div>
        <div class="form-group mr-2">
          <select name="role" class="form-control">
            <option value="">All Roles</option>
            <option value="super_admin" {{ request('role') == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
            <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="streamer" {{ request('role') == 'streamer' ? 'selected' : '' }}>Streamer</option>
            <option value="viewer" {{ request('role') == 'viewer' ? 'selected' : '' }}>Viewer</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary mr-2">Filter</button>
        <button type="submit" class="btn btn-secondary">Search</button> <!-- Search button -->
      </form>

      <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
        <table class="table table-bordered table-responsive">
          <thead>
            <tr>
              <th>Name</th>
              <th>Role</th>
              @if(Auth::check() && (Auth::user()->role === 'super_admin' || Auth::user()->role === 'admin'))
                <th>Email</th> <!-- Display email for super admin and admin roles -->
              @endif
              @if(Auth::check() && Auth::user()->role !== 'streamer' && Auth::user()->role !== 'admin')
                <th>Actions</th> <!-- Display actions column for roles other than 'streamer' and 'admin' -->
              @endif
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
              <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->role }}</td>
                @if(Auth::check() && (Auth::user()->role === 'super_admin' || Auth::user()->role === 'admin'))
                  <td>{{ $user->email }}</td>
                @endif
                @if(Auth::check() && Auth::user()->role !== 'streamer' && Auth::user()->role !== 'admin')
                  <td class="actions-column">
                    <!-- Dropdown for role change -->
                    @if(Auth::user()->role === 'super_admin' && Auth::user()->id !== $user->id && $user->role !== 'super_admin')
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
                @endif
                @if(Auth::check() && (Auth::user()->role === 'super_admin' || Auth::user()->role === 'admin'))
                  <td class="actions-column">
                    <!-- Delete button with role-based restrictions -->
                    @if((Auth::user()->role === 'super_admin' && $user->role !== 'super_admin') || (Auth::user()->role === 'admin' && ($user->role === 'streamer' || $user->role === 'viewer')))
                      <form action="{{ route('deleteUser', ['id' => $user->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete {{ $user->name }}?')">Delete</button>
                      </form>
                    @endif
                  </td>
                @endif
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="flex items-center justify-content-center">
        <div>
        <nav aria-label="Page navigation">
          <ul class="pagination">
            <li>
              <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
              <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
        </div>
      </div>
    </div>
  </div> 
</div>

<!-- Custom CSS to fix table styling -->
<style>
  .table {
    table-layout: fixed; /* Prevent table from stretching */
    width: 100%;
  }

  .table th, .table td {
    word-wrap: break-word; /* Break words to fit within cells */
    white-space: normal; /* Allow text wrapping */
  }

  .actions-column {
    width: 200px; /* Adjust as needed to prevent overlap */
  }

  .btn-xs {
    padding: 5px 10px; /* Adjust padding for smaller buttons */
    font-size: 12px; /* Adjust font size for smaller buttons */
  }

  /* Add max height to the table container to enable scrolling */
  .table-responsive {
    max-height: 400px;
    overflow-y: auto;
  }
</style>

@endsection
