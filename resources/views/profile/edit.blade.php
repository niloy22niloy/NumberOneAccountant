{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}


@extends('web-view.app')

@section('content')
    {{-- 1. Profile Content Area (Matching Dashboard Background) --}}
    <section class="py-5" style="min-height: 80vh; background-color: #f7f7f9;">
        <div class="container px-4 px-md-5">

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-5">
                <h1 class="fw-bold text-dark">
                    <i class="fas fa-user-circle me-2 text-primary"></i> Profile Settings
                </h1>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-lg-8">

                    {{-- Card 1: Update Profile Information --}}
                    <div class="card shadow-sm border-0 rounded-3 mb-4">
                        <div class="card-header bg-white py-3">
                            <h5 class="mb-0 fw-bold text-dark">Personal Information</h5>
                            <p class="text-muted small mb-0">Update your account's profile information and email address.
                            </p>
                        </div>
                        <div class="card-body p-4">
                            {{-- Include the partial that handles the form logic --}}
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    {{-- Card 2: Update Password --}}
                    <div class="card shadow-sm border-0 rounded-3 mb-4">
                        <div class="card-header bg-white py-3">
                            <h5 class="mb-0 fw-bold text-dark">Update Password</h5>
                            <p class="text-muted small mb-0">Ensure your account is using a long, random password to stay
                                secure.</p>
                        </div>
                        <div class="card-body p-4">
                            {{-- Include the partial that handles the form logic --}}
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    {{-- Card 3: Delete Account (Highlighted in red for caution) --}}
                    {{-- <div class="card shadow-sm border-danger border-2 rounded-3">
                        <div class="card-header bg-danger text-white py-3 rounded-top-3">
                            <h5 class="mb-0 fw-bold"><i class="fas fa-exclamation-triangle me-2"></i> Delete Account</h5>
                        </div>
                        <div class="card-body p-4">
                            <p class="text-danger small fw-bold">
                                Once your account is deleted, all of its resources and data will be permanently erased.
                            </p>
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
    </section>
@endsection
