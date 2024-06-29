@extends('layout')

@section('title', 'Logs')

@section('content')
<div class="container-fluid">
    <div>
        @include('sidebar') <!-- Include the sidebar -->
    </div>
    <div class="col-sm-9">
        <div class="container py-5">
            <div class="text-center">
                <h2 class="font-weight-bold mb-5">Logs</h2>
            </div>
            <div class="card">
                <div class="card-header">
                    User Activity Logs
                </div>
                <div class="card-body">
                    <h5 class="card-title">Recent User Activities</h5>
                    <p class="card-text">Here are the recent activities of users:</p>
                    <ul class="list-group">
                        @foreach($logs as $log)
                            <li class="list-group-item">
                                {{ $log->user->name }} {{ $log->activity }} at {{ \Carbon\Carbon::parse($log->timestamp)->format('Y-m-d H:i:s') }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
