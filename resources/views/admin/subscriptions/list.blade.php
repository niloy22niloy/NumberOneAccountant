@extends('admin.dashboard')

@section('content')
    <div class="container-fluid py-5">
        <h2 class="mb-4">Total Transaction List</h2>

        <div class="card shadow-sm rounded">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="transactionTable" class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#ID</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Subscription Plan</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Payment Method</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->id }}</td>
                                    <td>{{ $transaction->user?->name ?? 'N/A' }}</td>
                                    <td>{{ $transaction->user?->email ?? 'N/A' }}</td>
                                    <td>{{ $transaction->plan_name ?? 'N/A' }}</td>
                                    <td>${{ number_format($transaction->amount, 2) }}</td>
                                    <td>
                                        @if ($transaction->status == 'success')
                                            <span class="badge bg-success">Success</span>
                                        @elseif($transaction->status == 'pending')
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @else
                                            <span class="badge bg-danger">Failed</span>
                                        @endif
                                    </td>
                                    <td>{{ ucfirst($transaction->payment_method) }}</td>
                                    <td>{{ $transaction->created_at->format('Y-m-d H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            $(document).ready(function() {
                $('#transactionTable').DataTable({
                    order: [
                        [0, 'desc']
                    ],
                });
            });
        </script>
    @endpush
@endsection
