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
                    <p class="card-text">Here are the recent login and logout activities of users:</p>
                    <ul class="list-group">
                        @foreach($users as $user)
                            <li class="list-group-item">
                                User {{ $user->name }}:
                                @if($user->last_login_at)
                                    Logged in at {{ \Carbon\Carbon::parse($user->last_login_at)->format('Y-m-d H:i:s') }}
                                @endif
                                @if($user->last_logout_at)
                                    Logged out at {{ \Carbon\Carbon::parse($user->last_logout_at)->format('Y-m-d H:i:s') }}
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
