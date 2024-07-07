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

    .logs-table-wrapper {
        width: 100%;
        border: 1px solid #dee2e6;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
        /* overflow-x: auto; */ /* Remove this to remove extra scrollbar */
    }

    .logs-table {
        width: 100%; /* Adjusted to fill the parent container */
        border-collapse: collapse;
    }

    .logs-table thead {
        background-color: #f2f2f2;
        display: table;
        width: calc(100% - 1em);
        table-layout: fixed;
    }

    .logs-table tbody {
        display: block;
        max-height: 350px; /* Adjust as needed */
        overflow-y: auto;
        width: 100%;
    }

    .logs-table th,
    .logs-table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
    }

    .logs-table tbody td {
        display: table-cell;
    }

    .logs-table tbody tr {
        display: table;
        table-layout: fixed;
        width: 100%;
    }

    .logs-table th:nth-child(1),
    .logs-table td:nth-child(1) {
        width: 20%; /* User column */
    }

    .logs-table th:nth-child(2),
    .logs-table td:nth-child(2) {
        width: 20%; /* Activity column */
    }

    .logs-table th:nth-child(3),
    .logs-table td:nth-child(3) {
        width: 20%; /* Date column */
    }

    .logs-table th:nth-child(4),
    .logs-table td:nth-child(4) {
        width: 20%; /* Time column */
    }
</style>
<div class="row">
    <div class="col-md-2">
        @include('sidebar') <!-- Include the sidebar -->
    </div>
    <div class="col-md-20">
        <div class="well">
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

                    <!-- Logs Table Wrapper -->
                    <div class="logs-table-wrapper">
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
                    <div class="pagination-info">
                        <p>Page {{ $logs->currentPage() }} of {{ $logs->lastPage() }}</p>
                      </div>
                    <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $logs->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
