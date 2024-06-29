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
        height: 38px; /* Adjust the height to match the dropdown */
        margin-top: 15px;
    }

    .logs-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .logs-table th,
    .logs-table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
    }

    .logs-table th {
        background-color: #f2f2f2;
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

                    <!-- Logs Table -->
                    <table class="logs-table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Activity</th>
                                <th>Date</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($logs as $log)
                            <tr>
                                <td>{{ $log->user->name }}</td>
                                <td>{{ $log->activity }}</td>
                                <td>{{ \Carbon\Carbon::parse($log->timestamp)->setTimezone('Asia/Manila')->format('Y-m-d') }}</td>
                                <td>{{ \Carbon\Carbon::parse($log->timestamp)->setTimezone('Asia/Manila')->format('H:i:s') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
