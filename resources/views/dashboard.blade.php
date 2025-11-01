@extends('web-view.app')

@section('content')
    {{-- 1. Dashboard Content Area and Sidebar Layout --}}
    <div class="container-fluid">
        <div class="row" style="min-height: 100vh;">

            {{-- LEFT SIDEBAR (Collapsible) --}}
            <nav id="sidebarMenu" class="col-lg-2 col-md-4 col-sm-12 d-lg-block collapse bg-white shadow-sm sidebar"
                style="padding-top: 15px; border-right: 1px solid #dee2e6;">
                <div class="position-sticky">
                    <div class="list-group list-group-flush mx-3 mt-4">
                        {{-- <a href="#" class="list-group-item list-group-item-action py-2 active fw-bold text-primary">
                            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                        </a> --}}
                        <a href="#" class="list-group-item list-group-item-action py-2">
                            <i class="fas fa-box me-2"></i> Packages
                        </a>
                        <a href="#" class="list-group-item list-group-item-action py-2">
                            <i class="fas fa-file-invoice-dollar me-2"></i> Invoices
                        </a>
                        <a href="#" class="list-group-item list-group-item-action py-2">
                            <i class="fas fa-user-circle me-2"></i> Profile
                        </a>
                    </div>
                </div>
            </nav>

            {{-- MAIN CONTENT (Now spans 100% of available space) --}}
            <main class="col-lg-10 col-md-8 ms-sm-auto px-4 px-md-5 py-5" style="background-color: #f7f7f9;">

                {{-- Header and Mobile Nav Control --}}
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold text-dark">
                        Package Management Dashboard
                    </h1>

                    <div class="d-flex align-items-center">
                        {{-- Mobile Toggle Button for Sidebar on small screens --}}
                        <button class="btn btn-outline-primary d-lg-none me-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                            aria-label="Toggle sidebar">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>

                    {{-- User Profile Dropdown (STATIC VERSION) - Removed the d-none d-lg-inline-block if you want it visible --}}
                    {{-- If the parent layout handles the user dropdown, remove this block. Keeping it for completeness. --}}
                    <div class="dropdown d-lg-inline-block ms-3">
                        <button class="btn btn-primary dropdown-toggle fw-bold btn-sm" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Static User
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user-circle me-2 text-primary"></i> Profile
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a href="#" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt me-2"></i> Log Out
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="row g-4">

                    {{-- FULL WIDTH CONTENT COLUMN (col-lg-12) --}}
                    <div class="col-lg-12">

                        {{-- Metric Cards --}}
                        <div class="row g-4 mb-4">

                            {{-- Metric Card 1: Total Packages (STATIC) --}}
                            <div class="col-md-6 col-lg-4">
                                <div class="card h-100 shadow-sm border-0 rounded-3">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <i
                                                class="fas fa-box-open fa-2x text-primary p-3 bg-light rounded-circle me-3"></i>
                                            <div>
                                                <p class="text-uppercase text-muted mb-1 small">Total Packages</p>
                                                <h4 class="card-title fw-bold text-dark mb-0">45</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Metric Card 2: Active Packages (STATIC) --}}
                            <div class="col-md-6 col-lg-4">
                                <div class="card h-100 shadow-sm border-0 rounded-3">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <i
                                                class="fas fa-check-circle fa-2x text-success p-3 bg-light rounded-circle me-3"></i>
                                            <div>
                                                <p class="text-uppercase text-muted mb-1 small">Active Packages</p>
                                                <h4 class="card-title fw-bold text-dark mb-0">38</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Metric Card 3: Inactive Packages (STATIC) --}}
                            <div class="col-md-12 col-lg-4">
                                <div class="card h-100 shadow-sm border-0 rounded-3">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <i
                                                class="fas fa-times-circle fa-2x text-danger p-3 bg-light rounded-circle me-3"></i>
                                            <div>
                                                <p class="text-uppercase text-muted mb-1 small">Inactive Packages</p>
                                                <h4 class="card-title fw-bold text-dark mb-0">7</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Active Plan List --}}
                        <div class="card shadow-sm border-0 rounded-3 mb-4">
                            <div class="card-header bg-white py-3">
                                <h5 class="mb-0 fw-bold text-dark"><i class="fas fa-clipboard-check me-2"></i> Active Plan
                                    List</h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1 fw-bold">Enterprise Pro Plan</h6>
                                            <small class="text-muted">Status: Active | Expires: 2026-05-20</small>
                                        </div>
                                        <button class="btn btn-sm btn-outline-success">Manage</button>
                                    </div>
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1 fw-bold">Standard Business Plan</h6>
                                            <small class="text-muted">Status: Active | Expires: 2025-12-31</small>
                                        </div>
                                        <button class="btn btn-sm btn-outline-success">Manage</button>
                                    </div>
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1 fw-bold">Basic Starter Plan</h6>
                                            <small class="text-muted">Status: Active | Expires: 2025-11-08</small>
                                        </div>
                                        <button class="btn btn-sm btn-outline-success">Manage</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-white text-center py-3">
                                <a href="#" class="text-primary fw-bold">View All Active Plans <i
                                        class="fas fa-arrow-right ms-1"></i></a>
                            </div>
                        </div>

                        {{-- 4. Invoices List Table --}}
                        <div class="card shadow-sm border-0 rounded-3">
                            <div class="card-header bg-white py-3">
                                <h5 class="mb-0 fw-bold text-dark"><i class="fas fa-file-invoice me-2"></i> Recent Invoices
                                    (Total: 15)</h5>
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
                                            {{-- Static Invoice Data --}}
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

                </div>
            </main>
        </div>
    </div>
@endsection
