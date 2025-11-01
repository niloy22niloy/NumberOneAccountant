@extends('web-view.app')

@section('content')
    <div class="auth-page">
        <div class="auth-card">
            <div class="auth-header">
                <h2>Admin Login</h2>
                <p>Enter your credentials to access the admin panel</p>
            </div>

            <!-- Error Message -->
            @if($errors->any())
                <div class="alert alert-danger text-center mb-3">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login') }}">
                @csrf

                <!-- Email -->
                <div class="form-floating-custom">
                    <input type="email" class="form-control-custom" name="email" id="email" placeholder=" " required>
                    <label for="email" class="form-label-custom">Email</label>
                </div>

                <!-- Password -->
                <div class="form-floating-custom">
                    <input type="password" class="form-control-custom" name="password" id="password" placeholder=" " required>
                    <label for="password" class="form-label-custom">Password</label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-auth-primary w-100">Login</button>
            </form>
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

        .form-control-custom:focus + .form-label-custom,
        .form-control-custom:not(:placeholder-shown) + .form-label-custom {
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

        .alert {
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            font-size: 0.9rem;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
@endsection
