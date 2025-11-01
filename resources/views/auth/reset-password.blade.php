{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


@extends('web-view.app')

@section('content')
    <div class="auth-page">
        <div class="auth-card">
            <div class="auth-header">
                <img src="{{ asset('logoo.png') }}" alt="Logo">
                <h2>Reset Password</h2>
                <p>Enter your email and new password to reset your account</p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="alert alert-success text-center mb-3">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div class="form-floating-custom">
                    <input type="email" class="form-control-custom" id="email" name="email"
                        value="{{ old('email', $request->email) }}" placeholder=" " required autofocus>
                    <label for="email" class="form-label-custom">Email Address</label>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-floating-custom">
                    <input type="password" class="form-control-custom" id="password" name="password" placeholder=" "
                        required>
                    <label for="password" class="form-label-custom">New Password</label>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-floating-custom">
                    <input type="password" class="form-control-custom" id="password_confirmation"
                        name="password_confirmation" placeholder=" " required>
                    <label for="password_confirmation" class="form-label-custom">Confirm Password</label>
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-auth-primary w-100">Reset Password</button>
            </form>

            <!-- Back to Login -->
            <div class="auth-footer">
                <small>Remember your password? <a href="{{ route('login') }}">Log in here</a></small>
            </div>
        </div>
    </div>

    <style>
        :root {
            --primary-color: #0d6efd;
            --text-color: #111827;
            --muted-color: #6b7280;
            --border-color: #d1d5db;
            --input-bg: #fff;
            --input-focus-border: #0d6efd;
        }

        .auth-page {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 80vh;
            background: #f9fafb;
            padding: 2rem 1rem;
        }

        .auth-card {
            width: 100%;
            max-width: 420px;
            background-color: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 1rem;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
            padding: 2.5rem 2rem;
            transition: all 0.3s ease;
        }

        .auth-card:hover {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .auth-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .auth-header img {
            width: 40%;
            margin-bottom: 0.75rem;
        }

        .auth-header h2 {
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 0.25rem;
        }

        .auth-header p {
            color: var(--muted-color);
            font-size: 0.95rem;
        }

        .form-floating-custom {
            position: relative;
            margin-bottom: 1.75rem;
        }

        .form-control-custom {
            width: 100%;
            height: 3.3rem;
            padding: 1.25rem 1rem 0.5rem 1rem;
            border-radius: 0.5rem;
            border: 1px solid var(--border-color);
            background: var(--input-bg);
            color: var(--text-color);
            font-size: 1rem;
            transition: all 0.2s ease;
        }

        .form-control-custom:focus {
            border-color: var(--input-focus-border);
            box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.1);
            outline: none;
        }

        .form-label-custom {
            position: absolute;
            top: 1rem;
            left: 1rem;
            color: var(--muted-color);
            font-size: 1rem;
            pointer-events: none;
            transition: all 0.2s ease;
        }

        .form-control-custom:focus+.form-label-custom,
        .form-control-custom:not(:placeholder-shown)+.form-label-custom {
            top: 0.4rem;
            left: 0.9rem;
            font-size: 0.8rem;
            color: var(--primary-color);
            background: #fff;
            padding: 0 0.3rem;
        }

        .btn-auth-primary {
            background-color: var(--primary-color);
            color: #fff;
            font-weight: 600;
            border: none;
            border-radius: 0.5rem;
            padding: 0.8rem;
            transition: background-color 0.2s ease;
        }

        .btn-auth-primary:hover {
            background-color: #0b5ed7;
        }

        .auth-footer {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.9rem;
        }

        .auth-footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .auth-footer a:hover {
            text-decoration: underline;
        }

        .text-danger {
            font-size: 0.85rem;
            display: block;
            margin-top: 0.3rem;
        }

        .alert {
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            font-size: 0.9rem;
        }

        .alert-success {
            background-color: #e7f5ff;
            color: #0c5460;
            border: 1px solid #b6effb;
        }
    </style>
@endsection
