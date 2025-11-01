@extends('web-view.app')
@section('content')
    <section id="home-view">

        <div class="container">

            <div class="row align-items-center mb-5">

                <div class="col-lg-6 text-center text-lg-start mb-5 mb-lg-0">
                    <div class="d-inline-flex align-items-center mb-4 p-2 px-3 rounded-pill bg-light border"
                        style="color: var(--secondary-color); font-size: 0.9rem;">
                        {{ isset($hero->subtitle) ? $hero->subtitle : 'add some subTitle' }}

                    </div>

                    <h1 class="fw-bold mb-3 hero_title" style="color: var(--secondary-color);">
                        {{-- {{ $hero }} --}}
                        @if (isset($hero->title))
                            {!! $hero->title !!}
                        @else
                            "Please Add A Title"
                        @endif
                    </h1>

                    <p class="lead text-muted mb-4">
                        {{ isset($hero->description) ? $hero->description : 'Please Add Some Description' }}
                    </p>

                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <button class="btn btn-custom-primary  me-3 sign_up_free_button">Sign up
                            free</button>
                        <a href="#" class="btn btn-outline-secondary text-muted learn_more"
                            aria-label="Learn More">Learn
                            more</a>
                    </div>
                </div>

                <div class="col-lg-6">
                    @if (isset($hero->video))
                        <video src="video.mp4" class="img-fluid rounded shadow-lg" autoplay muted loop
                            style="width: 100%; height: auto; border-radius: 5rem; box-shadow: 0 10px 30px rgba(0,0,0,0.15); background-size: cover; border: 1px solid #fff;">
                        </video>
                    @else
                        Please Add A Video
                    @endif
                </div>
            </div>
            <!---Pricing Section-->
            {{-- <div class="row align-items-center mb-5">
                <div class="text-center mb-5">
                    <h2 class=" pricing_title fw-bold mb-3">Choose The Pricing</h2>
                    <p class="lead text-primary-custom">Choose the plan that fits your growth ambitions.</p>
                    <!-- Pricing Toggle -->
                    <div class="d-flex justify-content-center mt-4">
                        <div class="price-switch-container d-flex align-items-center">
                            <label for="priceToggle" class="me-2 fw-semibold">Monthly</label>
                            <div class="toggle-switch">
                                <input type="checkbox" id="priceToggle" onchange="togglePricing()">
                                <span class="slider"></span>
                            </div>
                            <label for="priceToggle" class="ms-2 fw-semibold">Annually</label>
                            <span class="badge bg-danger ms-3">Save 20%</span>
                        </div>
                    </div>

                </div>

                <!-- Pricing Cards Row -->
                <div class="row d-flex flex-wrap justify-content-center align-items-stretch g-4 m-0 p-0">
                    <!-- Card 1: Basic Plan -->
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="pricing-card p-4 h-100 card-slide show">
                            <div class="pricing-card-header mb-4">
                                <h3 class="h4 mb-0 fw-bold">Basic</h3>
                            </div>
                            <div class="text-center mb-4">
                                <span class="price-currency h5 fw-normal">$</span>
                                <span class="price-display" data-monthly="19" data-annually="182">19</span>
                                <span class="price-term h5 fw-light">/month</span>
                            </div>
                            <p class="text-left text-dark fw-bold mb-4 fs-7">Ideal for individuals and small
                                projects.</p>
                            <ul class="list-unstyled mb-5">
                                <li class="mb-3 d-flex align-items-center">
                                    <svg class="me-2 text-highlight" width="16" height="16" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                    </svg>
                                    <span>5 GB Storage</span>
                                </li>
                                <li class="mb-3 d-flex align-items-center">
                                    <svg class="me-2 text-highlight" width="16" height="16" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                    </svg>
                                    <span>3 Projects Included</span>
                                </li>
                                <li class="mb-3 d-flex align-items-center text-secondary">
                                    <svg class="me-2 text-muted" width="16" height="16" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                    <span>Priority Support (Add-on)</span>
                                </li>
                                <li class="mb-3 d-flex align-items-center text-secondary">
                                    <svg class="me-2 text-muted" width="16" height="16" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                    <span>Custom Branding</span>
                                </li>
                            </ul>
                            <div class="d-grid">
                                <button class="btn btn-custom-primary btn-lg">Start Trial</button>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: Pro Plan (Highlighted) -->
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="pricing-card highlight-card p-4 h-100 card-slide show">
                            <div class="pricing-card-header mb-4">
                                <h3 class="h4 mb-0">Professional <span class="badge bg-dark ms-2">Best
                                        Value</span>
                                </h3>
                            </div>
                            <div class="text-center mb-4">
                                <span class="price-currency h5 fw-normal text-secondary">$</span>
                                <span class="price-display text-secondary" data-monthly="49" data-annually="470">49</span>
                                <span class="price-term h5 fw-light text-secondary">/month</span>
                            </div>
                            <p class="text-left text-dark fw-bold mb-4 fs-7">Perfect for growing teams and serious
                                users.</p>
                            <ul class="list-unstyled mb-5">
                                <li class="mb-3 d-flex align-items-center">
                                    <svg class="me-2 text-highlight" width="16" height="16" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                    </svg>
                                    <span><strong>Unlimited</strong> Storage</span>
                                </li>
                                <li class="mb-3 d-flex align-items-center">
                                    <svg class="me-2 text-highlight" width="16" height="16" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                    </svg>
                                    <span><strong>Unlimited</strong> Projects</span>
                                </li>
                                <li class="mb-3 d-flex align-items-center">
                                    <svg class="me-2 text-highlight" width="16" height="16" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                    </svg>
                                    <span>24/7 Priority Support</span>
                                </li>
                                <li class="mb-3 d-flex align-items-center">
                                    <svg class="me-2 text-highlight" width="16" height="16" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                    </svg>
                                    <span>Custom Branding & API Access</span>
                                </li>
                            </ul>
                            <div class="d-grid">
                                <button class="btn btn-custom-primary btn-lg">Choose Pro</button>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3: Enterprise Plan -->
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="pricing-card p-4 h-100 card-slide show">
                            <div class="pricing-card-header mb-4">
                                <h3 class="h4 mb-0 fw-bold">Enterprise</h3>
                            </div>
                            <div class="text-center mb-4">
                                <span class="price-currency h5 fw-normal">$</span>
                                <span class="price-display" data-monthly="99" data-annually="950">99</span>
                                <span class="price-term h5 fw-light">/month</span>
                            </div>
                            <p class="text-left text-dark fw-bold mb-4 fs-7">For large organizations needing
                                maximum
                                scale.
                            </p>
                            <ul class="list-unstyled mb-5">
                                <li class="mb-3 d-flex align-items-center">
                                    <svg class="me-2 text-highlight" width="16" height="16" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                    </svg>
                                    <span>Everything in Pro</span>
                                </li>
                                <li class="mb-3 d-flex align-items-center">
                                    <svg class="me-2 text-highlight" width="16" height="16" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                    </svg>
                                    <span>Dedicated Account Manager</span>
                                </li>
                                <li class="mb-3 d-flex align-items-center">
                                    <svg class="me-2 text-highlight" width="16" height="16" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                    </svg>
                                    <span>SLA & Uptime Guarantee</span>
                                </li>
                                <li class="mb-3 d-flex align-items-center">
                                    <svg class="me-2 text-highlight" width="16" height="16" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                    </svg>
                                    <span>Advanced Security Features</span>
                                </li>
                            </ul>
                            <div class="d-grid">
                                <button class="btn btn-custom-primary btn-lg">Contact Sales</button>
                            </div>
                        </div>
                    </div>


                </div>
            </div> --}}

            {{-- <div class="row align-items-center mb-5">
                <div class="text-center mb-5">
                    <h2 class="pricing_title fw-bold mb-3">Choose The Pricing</h2>
                    <p class="lead text-primary-custom">Choose the plan that fits your growth ambitions.</p>

                    <!-- Pricing Toggle -->
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

                <!-- Dynamic Pricing Cards -->
                <div id="pricingCards" class="row d-flex flex-wrap justify-content-center align-items-stretch g-4 m-0 p-0">
                    @foreach ($monthly_pricing as $plan)
                        <div class="col-lg-4 col-md-6 mb-5 pricing-card-wrapper"
                            data-monthly="{{ $plan->billing_cycle == 'Monthly' ? '1' : '0' }}">
                            <div class="pricing-card p-4 h-100 card-slide show">
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
                                            <svg class="me-2 text-highlight" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                            </svg>
                                            <span>{{ $feature }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="d-grid">
                                    <button class="btn btn-custom-primary btn-lg">Choose Plan</button>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @foreach ($annually_pricing as $plan)
                        <div class="col-lg-4 col-md-6 mb-5 pricing-card-wrapper"
                            data-monthly="{{ $plan->billing_cycle == 'Monthly' ? '1' : '0' }}" style="display: none;">
                            <div class="pricing-card p-4 h-100 card-slide show">
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
                                            <svg class="me-2 text-highlight" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                            </svg>
                                            <span>{{ $feature }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="d-grid">
                                    <button class="btn btn-custom-primary btn-lg">Choose Plan</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div> --}}


            <style>
                /* .pricing-card-wrapper {
            transition: all 0.4s ease;
            opacity: 1;
            transform: translateY(0);
        }

        .pricing-card-wrapper.hide {
            opacity: 0;
            transform: translateY(20px);
            pointer-events: none;
            position: absolute;
        } */
            </style>

            <div class="row align-items-center mb-5">
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


            <!---Pricing Section End--->

            <div class="row justify-content-center mt-5">
                <div class="col-lg-6 col-md-10">
                    <div class="card shadow-lg rounded-3">

                        <div class="card-header bg-white border-bottom text-center pt-4 pb-3">
                            <small class="text-muted fw-bold payment_box_title">
                                100% Secure and Safe Payments
                            </small>
                        </div>

                        <div class="card-body text-center pt-4 pb-4">

                            <div class="d-flex flex-wrap justify-content-center align-items-center mb-4 gap-3">
                                <div class="payment-card">
                                    <i class="fa-brands fa-paypal paypal"></i>
                                    <span>PayPal</span>
                                </div>
                                <div class="payment-card">
                                    <i class="fa-brands fa-cc-stripe stripe"></i>
                                    <span>Stripe</span>
                                </div>

                                <div class="payment-card">
                                    <i class="fa-brands fa-cc-visa visa"></i>
                                    <span>Visa</span>
                                </div>

                                <div class="payment-card">
                                    <i class="fa-brands fa-cc-mastercard mastercard"></i>
                                    <span>Mastercard</span>
                                </div>

                                <div class="payment-card">
                                    <i class="fa-brands fa-cc-amex amex"></i>
                                    <span>American Express</span>
                                </div>

                                <div class="payment-card">
                                    <i class="fa-brands fa-cc-discover discover"></i>
                                    <span>Discover</span>
                                </div>

                                <div class="payment-card">
                                    <span class="custom-icon">bK</span>
                                    <span>bKash</span>
                                </div>

                                <div class="payment-card">
                                    <span class="custom-icon nagad">N</span>
                                    <span>Nagad</span>
                                </div>

                                <div class="payment-card">
                                    <span class="custom-icon rocket">R</span>
                                    <span>Rocket</span>
                                </div>

                                <div class="payment-card">
                                    <i class="fa-brands fa-payoneer payoneer"></i>
                                    <span>Payoneer</span>
                                </div>

                                <div class="payment-card">
                                    <i class="fa-brands fa-google-pay googlepay"></i>
                                    <span>Google Pay</span>
                                </div>

                                <div class="payment-card">
                                    <i class="fa-brands fa-apple-pay applepay"></i>
                                    <span>Apple Pay</span>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="row justify-content-center mb-5">
                                                                            <div class="col-lg-8 col-md-10">
                                                                                <div class="alert alert-light text-center py-2 px-3 mb-0" role="alert">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                                                        class="bi bi-shield-lock-fill text-primary-custom me-2" viewBox="0 0 16 16">
                                                                                        <path fill-rule="evenodd"
                                                                                            d="M8 0c-.69 0-1.843.915-2.564 2.176l-.6.61L.742 8l4.094 4.887.892.203C6.721 13.992 8 16 8 16s1.279-2.008 2.327-2.91L11.564 13.38l.6-.61C13.843 12.085 15 10.93 15 8V4.5l-7-4.5zM9.545 10.36a.5.5 0 0 0-.877.301l-.254.912a.5.5 0 0 0 .964 0l.254-.912a.5.5 0 0 0-.106-.301z" />
                                                                                    </svg>
                                                                                    We do not store any credit card information in server, payments are processed by gateways
                                                                                    and site is secured by 128 bit SSL encryption.
                                                                                </div>
                                                                            </div>
                                                                        </div> -->

        </div>
        @push('script')
            <script>
                $(document).on('click', '.choose-plan-btn', function() {
                    let isLoggedIn = @json(auth()->check());
                    if (!isLoggedIn) {
                        alert('Please login first!');
                        return;
                    }

                    let planId = $(this).data('plan-id');
                    let planName = $(this).data('plan-name');
                    let planPrice = $(this).data('plan-price');

                    // redirect to checkout with plan details
                    window.location.href = `/checkout?plan_id=${planId}&plan_name=${planName}&plan_price=${planPrice}`;
                });
            </script>
        @endpush
    </section>
@endsection
