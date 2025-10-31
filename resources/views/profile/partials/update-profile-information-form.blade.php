{{-- <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section> --}}

<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>

<form method="post" action="{{ route('profile.update') }}" class="mt-3">
    @csrf
    @method('patch')

    {{-- Name Field --}}
    <div class="mb-3">
        <label for="name" class="form-label fw-bold">{{ __('Name') }}</label>
        <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
        {{-- Displaying Name Validation Error --}}
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Email Field --}}
    <div class="mb-3">
        <label for="email" class="form-label fw-bold">{{ __('Email') }}</label>
        <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email', $user->email) }}" required autocomplete="username">
        {{-- Displaying Email Validation Error --}}
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
            <div class="mt-2">
                <p class="text-muted small mb-1">
                    {{ __('Your email address is unverified.') }}
                </p>
                <button form="send-verification" type="submit" class="btn btn-sm btn-outline-warning">
                    {{ __('Click here to re-send the verification email.') }}
                </button>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 fw-bold text-success small">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            </div>
        @endif
    </div>

    {{-- Action Buttons and Status Message --}}
    <div class="d-flex align-items-center gap-3 pt-3">
        <button type="submit" class="btn btn-primary fw-bold">{{ __('Save') }}</button>

        @if (session('status') === 'profile-updated')
            {{-- Note: Assumes Alpine.js is loaded for x-data/x-show/x-transition --}}
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-success fw-bold small mb-0">{{ __('Saved.') }}</p>
        @endif
    </div>
</form>
