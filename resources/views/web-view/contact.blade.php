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

                        <form action="#" method="POST">

                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="full_name" placeholder="Full Name*"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" placeholder="Email Address*"
                                        required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 d-flex align-items-end">
                                    <span class="text-muted me-2 phone-prefix-group">+44</span>
                                    <input type="tel" class="form-control flex-grow-1" name="contact_number"
                                        placeholder="7400 123456" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="company"
                                        placeholder="Company (Optional)">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <textarea class="form-control" name="message" rows="4" placeholder="Message" required></textarea>
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
