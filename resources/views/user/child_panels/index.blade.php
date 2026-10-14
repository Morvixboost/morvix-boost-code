@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>My Child Panels</h2>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-header">Create Child Panel</div>
        <div class="card-body">
            <form action="{{ route('user.child_panels.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Panel Domain</label>
                    <input type="text" name="domain" class="form-control" placeholder="panel.yourdomain.com" required>
                </div>
                <div class="mb-3">
                    <label>Panel Name</label>
                    <input type="text" name="panel_name" class="form-control" placeholder="My SMM Panel" required>
                </div>
                <div class="mb-3">
                    <label>Markup Percentage (%)</label>
                    <input type="number" step="0.01" name="markup_percentage" class="form-control" value="10.00" required>
                </div>
                <button type="submit" class="btn btn-primary">Create Panel</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Existing Child Panels</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Domain</th>
                        <th>Name</th>
                        <th>Markup</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($panels as $panel)
                    <tr>
                        <td>{{ $panel->domain }}</td>
                        <td>{{ $panel->panel_name }}</td>
                        <td>{{ $panel->markup_percentage }}%</td>
                        <td>{{ ucfirst($panel->status) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No child panels found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection