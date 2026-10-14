@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Admin - Manage Child Panels</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header">All Child Panels</div>
        <div class="card-body">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Domain</th>
                        <th>Panel Name</th>
                        <th>Markup</th>
                        <th>API Token</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($panels as $panel)
                    <tr>
                        <td>{{ $panel->user_id }}</td>
                        <td><strong>{{ $panel->domain }}</strong></td>
                        <td>{{ $panel->panel_name }}</td>
                        <td>{{ $panel->markup_percentage }}%</td>
                        <td><code>{{ $panel->api_token }}</code></td>
                        <td>
                            <span class="badge bg-{{ $panel->status == 'active' ? 'success' : ($panel->status == 'pending' ? 'warning' : 'danger') }}">
                                {{ ucfirst($panel->status) }}
                            </span>
                        </td>
                        <td>
                            <form action="{{ route('admin.child_panels.update_status', $panel->id) }}" method="POST" class="d-inline">
                                @csrf
                                <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                                    <option value="pending" {{ $panel->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="active" {{ $panel->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="disabled" {{ $panel->status == 'disabled' ? 'selected' : '' }}>Disabled</option>
                                    <option value="rejected" {{ $panel->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">No child panels found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $panels->links() }}
        </div>
    </div>
</div>
@endsection