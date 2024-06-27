@extends('layout')

@section('title', 'Dashboard')

@section('content')
<div class="row">
  <div class="col-xs-12 col-sm-3">
    @include('sidebar') <!-- Include the sidebar -->
  </div>
  
  <div class="col-xs-12 ">
    <div class="">
      <div class="panel-heading">
        <h3 class="">Dashboard</h3>
      </div>
      <div class="panel-body">
        <p>Welcome to your dashboard. Here's an overview of your site.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-6">
      <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Users</h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered">
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
