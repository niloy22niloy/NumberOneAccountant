@extends('admin.dashboard')

@section('content')
    <div class="container-fluid py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12 col-sm-12">
                <div class="card shadow rounded border-0">
                    <div class="card-header bg-white border-bottom">
                        <h4 class="mb-0 fw-bold">Total Transaction List</h4>
                    </div>
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table id="transactionTable" class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>#ID</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Subscription Plan</th>
                                        <th>Stripe Customer Id</th>
                                        <th>Stripe Invoice Id</th>
                                        <th>Amount</th>
                                        <th>Status</th>
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
                                            <td>{{ $transaction->stripe_customer_id ?? 'N/A' }}</td>
                                            <td>{{ $transaction->stripe_subscription_id ?? 'N/A' }}</td>
                                            <td>${{ number_format($transaction->price, 2) }}</td>
                                            <td>
                                                @if ($transaction->payment_status == 'success')
                                                    <span class="badge bg-success">Success</span>
                                                @else
                                                    <span class="badge bg-danger">Failed</span>
                                                @endif
                                            </td>
                                            <td>{{ $transaction->created_at->format('Y-m-d H:i') }}</td>
                                        </tr>
                                    @endforeach
                                    @if ($transactions->isEmpty())
                                        <tr>
                                            <td colspan="9" class="text-center text-muted py-4">No transactions found.
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div> <!-- col -->
        </div> <!-- row -->
    </div> <!-- container-fluid -->
@endsection

@section('scripts')
    <!-- DataTables CSS & JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#transactionTable').DataTable({
                "order": [
                    [0, "desc"]
                ],
                "pageLength": 10,
                "lengthMenu": [5, 10, 25, 50],
                "responsive": true
            });
        });
    </script>
@endsection
