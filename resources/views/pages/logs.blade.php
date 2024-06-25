@extends('layout')

@section('title', 'Logs')

@section('content')
<div class="container-fluid">
  <div class="row content">
    @include('sidebar') <!-- Include the sidebar -->
  </div>
    <div class="col-sm-9">
      <div class="container py-5">
        <div class="text-center">
          <h2 class="font-weight-bold mb-5">Logs</h2>
        </div>
        <div class="card">
          <div class="card-header">
            Logs Overview
          </div>
          <div class="card-body">
            <h5 class="card-title">Recent Logs</h5>
            <p class="card-text">Here are the recent activities and logs of the system.</p>
            <ul class="list-group">
              <li class="list-group-item">Log 1: Activity description goes here.</li>
              <li class="list-group-item">Log 2: Activity description goes here.</li>
              <li class="list-group-item">Log 3: Activity description goes here.</li>
              <!-- Add more logs as needed -->
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
