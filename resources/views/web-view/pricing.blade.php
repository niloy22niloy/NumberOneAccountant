@extends('web-view.app')
@section('content')
    <!-- 2. Services Section -->
    <section id="pricing-view" class="">
        <div class="container">
            <!---Pricing Section-->
            <div class="row align-items-center mb-5">
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
                                <span class="price-currency h5 fw-normal">50$</span>
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
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="pricing-card p-4 h-100 card-slide show">
                            <div class="pricing-card-header mb-4">
                                <h3 class="h4 mb-0 fw-bold">Basic</h3>
                            </div>
                            <div class="text-center mb-4">
                                <span class="price-currency h5 fw-normal">50$</span>
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
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="pricing-card p-4 h-100 card-slide show">
                            <div class="pricing-card-header mb-4">
                                <h3 class="h4 mb-0 fw-bold">Basic</h3>
                            </div>
                            <div class="text-center mb-4">
                                <span class="price-currency h5 fw-normal">50$</span>
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
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="pricing-card p-4 h-100 card-slide show">
                            <div class="pricing-card-header mb-4">
                                <h3 class="h4 mb-0 fw-bold">Basic</h3>
                            </div>
                            <div class="text-center mb-4">
                                <span class="price-currency h5 fw-normal">50$</span>
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
                                <h3 class="h4 mb-0">Professional <span class="badge bg-dark ms-2">Best Value</span>
                                </h3>
                            </div>
                            <div class="text-center mb-4">
                                <span class="price-currency h5 fw-normal text-secondary">$</span>
                                <span class="price-display text-secondary" data-monthly="49"
                                    data-annually="470">49</span>
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
                            <p class="text-left text-dark fw-bold mb-4 fs-7">For large organizations needing maximum
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
            </div>
            <!---Pricing Section End--->
        </div>

    </section>
@endsection
