<!DOCTYPE html>
<html lang="en">


<head>
    @php
        $settings = \App\Models\WebsiteSetting::first();
        $logoPath =
            $settings && $settings->logo && file_exists(public_path($settings->logo))
                ? asset($settings->logo)
                : asset('logo2.jpeg'); // fallback logo
    @endphp

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
                <img src="{{ $logoPath }}" style="height: 58px;
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

                        <div class="dropdown d-lg-inline-block ms-3">
                            <button class="btn btn-primary dropdown-toggle fw-bold btn-sm" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-1"></i> {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2">
                                <a href="{{ route('dashboard') }}" class="dropdown-item">
                                    <i class="fas fa-tachometer-alt me-2 text-primary"></i> Dashboard
                                </a>
                                <li>

                                    <a wire:navigate class="dropdown-item" href="{{ route('profile.edit') }}">
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
                        <a wire:navigate href="{{ route('login') }}" class="btn sign_in_button me-2" aria-label="Sign In"
                            style=" border-color: rgb(51, 50, 50); color: #000000; border-radius: 0; transition: background-color 0.3s; font-size: 14px; padding: 6px 19px;">
                            Sign In
                        </a>
                        <a wire:navigate href="{{ route('register') }}" class="btn fw-bold register_btn"
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
                <?php
                $address = $settings && $settings->address ? $settings->address : '';
                ?>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="fw-bold mb-3 footer_first_column_title">Location</h5>
                    <p class="footer_fast_column_p">
                        {!! $address !!}
                    </p>
                    {{-- <a href="#" class="footer-link d-inline-block mt-2">View on Map (Placeholder)</a> --}}
                </div>

                <!-- Column 2: Important Links -->
             <div class="col-md-4 mb-4 mb-md-0">
    <h5 class="fw-bold mb-3 footer_middle_column_title">Quick Links</h5>
    <ul class="list-unstyled">
        <li class="mb-2"><a href="{{ route('home') }}" class="footer-link">Home</a></li>
        <li class="mb-2"><a href="{{ route('pricing') }}" class="footer-link">Pricing</a></li>
        <li class="mb-2"><a href="{{ route('about') }}" class="footer-link">About</a></li>
        <li class="mb-2"><a href="{{ route('resource') }}" class="footer-link">Resources</a></li>
        <li class="mb-2"><a href="{{ route('contact') }}" class="footer-link">Contact</a></li>
        <li class="mb-2"><a href="{{ route('legal') }}" class="footer-link">Legal</a></li>
    </ul>
</div>

                <!-- Column 3: Social Links -->
               @php
    $settings = \App\Models\WebsiteSetting::first();
    $facebook  = $settings && $settings->facebook   ? $settings->facebook   : '#';
    $youtube   = $settings && $settings->youtube    ? $settings->youtube    : '#';
    $instagram = $settings && $settings->instagram  ? $settings->instagram  : '#';
    $linkedin  = $settings && $settings->linkedin   ? $settings->linkedin   : '#';
@endphp

<div class="col-md-4">
    <h5 class="fw-bold mb-3 footer_last_column_title">Connect With Us</h5>
    <div class="d-flex justify-content-start">

        <!-- Facebook Icon -->
        <a href="{{ $facebook }}" class="text-white me-3" aria-label="Facebook" target="_blank">
            <i class="fab fa-facebook-f fa-lg"></i>
        </a>

        <!-- YouTube Icon -->
        <a href="{{ $youtube }}" class="text-white me-3" aria-label="YouTube" target="_blank">
            <i class="fab fa-youtube fa-lg"></i>
        </a>

        <!-- Instagram Icon -->
        <a href="{{ $instagram }}" class="text-white me-3" aria-label="Instagram" target="_blank">
            <i class="fab fa-instagram fa-lg"></i>
        </a>

        <!-- LinkedIn Icon -->
        <a href="{{ $linkedin }}" class="text-white" aria-label="LinkedIn" target="_blank">
            <i class="fab fa-linkedin-in fa-lg"></i>
        </a>

    </div>
</div>


            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>




    <!---Scriptsss-->
    <script src="{{ asset('script.js') }}"></script>
    @stack('script')

    <!-- Load Bootstrap 5 JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        xintegrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/A+0T5qD9t9f2T" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        xintegrity="sha384-0pUGl5vj5sA2O3vA3yO8Yk4T5zT7z0z4Vl7e5a7V6l" crossorigin="anonymous"></script>

    @livewireScripts

</body>

</html>
