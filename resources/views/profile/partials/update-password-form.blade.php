{{-- <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
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


<form method="post" action="{{ route('password.update') }}" class="mt-3">
    @csrf
    @method('put')

    {{-- Current Password Field --}}
    <div class="mb-3">
        <label for="update_password_current_password" class="form-label fw-bold">{{ __('Current Password') }}</label>
        <input id="update_password_current_password" name="current_password" type="password"
            class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
            autocomplete="current-password">
        {{-- Displaying Current Password Validation Error --}}
        @error('current_password', 'updatePassword')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- New Password Field --}}
    <div class="mb-3">
        <label for="update_password_password" class="form-label fw-bold">{{ __('New Password') }}</label>
        <input id="update_password_password" name="password" type="password"
            class="form-control @error('password', 'updatePassword') is-invalid @enderror" autocomplete="new-password">
        {{-- Displaying New Password Validation Error --}}
        @error('password', 'updatePassword')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Confirm Password Field --}}
    <div class="mb-3">
        <label for="update_password_password_confirmation"
            class="form-label fw-bold">{{ __('Confirm Password') }}</label>
        <input id="update_password_password_confirmation" name="password_confirmation" type="password"
            class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror"
            autocomplete="new-password">
        {{-- Displaying Confirmation Password Validation Error --}}
        @error('password_confirmation', 'updatePassword')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Action Buttons and Status Message --}}
    <div class="d-flex align-items-center gap-3 pt-3">
        <button type="submit" class="btn btn-primary fw-bold">{{ __('Save') }}</button>

        @if (session('status') === 'password-updated')
            {{-- Note: Assumes Alpine.js is loaded for x-data/x-show/x-transition --}}
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-success fw-bold small mb-0">{{ __('Saved.') }}</p>
        @endif
    </div>
</form>
