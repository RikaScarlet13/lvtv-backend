@extends('layout')

@section('title', 'Logs')

@section('content')
<style>
    .filter-form {
        display: flex;
        align-items: center;
        background-color: #f8f9fa;
        border-radius: 5px;
        padding: 15px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .filter-form .form-group {
        flex: 1;
        margin-right: 15px;
    }

    .filter-form button {
        padding-bottom: 10px;
    }
</style>
<div class="container-fluid">
    <div>
        @include('sidebar') <!-- Include the sidebar -->
    </div>
    <div class="col-sm-9">
        <div class="container py-5">
            <div class="text-center mb-4">
                <h2 class="font-weight-bold">Logs</h2>
            </div>
            <div class="card">
                <div class="card-header">
                    User Activity Logs
                </div>
                <div class="card-body">
                    <h5 class="card-title">Recent User Activities</h5>
                    <p class="card-text">Here are the recent activities of users:</p>
                    
                    <!-- Filter Dropdown -->
                    <form method="GET" action="{{ route('logs') }}" class="filter-form mb-4 p-3 rounded shadow-sm bg-light">
                        <div class="row align-items-end">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="filter">Filter by Activity:</label>
                                    <select name="filter" id="filter" class="form-control">
                                        <option value="">-- All Activities --</option>
                                        <option value="logged in" {{ $filter == 'logged in' ? 'selected' : '' }}>Logged In</option>
                                        <option value="logged out" {{ $filter == 'logged out' ? 'selected' : '' }}>Logged Out</option>
                                        <option value="changed role" {{ $filter == 'changed role' ? 'selected' : '' }}>Changed Role</option>
                                        <option value="approved" {{ $filter == 'approved' ? 'selected' : '' }}>Approved User</option>
                                        <option value="denied" {{ $filter == 'denied' ? 'selected' : '' }}>Denied User</option>
                                        <option value="deleted" {{ $filter == 'deleted' ? 'selected' : '' }}>Deleted User</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary w-100" style="padding-bottom: 10px;">Filter</button>
                            </div>
                        </div>
                    </form>

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
