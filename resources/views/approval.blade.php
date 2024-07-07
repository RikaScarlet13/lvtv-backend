@extends('layout')

@section('title', 'User Approvals')

@section('content')
<div class="row">
  <div class="col-xs-12 col-sm-3">
    @include('sidebar') <!-- Include the sidebar -->
  </div>
  
  <div class="col-md-9">
    <div class="well">
      <h4>Pending User Approvals</h4>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
              <form action="{{ route('approveUser', $user->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('PATCH')
                <button type="button" class="btn btn-success" onclick="confirmAction(this.form, 'approve')">Approve</button>
              </form>
              <form action="{{ route('denyUser', $user->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger" onclick="confirmAction(this.form, 'deny')">Deny</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      
      {{-- <div class="pagination-info">
        <p>Page {{ $users->currentPage() }} of {{ $users->lastPage() }}</p>
      </div> --}}
      
      {{-- <!-- Pagination Links -->
      <div class="text-center">
        {{ $users->links() }}
      </div> --}}
      
    </div>
  </div>
</div>

<script>
  function confirmAction(form, action) {
    const message = `Are you sure you want to ${action} this user?`;
    if (confirm(message)) {
      form.submit();
    }
  }
</script>
@endsection
