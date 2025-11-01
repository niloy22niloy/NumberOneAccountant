@extends('web-view.app')

@section('content')
    <?php
    $total_buying_package_count = App\Models\Subscription::where('user_id', Auth::user()->id)->count();
    $active_package_count = App\Models\Subscription::where('user_id', Auth::user()->id)
        ->where('is_active', 'yes')
        ->count();
    $inactive_package_count = App\Models\Subscription::where('user_id', Auth::user()->id)
        ->where('is_active', 'no')
        ->count();
    $active_plan_lists = App\Models\Subscription::where('user_id', Auth::user()->id)
        ->where('is_active', 'yes')
        ->get();
    ?>

    <div class="container p-5 py-5" style="min-height: 100vh; background-color: #f7f7f9;">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h1 class="fw-bold text-dark">
                Welcome <span class="text-primary">{{ Auth::user()->name }}</span>
            </h1>
        </div>

        {{-- Metric Cards --}}
        <div class="row g-4 mb-4">

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 rounded-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-box-open fa-2x text-primary p-3 bg-light rounded-circle me-3"></i>
                            <div>
                                <p class="text-uppercase text-muted mb-1 small">Total Package Buy</p>
                                <h4 class="card-title fw-bold text-dark mb-0">{{ $total_buying_package_count }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 rounded-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle fa-2x text-success p-3 bg-light rounded-circle me-3"></i>
                            <div>
                                <p class="text-uppercase text-muted mb-1 small">Active Packages</p>
                                <h4 class="card-title fw-bold text-dark mb-0">{{ $active_package_count }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-4">
                <div class="card h-100 shadow-sm border-0 rounded-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-times-circle fa-2x text-danger p-3 bg-light rounded-circle me-3"></i>
                            <div>
                                <p class="text-uppercase text-muted mb-1 small">Inactive Packages</p>
                                <h4 class="card-title fw-bold text-dark mb-0">{{ $inactive_package_count }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Active Plan List --}}
        <div class="card shadow-sm border-0 rounded-3 mb-4">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-dark"><i class="fas fa-clipboard-check me-2"></i> Active Plan List</h5>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    @forelse($active_plan_lists as $plan)
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1 fw-bold">{{ $plan->plan_name }}</h6>
                                <small class="text-muted">
                                    Status: {{ ucfirst($plan->is_active) }} | Expires:
                                    {{ \Carbon\Carbon::parse($plan->validity_till)->format('Y-m-d') }}
                                </small>
                            </div>
                            <a href="{{ route('subscriptions.show', $plan->id) }}" class="btn btn-sm btn-outline-success">
                                Manage
                            </a>
                        </div>
                    @empty
                        <div class="list-group-item text-center">
                            <small class="text-muted">No active plans found.</small>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Inactive Plans --}}
        @php
            $inactive_plan_lists = App\Models\Subscription::where('user_id', Auth::user()->id)
                ->where('is_active', 'no')
                ->get();
        @endphp

        <div class="card mb-4">
            <div class="card-header bg-secondary text-white fw-bold ">
                Inactive Subscriptions
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    @forelse($inactive_plan_lists as $plan)
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1 fw-bold">{{ $plan->plan_name }}</h6>
                                <small class="text-muted">
                                    Status: Inactive | Expired:
                                    {{ \Carbon\Carbon::parse($plan->validity_till)->format('Y-m-d') }}
                                </small>
                            </div>
                            {{-- <button class="btn btn-sm btn-outline-secondary">Renew</button> --}}
                            <a href="{{ route('subscriptions.show', $plan->id) }}" class="btn btn-sm btn-outline-success">
                                Manage
                            </a>
                        </div>
                    @empty
                        <div class="list-group-item text-center">
                            <small class="text-muted">No inactive plans found.</small>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Recent Invoices --}}
        @php
            $invoices = App\Models\Invoice::where('user_id', Auth::user()->id)
                ->orderBy('created_at', 'desc')
                ->get();
        @endphp

        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-dark">
                    <i class="fas fa-file-invoice me-2"></i> Recent Invoices (Total: {{ $invoices->count() }})
                </h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="fw-bold text-muted">Invoice ID</th>
                                <th scope="col" class="fw-bold text-muted">Client</th>
                                <th scope="col" class="fw-bold text-muted text-end">Amount</th>
                                <th scope="col" class="fw-bold text-muted">Created Date</th>
                                <th scope="col" class="fw-bold text-muted text-center">Status</th>
                                <th scope="col" class="fw-bold text-muted text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($invoices as $invoice)
                                <tr>
                                    <td>{{ $invoice->id }}</td>
                                    <td>{{ $invoice->client_name ?? Auth::user()->name }}</td>
                                    <td class="text-end">${{ number_format($invoice->amount, 2) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($invoice->created_at)->format('Y-m-d') }}</td>
                                    <td class="text-center">
                                        @if ($invoice->status == 'paid')
                                            <span class="badge bg-success">Paid</span>
                                        @elseif($invoice->status == 'pending')
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @elseif($invoice->status == 'overdue')
                                            <span class="badge bg-danger">Overdue</span>
                                        @else
                                            <span class="badge bg-secondary">{{ ucfirst($invoice->status) }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('invoices.show', $invoice->id) }}"
                                            class="btn btn-sm btn-outline-primary" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">No invoices found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
