<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number One Accountant</title>

    <!-- Website Favicon -->
    <link rel="icon" type="image/png" href="logoo.png">

    <!-- Load Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Inter Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('style.css') }}">
    @livewireStyles
</head>

<body>


    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top"
        style="background-color: #ffffff; border-bottom: 1px solid #cdcdcd;">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary-custom d-flex align-items-center" href="#"
                data-target="home-view">
                <img src="logo2.jpeg" style="height: 58px;
    width: 177px;" alt="Logo" height="24"
                    class="me-2">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        @if (url()->current() == url('/home'))
                            <a class="nav-link text-color " href="{{ route('home') }}"
                                style="color: #1E88E5 !important;" wire:navigate>Home</a>
                        @else
                            <a class="nav-link text-color {{ url()->current() == url('/home') ? 'active' : '' }}"
                                href="{{ route('home') }}" wire:navigate>Home</a>
                        @endif

                    </li>
                    <li class="nav-item">
                        @if (url()->current() == url('/pricing'))
                            <a class="nav-link text-color " href="{{ route('pricing') }}"
                                style="color: #1E88E5 !important;" wire:navigate>Pricing</a>
                        @else
                            <a class="nav-link text-color {{ url()->current() == url('/pricing') ? 'active' : '' }}"
                                href="{{ route('pricing') }}" wire:navigate>Pricing</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        {{-- <a class="nav-link text-color {{ url()->current() == url('/about') ? 'active' : '' }}"
                            href="{{ route('about') }}">About</a> --}}

                        @if (url()->current() == url('/about'))
                            <a class="nav-link text-color " href="{{ route('about') }}"
                                style="color: #1E88E5 !important;" wire:navigate>About</a>
                        @else
                            <a class="nav-link text-color {{ url()->current() == url('/about') ? 'active' : '' }}"
                                href="{{ route('about') }}" wire:navigate>About</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if (url()->current() == url('/resource'))
                            <a class="nav-link text-color " href="{{ route('resource') }}"
                                style="color: #1E88E5 !important;" wire:navigate>Resources</a>
                        @else
                            <a class="nav-link text-color {{ url()->current() == url('/resource') ? 'active' : '' }}"
                                href="{{ route('resource') }}" wire:navigate>Resources</a>
                        @endif

                    </li>
                    <li class="nav-item">

                        @if (url()->current() == url('/contact'))
                            <a class="nav-link text-color " href="{{ route('contact') }}"
                                style="color: #1E88E5 !important;" wire:navigate>Contact</a>
                        @else
                            <a class="nav-link text-color {{ url()->current() == url('/contact') ? 'active' : '' }}"
                                href="{{ route('contact') }}" wire:navigate>Contact</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if (url()->current() == url('/legal'))
                            <a class="nav-link text-color " href="{{ route('legal') }}"
                                style="color: #1E88E5 !important;" wire:navigate>Legal</a>
                        @else
                            <a class="nav-link text-color {{ url()->current() == url('/legal') ? 'active' : '' }}"
                                href="{{ route('legal') }}" wire:navigate>Legal</a>
                        @endif

                    </li>



                </ul>
                <div class="d-flex align-items-center">

                    @auth
                        <div class="dropdown">
                            <button class="btn dropdown-toggle fw-bold" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false"
                                style="background-color: var(--primary-color); color: white; border-radius: 0.25rem;">
                                {{ Auth::user()->name }}
                            </button>

                            <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 mt-2">

                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        <i class="fas fa-user-circle me-2 text-primary"></i> Profile
                                    </a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="fas fa-sign-out-alt me-2"></i> Log Out
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endauth

                    @guest
                        <a href="{{ route('login') }}" class="btn sign_in_button me-2" aria-label="Sign In"
                            style=" border-color: rgb(51, 50, 50); color: #000000; border-radius: 0; transition: background-color 0.3s; font-size: 14px; padding: 6px 19px;">
                            Sign In
                        </a>
                        <a href="{{ route('register') }}" class="btn fw-bold register_btn"
                            style="background-color: var(--primary-color); color: white;" aria-label="Try it Free">
                            Register
                        </a>
                    @endguest

                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content Container for SPA Views -->
    <div id="main-content">

        @yield('content')



    </div>


    <!-- Footer -->
    <footer class="py-5 mt-5 navbar-custom text-white" style="background-color: #002a6a;">
        <div class="container">
            <div class="row">

                <!-- Column 1: Map / Location -->
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="fw-bold mb-3 footer_first_column_title">Location</h5>
                    <p class="footer_fast_column_p">
                        ProPlan Global HQ <br>
                        45 King’s Cross Road, Suite 12 <br>
                        London, WC1X 9BN <br>
                        United Kingdom
                    </p>
                    <a href="#" class="footer-link d-inline-block mt-2">View on Map (Placeholder)</a>
                </div>

                <!-- Column 2: Important Links -->
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="fw-bold mb-3  footer_middle_column_title">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a data-target="home-view" href="#" class="footer-link">Home</a>
                        </li>
                        <li class="mb-2"><a data-target="pricing-view" href="#"
                                class="footer-link">Pricing</a>
                        </li>
                        <li class="mb-2"><a data-target="about-view" href="#" class="footer-link">About</a>
                        </li>
                        <li class="mb-2"><a data-target="resources-view" href="#"
                                class="footer-link">Resources</a>
                        </li>
                        <li class="mb-2"><a data-target="contact-view" href="#"
                                class="footer-link">Contact</a>
                        </li>
                        <li class="mb-2"><a data-target="legal-view" href="#" class="footer-link">Legal</a>
                        </li>
                    </ul>
                </div>

                <!-- Column 3: Social Links -->
                <div class="col-md-4">
                    <h5 class="fw-bold mb-3 footer_last_column_title">Connect With Us</h5>
                    <div class="d-flex justify-content-start">
                        <!-- Facebook Icon (Inline SVG) -->
                        <a href="#" class="text-white me-3" aria-label="Facebook">
                            <svg class="social-icon" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.008 1.19-3.136 3.023-3.136.876 0 1.79.157 1.79.157v1.98h-1.002c-.993 0-1.303.62-1.303 1.258V8.05h2.22l-.355 2.224h-1.865v5.625C13.074 15.396 16 12.064 16 8.049z" />
                            </svg>
                        </a>
                        <!-- Twitter Icon (Inline SVG) -->
                        <a href="#" class="text-white me-3" aria-label="Twitter">
                            <svg class="social-icon" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M12.673 2.146a.75.75 0 0 1 .152 1.054L9.89 8.019l3.197 4.098a.75.75 0 0 1-1.203.94l-3.8-4.869L5.352 12.9a.75.75 0 0 1-1.203-.94l3.197-4.098L3.3 3.2a.75.75 0 0 1 1.054-.152l3.774 3.019 3.774-3.019a.75.75 0 0 1 1.054.152z" />
                                <path
                                    d="M16 3.05a6.4 6.4 0 0 0-1.892-.518 3.25 3.25 0 0 1-1.002 1.079 6.4 6.4 0 0 0 4.038-1.564zM3.483 3.226A6.4 6.4 0 0 0 1.59 3.744a3.25 3.25 0 0 1 1.002 1.079 6.4 6.4 0 0 0 1.891-.518zM1.464 12.774a.75.75 0 0 1 .152-1.054l3.774-3.019 3.774 3.019a.75.75 0 0 1-1.054.152l-3.197-2.557-3.197 2.557a.75.75 0 0 1-1.054-.152z" />
                            </svg>
                        </a>
                        <!-- LinkedIn Icon (Inline SVG) -->
                        <a href="#" class="text-white" aria-label="LinkedIn">
                            <svg class="social-icon" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M0 1.146C0 .518.526 0 1.17 0h13.66C15.474 0 16 .518 16 1.146v13.708c0 .628-.526 1.146-1.17 1.146H1.17C.526 16 0 15.482 0 14.854zm4.943 12.248V9.359c0-.236.01-.448.026-.653.111-.531.428-1.083 1.258-1.083.824 0 1.15.584 1.15 1.432v4.298h2.464V9.289c0-.496.007-.988.014-1.48.064-.473.308-1.082 1.173-1.082.864 0 1.259.623 1.259 1.547v4.46h2.46V7.48h-2.46v.382h-.033c-.287-.55-1.026-1.137-2.443-1.137-1.417 0-2.43.83-2.82 2.052V7.48H2.48V13.39H0V7.48h2.48V5.378H.004V1.956H2.48V.566H.004V.573c0-.317.26-.574.577-.574h4.425c.317 0 .574.257.574.574v.007h-.002V5.378h2.48V1.956H16.03V.573c0-.317-.257-.574-.574-.574h-4.425c-.317 0-.574.257-.574.574v.007h-.002V5.378h2.48z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!---Scriptsss-->
    <script src="{{ asset('script.js') }}"></script>

    <!-- Load Bootstrap 5 JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        xintegrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/A+0T5qD9t9f2T" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        xintegrity="sha384-0pUGl5vj5sA2O3vA3yO8Yk4T5zT7z0z4Vl7e5a7V6l" crossorigin="anonymous"></script>

    @livewireScripts

</body>

</html>
