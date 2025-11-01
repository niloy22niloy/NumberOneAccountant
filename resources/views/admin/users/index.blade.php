@extends('admin.dashboard')

@section('content')
    <div class="container-fluid py-5">
        <h2 class="mb-4">Users List</h2>

        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-bottom">
                <h5 class="mb-0 fw-bold">All Users</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subscribed</th>
                                <th>Active Subscription</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->subscriptions->count())
                                            <span class="badge bg-success">Yes</span>
                                        @else
                                            <span class="badge bg-secondary">No</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->subscriptions->where('is_active', 'yes')->count())
                                            <span class="badge bg-primary">
                                                {{ $user->subscriptions->where('is_active', 'yes')->count() }} Active
                                            </span>
                                        @else
                                            <span class="badge bg-warning text-dark">0 Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.users.show', $user->id) }}"
                                            class="btn btn-sm btn-outline-primary">
                                            View
                                        </a>
                                        <a href="{{ route('admin.users.subscriptions', $user->id) }}"
                                            class="btn btn-sm btn-outline-success">
                                            Subscriptions
                                        </a>
                                        <a href="{{ route('admin.users.invoices', $user->id) }}"
                                            class="btn btn-sm btn-outline-info">
                                            Payments
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            @if ($users->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">No users found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
