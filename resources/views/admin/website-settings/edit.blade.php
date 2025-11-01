@extends('admin.dashboard')

@section('content')
<div class="container-fluid mt-4">
    <h2 class="mb-4">Website Settings</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.website-settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Address</label>
            <textarea name="address" class="form-control" rows="3">{{ $settings->address ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Logo</label>
            <input type="file" name="logo" class="form-control">
            @if(isset($settings->logo))
                <img src="{{ asset($settings->logo) }}" alt="Logo" style="height: 80px; margin-top: 10px;">
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Facebook</label>
            <input type="url" name="facebook" class="form-control" value="{{ $settings->facebook ?? '' }}">
        </div>

        <div class="mb-3">
            <label class="form-label">YouTube</label>
            <input type="url" name="youtube" class="form-control" value="{{ $settings->youtube ?? '' }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Instagram</label>
            <input type="url" name="instagram" class="form-control" value="{{ $settings->instagram ?? '' }}">
        </div>

        <div class="mb-3">
            <label class="form-label">LinkedIn</label>
            <input type="url" name="linkedin" class="form-control" value="{{ $settings->linkedin ?? '' }}">
        </div>

        <button type="submit" class="btn btn-primary">Save Settings</button>
    </form>
</div>
@endsection
