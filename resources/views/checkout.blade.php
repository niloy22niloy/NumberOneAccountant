@extends('web-view.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-header bg-primary text-white text-center py-4 rounded-top-3">
                        <h2 class="h4 mb-1 fw-bold">Complete Your Subscription</h2>
                        <h3 class="h1 mb-0 fw-bolder">${{ number_format($planPrice, 2) }}</h3>
                        <p class="mb-0 fs-5">{{ $planName ?? 'Selected Plan' }} / {{ ucfirst($billingType) ?? 'Monthly' }}
                        </p>
                    </div>
                    <div class="card-body p-4">

                        {{-- Alert Messages --}}
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i> {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Order Summary --}}
                        <div class="mb-4 p-3 bg-light rounded-3 border">
                            <h5 class="fw-bold mb-3">Order Summary</h5>
                            <ul class="list-unstyled mb-0 small">
                                <li class="d-flex justify-content-between">
                                    <span>Plan:</span>
                                    <span class="fw-bold text-primary">{{ $planName ?? 'N/A' }}</span>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <span>Billing:</span>
                                    <span class="fw-bold text-primary">{{ ucfirst($billingType) ?? 'N/A' }}</span>
                                </li>
                                <li class="d-flex justify-content-between mt-2 pt-2 border-top">
                                    <span class="fw-bold">Total Due:</span>
                                    <span class="fw-bolder fs-5 text-success">${{ number_format($planPrice, 2) }}</span>
                                </li>
                            </ul>
                        </div>

                        {{-- Payment Form --}}
                        <form id="checkout-form" method="post" action="{{ route('charge') }}">
                            @csrf
                            <input type="hidden" name="plan_id" value="{{ $planId }}">
                            <input type="hidden" name="plan_name" value="{{ $planName }}">
                            <input type="hidden" name="billing_type" value="{{ $billingType }}">
                            <input type="hidden" name="amount" value="{{ $planPrice }}">

                            <div class="mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}"
                                    readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Card Details</label>
                                <div id="card-element" class="form-control py-3"></div>
                            </div>

                            <input type="hidden" name="stripeToken" id="stripe-token-id">

                            <button id="pay-btn" type="button" class="btn btn-primary w-100 py-2 mt-3"
                                onclick="createToken()">
                                Subscribe for ${{ $planPrice }} / {{ ucfirst($billingType) }}
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Stripe JS --}}
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe('{{ env('STRIPE_KEY') }}');
        const elements = stripe.elements();
        const cardElement = elements.create('card', {
            style: {
                base: {
                    fontSize: '16px',
                    color: '#32325d',
                    '::placeholder': {
                        color: '#aab7c4'
                    },
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif'
                },
                invalid: {
                    color: '#fa755a'
                }
            }
        });
        cardElement.mount('#card-element');

        function createToken() {
            document.getElementById("pay-btn").disabled = true;

            stripe.createToken(cardElement).then(function(result) {
                if (result.error) {
                    document.getElementById("pay-btn").disabled = false;
                    alert(result.error.message);
                } else {
                    document.getElementById("stripe-token-id").value = result.token.id;
                    document.getElementById('checkout-form').submit();
                }
            });
        }
    </script>

    <style>
        /* Stripe element container styling */
        .stripe-element-container {
            border: 1px solid #ced4da;
            border-radius: .25rem;
            background-color: #fff;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);
            padding: 0;
            /* REMOVE padding inside */
            min-height: 45px;
            /* Stripe needs enough height to be clickable */
        }

        /* Remove the problematic fixed height */
        #card-element {
            height: 100%;
            /* fill the container */
        }
    </style>
@endsection
