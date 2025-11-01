@extends('web-view.app')

@section('title', 'Invoice Details')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm rounded-3 border-0">
                    <div class="card-header bg-primary text-white text-center py-3 rounded-top">
                        <h4 class="mb-0">Invoice #{{ $invoice->id }}</h4>
                    </div>
                    <div class="card-body p-4">

                        <ul class="list-group list-group-flush mb-4">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Package Name:</span>
                                <span>{{ $invoice->subscription->plan_name ?? 'N/A' }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Amount:</span>
                                <span>${{ number_format($invoice->amount, 2) }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Payment Status:</span>
                                <span
                                    class="fw-bold text-{{ $invoice->status == 'paid' ? 'success' : ($invoice->status == 'pending' ? 'warning' : 'danger') }}">
                                    {{ ucfirst($invoice->status) }}
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Validity Till:</span>
                                <span>{{ $invoice->subscription->validity_till->format('d-M-Y') ?? 'N/A' }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Subscription Active:</span>
                                <span class="fw-bold">{{ $invoice->subscription->is_active ?? 'no' }}</span>
                            </li>
                        </ul>

                        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
