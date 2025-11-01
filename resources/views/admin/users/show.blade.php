@extends('admin.dashboard')

@section('content')
    <div class="container py-4">

        {{-- Header --}}
        <h1 class="mb-4">User: <span class="text-primary">{{ $user->name }}</span></h1>

        {{-- Metric Cards --}}
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-box-open fa-2x text-indigo-600 me-3"></i>
                        <div>
                            <p class="text-muted small mb-1">Total Subscriptions</p>
                            <h5 class="mb-0">{{ $user->subscriptions->count() }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-check-circle fa-2x text-success me-3"></i>
                        <div>
                            <p class="text-muted small mb-1">Active Subscriptions</p>
                            <h5 class="mb-0">{{ $user->subscriptions->where('is_active', 'yes')->count() }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-times-circle fa-2x text-danger me-3"></i>
                        <div>
                            <p class="text-muted small mb-1">Inactive Subscriptions</p>
                            <h5 class="mb-0">{{ $user->subscriptions->where('is_active', 'no')->count() }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Active Subscriptions --}}
        <div class="card shadow-sm border-0 rounded-3 mb-4">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-dark"><i class="fas fa-check-circle me-2"></i> Active Subscriptions</h5>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    @forelse($user->subscriptions->where('is_active', 'yes') as $sub)
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1 fw-bold">{{ $sub->plan_name }}</h6>
                                <small class="text-muted">Expires:
                                    {{ \Carbon\Carbon::parse($sub->validity_till)->format('Y-m-d') }}</small>
                            </div>
                            <a href="{{ route('admin.subscriptions.show', $sub->id) }}"
                                class="btn btn-sm btn-outline-success">Manage</a>
                        </div>
                    @empty
                        <div class="list-group-item text-center text-muted">No active subscriptions.</div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Inactive Subscriptions --}}
        <div class="card shadow-sm border-0 rounded-3 mb-4">
            <div class="card-header bg-secondary text-white fw-bold">
                <i class="fas fa-times-circle me-2"></i> Inactive Subscriptions
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    @forelse($user->subscriptions->where('is_active', 'no') as $sub)
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1 fw-bold">{{ $sub->plan_name }}</h6>
                                <small class="text-muted">Expired:
                                    {{ \Carbon\Carbon::parse($sub->validity_till)->format('Y-m-d') }}</small>
                            </div>
                            <button class="btn btn-sm btn-outline-secondary" disabled>Manage</button>
                        </div>
                    @empty
                        <div class="list-group-item text-center text-muted">No inactive subscriptions.</div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Transactions / Invoices --}}
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-dark"><i class="fas fa-file-invoice me-2"></i> Transactions & Payment Details
                </h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#Invoice ID</th>
                                <th>Package Name</th>
                                <th>Amount</th>
                                <th>Payment Type</th>
                                <th>Transaction ID</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($user->invoices as $invoice)
                                @php
                                    $subscription = $invoice->subscription; // assuming invoice belongsTo subscription
                                    $transactionId =
                                        $invoice->transaction_id ?? ($subscription->stripe_subscription_id ?? 'N/A');
                                    $statusClass = match ($invoice->status) {
                                        'paid' => 'success',
                                        'pending' => 'warning',
                                        'overdue' => 'danger',
                                        'failed' => 'danger',
                                        'refunded' => 'secondary',
                                        default => 'secondary',
                                    };
                                    $packageName = $subscription->plan_name ?? 'N/A';
                                @endphp
                                <tr>
                                    <td>#{{ $invoice->id }}</td>
                                    <td>{{ $packageName }}</td>
                                    <td>${{ number_format($invoice->amount, 2) }}</td>
                                    <td>{{ ucfirst($invoice->payment_type ?? 'N/A') }}</td>
                                    <td>{{ $transactionId }}</td>
                                    <td><span class="badge bg-{{ $statusClass }}">{{ ucfirst($invoice->status) }}</span>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($invoice->created_at)->format('Y-m-d H:i') }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#invoiceModal{{ $invoice->id }}">View</button>
                                    </td>
                                </tr>

                                <!-- Invoice Modal -->
                                <div class="modal fade" id="invoiceModal{{ $invoice->id }}" tabindex="-1"
                                    aria-labelledby="invoiceModalLabel{{ $invoice->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary text-white">
                                                <h5 class="modal-title" id="invoiceModalLabel{{ $invoice->id }}">
                                                    Invoice #{{ $invoice->id }} Details
                                                </h5>
                                                <button type="button" class="btn-close btn-close-white"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row mb-3">
                                                    <div class="col-md-6"><strong>Package Name:</strong>
                                                        {{ $packageName }}</div>
                                                    <div class="col-md-6"><strong>Amount:</strong>
                                                        ${{ number_format($invoice->amount, 2) }}</div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-6"><strong>Payment Type:</strong>
                                                        {{ ucfirst($invoice->payment_type ?? 'N/A') }}</div>
                                                    <div class="col-md-6"><strong>Transaction ID:</strong>
                                                        {{ $transactionId }}</div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-6"><strong>Status:</strong> <span
                                                            class="badge bg-{{ $statusClass }}">{{ ucfirst($invoice->status) }}</span>
                                                    </div>
                                                    <div class="col-md-6"><strong>Created At:</strong>
                                                        {{ \Carbon\Carbon::parse($invoice->created_at)->format('Y-m-d H:i') }}
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-6"><strong>Updated At:</strong>
                                                        {{ \Carbon\Carbon::parse($invoice->updated_at)->format('Y-m-d H:i') }}
                                                    </div>
                                                </div>
                                                @if ($invoice->payment_details)
                                                    <hr>
                                                    <h6>Payment Gateway Details:</h6>
                                                    <pre class="bg-light p-2 rounded">{{ json_encode($invoice->payment_details, JSON_PRETTY_PRINT) }}</pre>
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <a href="{{ route('invoices.show', $invoice->id) }}"
                                                    class="btn btn-primary">Full Invoice</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted">No transactions found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
