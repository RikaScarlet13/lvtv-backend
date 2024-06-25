@extends('layout')

@section('title', 'Dashboard')

@section('content')
<div class="row">
  <div class="col-xs-12 col-sm-3">
    @include('sidebar') <!-- Include the sidebar -->
  </div>
  
  <div class="col-xs-12 col-sm-9">
    <div class="well">
      <h4>Dashboard</h4>
      <p>Some text..</p>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-6">
        <div class="well" style="max-height: 300px; overflow-y: auto;">
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
      <div class="col-xs-12 col-sm-6">
        <div class="well">
          <a href="{{ route('approval') }}" class="btn btn-primary">Pending User Approvals</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
