@extends('web-view.app')

@section('content')
    <div class="auth-page">
        <div class="auth-card">
            <div class="auth-header">
                <img src="{{ asset('logoo.png') }}" alt="Logo">
                <h2>Create Account</h2>
                <p>Join us and get started today</p>
            </div>

            <form action="register-submit.html" method="POST">
                <div class="form-floating-custom">
                    <input type="text" class="form-control-custom" id="registerName" placeholder=" " required>
                    <label for="registerName" class="form-label-custom">Full Name</label>
                </div>

                <div class="form-floating-custom">
                    <input type="email" class="form-control-custom" id="registerEmail" placeholder=" " required>
                    <label for="registerEmail" class="form-label-custom">Email Address</label>
                </div>

                <div class="form-floating-custom">
                    <input type="password" class="form-control-custom" id="registerPassword" placeholder=" " required>
                    <label for="registerPassword" class="form-label-custom">Password</label>
                </div>

                <div class="form-floating-custom">
                    <input type="password" class="form-control-custom" id="registerConfirmPassword" placeholder=" "
                        required>
                    <label for="registerConfirmPassword" class="form-label-custom">Confirm Password</label>
                </div>

                <button type="submit" class="btn btn-auth-primary w-100">Register</button>
            </form>

            <div class="auth-footer">
                <small>Already have an account? <a href="sign-in.html">Sign In here</a></small>
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

        /* Full Page Centering */
        .auth-page {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 80vh;
            background: #f9fafb;
            padding: 2rem 1rem;
        }

        /* Card */
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

        /* Header */
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

        /* Floating Labels */
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

        /* Buttons */
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

        /* Footer links */
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
    </style>
@endsection
