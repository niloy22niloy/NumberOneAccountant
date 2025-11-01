@extends('web-view.app')
@section('content')
    <!-- 2. Services Section -->
    <section id="pricing-view" class="">
        <div class="container">
            <!---Pricing Section-->


            <!-- Pricing Cards Row -->


            <div class="row align-items-center mb-5 mt-3">
                <div class="text-center mb-5">
                    <h2 class="pricing_title fw-bold mb-3">Choose The Pricing</h2>
                    <p class="lead text-primary-custom">Choose the plan that fits your growth ambitions.</p>

                    <!-- Toggle -->
                    <div class="d-flex justify-content-center mt-4">
                        <div class="price-switch-container d-flex align-items-center">
                            <label for="priceToggle" class="me-2 fw-semibold">Monthly</label>
                            <div class="toggle-switch">
                                <input type="checkbox" id="priceToggle" onchange="togglePricing()">
                                <span class="slider"></span>
                            </div>
                            <label for="priceToggle" class="ms-2 fw-semibold">Annually</label>
                        </div>
                    </div>
                </div>

                <!-- Dynamic Cards -->
                <div id="pricingCards" class="row d-flex flex-wrap justify-content-center align-items-stretch g-4 m-0 p-0">
                    @foreach ($monthly_pricing as $plan)
                        <div class="col-lg-4 col-md-6 mb-5 pricing-card-wrapper" data-cycle="monthly">
                            <div class="pricing-card p-4  card-slide show">
                                <div class="pricing-card-header mb-4 text-center">
                                    <h3 class="h4 mb-0 fw-bold">{{ $plan->plan_type }}</h3>
                                </div>
                                <div class="text-center mb-4">
                                    <span class="price-currency h5 fw-normal">$</span>
                                    <span class="price-display">{{ $plan->price }}</span>
                                    <span class="price-term h5 fw-light">/month</span>
                                </div>
                                <p class="text-center text-dark fw-bold mb-4 fs-7">{{ $plan->title }}</p>
                                <ul class="list-unstyled mb-5">
                                    @foreach ($plan->features as $feature)
                                        <li class="mb-3 d-flex align-items-center">
                                            {{-- <svg class="me-2 text-highlight" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                </svg> --}}
                                            <span>{{ $feature }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                                {{-- <div class="d-grid">
                                    <button class="btn btn-custom-primary btn-lg">Choose Plan</button>
                                </div> --}}

                                <button class="btn btn-custom-primary btn-lg choose-plan-btn"
                                    data-plan-id="{{ $plan->id }}" data-plan-name="{{ $plan->plan_type }}"
                                    data-plan-price="{{ $plan->price }}">
                                    Choose Plan
                                </button>
                            </div>
                        </div>
                    @endforeach

                    @foreach ($annually_pricing as $plan)
                        <div class="col-lg-4 col-md-6 mb-5 pricing-card-wrapper hide" data-cycle="annual">
                            <div class="pricing-card p-4  card-slide show">
                                <div class="pricing-card-header mb-4 text-center">
                                    <h3 class="h4 mb-0 fw-bold">{{ $plan->plan_type }}</h3>
                                </div>
                                <div class="text-center mb-4">
                                    <span class="price-currency h5 fw-normal">$</span>
                                    <span class="price-display">{{ $plan->price }}</span>
                                    <span class="price-term h5 fw-light">/year</span>
                                </div>
                                <p class="text-center text-dark fw-bold mb-4 fs-7">{{ $plan->title }}</p>
                                <ul class="list-unstyled mb-5">
                                    @foreach ($plan->features as $feature)
                                        <li class="mb-3 d-flex align-items-center">
                                            {{-- <svg class="me-2 text-highlight" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                </svg> --}}
                                            <span>{{ $feature }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                                {{-- <div class="d-grid">
                                    <button class="btn btn-custom-primary btn-lg">Choose Plan</button>
                                </div> --}}
                                <button class="btn btn-custom-primary btn-lg choose-plan-btn"
                                    data-plan-id="{{ $plan->id }}" data-plan-name="{{ $plan->plan_type }}"
                                    data-plan-price="{{ $plan->price }}">
                                    Choose Plan
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!---Pricing Section End--->
        </div>

        @push('script')
        <script>
       $(document).ready(function(){
        alert('ok');
       });
        // $(document).on('click', '.choose-plan-btn', function() {
        //     let isLoggedIn = @json(auth()->check());
        //     if (!isLoggedIn) {
        //         alert('Please login first!');
        //         return;
        //     }

        //     let planId = $(this).data('plan-id');
        //     let planName = $(this).data('plan-name');
        //     let planPrice = $(this).data('plan-price');

        //     // redirect to checkout with plan details
        //     window.location.href = `/checkout?plan_id=${planId}&plan_name=${planName}&plan_price=${planPrice}`;
        // });
    </script>
        @endpush


    </section>
    <style>
        /* smooth fade transition */
        .pricing-card-wrapper {
            opacity: 1;
            transform: translateY(0);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        /* starting hidden state for annual plans */
        .hide {
            display: none;
            opacity: 0;
        }

        /* animation states */
        .fade-in {
            opacity: 1 !important;
            transform: translateY(0);
        }

        .fade-out {
            opacity: 0 !important;
            transform: translateY(20px);
        }
    </style>



@endsection
