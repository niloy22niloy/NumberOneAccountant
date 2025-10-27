@extends('web-view.app')
@section('content')
    <!-- 4. Contact Section -->
    <section id="contact-view" style="">
        <section class="contact-page-wrapper">
            <div class="container">
                <div class="contact-card" style="border: 1px solid rgb(63, 63, 70);">

                    <div class="contact-info">

                        <div class="info-section">
                            <h3 class="text-uppercase">Number One Accounting</h3>

                            <div class="contact-details mb-5">
                                <p>
                                    <strong>42-44 Bishopsgate</strong><br>
                                    London EC2N 4AH<br>
                                    <a href="#" class="location-link">Get Location <i
                                            class="fa-solid fa-location-arrow fa-xs"></i></a>
                                </p>

                                <p>
                                    <span class="phone-number">020 3960 5080</span>
                                    Monday - Friday: 9am - 6pm
                                </p>

                                <p class="mt-4">
                                    <a href="mailto:info@numberoneaccounting.com" class="location-link"
                                        style="font-size: 1rem;">info@numberoneaccounting.com</a>
                                </p>
                            </div>
                        </div>

                        <div class="social-icons">
                            <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" aria-label="Xing"><i class="fab fa-xing"></i></a>
                            <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>

                    <div class="contact-form-side">
                        <h2>Post your query here</h2>
                        <p class="lead-text">Feel free to get in touch for more help.</p>

                        <form action="{{ route('contanct_us') }}" method="POST">
                            @csrf
                            @if (session('success'))
                                <div class="alert alert-success mt-3">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control @error('full_name') is-invalid @enderror"
                                        name="full_name" value="{{ old('full_name') }}" placeholder="Full Name*" required>
                                    @error('full_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" placeholder="Email Address*" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3 d-flex align-items-end">
                                    <input type="tel"
                                        class="form-control flex-grow-1 @error('contact_number') is-invalid @enderror"
                                        name="contact_number" value="{{ old('contact_number') }}"
                                        placeholder="Phone Number*" required>
                                    @error('contact_number')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control @error('company') is-invalid @enderror"
                                        name="company" value="{{ old('company') }}" placeholder="Company (Optional)">
                                    @error('company')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 mb-3">
                                    <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="4"
                                        placeholder="Message" required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="privacy-notice my-4">
                                <p>
                                    We take data privacy very seriously. We treat your details in accordance with GDPR
                                    regulations. By giving us your information, we can send you the most appropriate and
                                    exclusive offers from Number One Accounting. You may receive marketing emails or calls
                                    from our team.
                                </p>
                                <p class="mb-0">
                                    By continuing, you agree to our <a href="#">Privacy Policy & Terms of use.</a>
                                </p>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary px-5">Next</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>

    </section>
@endsection
