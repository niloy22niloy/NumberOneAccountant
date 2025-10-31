@extends('web-view.app')

@section('content')
    {{-- 1. Dashboard Navigation --}}
    <nav class="navbar navbar-expand-lg navbar-light sticky-top shadow-sm"
        style="background-color: #ffffff; border-bottom: 1px solid #dee2e6;">
        <div class="container-fluid px-4 px-md-5">
            <a class="navbar-brand fw-bold text-primary d-flex align-items-center" href="{{ route('dashboard') ?? '#' }}">
                <img src="{{ asset('logo2.jpeg') }}" style="height: 58px; width: 177px;" alt="Logo" height="24"
                    class="me-2">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#dashboardNavbar"
                aria-controls="dashboardNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="dashboardNavbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active fw-bold text-primary" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="#">Packages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="#">Invoices</a>
                    </li>
                    <li class="nav-item">
                        {{-- 5. Profile Page Link (Direct link for easy access) --}}
                        <a class="nav-link text-secondary" href="{{ route('profile.edit') ?? '#' }}">Profile</a>
                    </li>
                </ul>

                {{-- User Profile Dropdown --}}
                <div class="d-flex ms-lg-3">
                    @auth
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle fw-bold" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ Auth::user()->name ?? 'User' }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2">
                                <li>
                                    {{-- 5. Profile Page Link (in dropdown as well) --}}
                                    <a class="dropdown-item" href="{{ route('profile.edit') ?? '#' }}">
                                        <i class="fas fa-user-circle me-2 text-primary"></i> Profile
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') ?? '#' }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="fas fa-sign-out-alt me-2"></i> Log Out
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    {{-- 2. Dashboard Content Area --}}
    <section class="py-5" style="min-height: 80vh; background-color: #f7f7f9;">
        <div class="container-fluid px-4 px-md-5">

            {{-- Header and Action Button --}}
            <div class="d-flex justify-content-between align-items-center mb-5">
                <h1 class="fw-bold text-dark">
                    Package Management Dashboard
                </h1>
                <button class="btn btn-success btn-lg fw-bold rounded-3 shadow-sm">
                    <i class="fas fa-magic me-2"></i> Upgrade Package
                </button>
            </div>

            <div class="row g-4">

                {{-- LEFT COLUMN (Package Metrics and Invoices) --}}
                <div class="col-lg-8">
                    <div class="row g-4 mb-4">

                        {{-- Metric Card 1: Total Buying Package Lists --}}
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 shadow-sm border-0 rounded-3">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-box-open fa-2x text-primary p-3 bg-light rounded-circle me-3"></i>
                                        <div>
                                            <p class="text-uppercase text-muted mb-1 small">Total Packages</p>
                                            <h4 class="card-title fw-bold text-dark mb-0">{{ $totalPackages ?? '45' }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Metric Card 2: Total Active Package Lists --}}
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 shadow-sm border-0 rounded-3">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <i
                                            class="fas fa-check-circle fa-2x text-success p-3 bg-light rounded-circle me-3"></i>
                                        <div>
                                            <p class="text-uppercase text-muted mb-1 small">Active Packages</p>
                                            <h4 class="card-title fw-bold text-dark mb-0">{{ $activePackages ?? '38' }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Metric Card 3: Total Not Active Package Lists --}}
                        <div class="col-md-12 col-lg-4">
                            <div class="card h-100 shadow-sm border-0 rounded-3">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <i
                                            class="fas fa-times-circle fa-2x text-danger p-3 bg-light rounded-circle me-3"></i>
                                        <div>
                                            <p class="text-uppercase text-muted mb-1 small">Inactive Packages</p>
                                            <h4 class="card-title fw-bold text-dark mb-0">{{ $inactivePackages ?? '7' }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- 4. Invoices List Table --}}
                    <div class="card shadow-sm border-0 rounded-3">
                        <div class="card-header bg-white py-3">
                            <h5 class="mb-0 fw-bold text-dark"><i class="fas fa-file-invoice me-2"></i> Recent Invoices</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" class="fw-bold text-muted">Invoice ID</th>
                                            <th scope="col" class="fw-bold text-muted">Client</th>
                                            <th scope="col" class="fw-bold text-muted text-end">Amount</th>
                                            <th scope="col" class="fw-bold text-muted">Due Date</th>
                                            <th scope="col" class="fw-bold text-muted text-center">Status</th>
                                            <th scope="col" class="fw-bold text-muted text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>INV-2025-00123</td>
                                            <td>Alpha Solutions</td>
                                            <td class="text-end">$49.99</td>
                                            <td>2025-11-15</td>
                                            <td class="text-center"><span class="badge bg-success">Paid</span></td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-outline-primary" title="View"><i
                                                        class="fas fa-eye"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>INV-2025-00124</td>
                                            <td>Global Tech</td>
                                            <td class="text-end">$199.00</td>
                                            <td>2025-11-05</td>
                                            <td class="text-center"><span
                                                    class="badge bg-warning text-dark">Pending</span></td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-outline-primary" title="View"><i
                                                        class="fas fa-eye"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>INV-2025-00125</td>
                                            <td>Innovate Labs</td>
                                            <td class="text-end">$99.99</td>
                                            <td>2025-10-30</td>
                                            <td class="text-center"><span class="badge bg-danger">Overdue</span></td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-outline-primary" title="View"><i
                                                        class="fas fa-eye"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer bg-white text-center py-3">
                            <a href="#" class="text-primary fw-bold">View All Invoices <i
                                    class="fas fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>

                {{-- RIGHT COLUMN (Announcements and Quick Links) --}}
                <div class="col-lg-4">

                    {{-- Announcement/Ads Panel --}}
                    <div class="card mb-4 shadow-sm border-0 rounded-3" style="background-color: #e9ecef;">
                        <div class="card-header bg-primary text-white py-3 rounded-top-3">
                            <h5 class="mb-0 fw-bold"><i class="fas fa-bullhorn me-2"></i> Announcement</h5>
                        </div>
                        <div class="card-body py-4">
                            <h5 class="fw-bold text-dark">New "Enterprise" Package Available!</h5>
                            <p class="text-muted small mb-0">
                                Unlock unlimited usage and priority support today. Check out the details in the Packages
                                section.
                            </p>
                            <div class="mt-3">
                                <button class="btn btn-outline-primary btn-sm fw-bold">View Details</button>
                            </div>
                        </div>
                    </div>

                    {{-- Quick Actions Card --}}
                    <div class="card shadow-sm border-0 rounded-3">
                        <div class="card-header bg-white py-3">
                            <h5 class="mb-0 fw-bold text-dark">Quick Actions</h5>
                        </div>
                        <div class="list-group list-group-flush">
                            <a href="#"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Renew Package
                                <i class="fas fa-redo-alt text-success"></i>
                            </a>
                            <a href="#"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Download Statement
                                <i class="fas fa-download text-info"></i>
                            </a>
                            <a href="{{ route('profile.edit') ?? '#' }}"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Edit Profile
                                <i class="fas fa-user-edit text-secondary"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
