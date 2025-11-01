@extends('web-view.app')

@section('title', 'Subscription Details')

@section('content')
    <div class="container py-5">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-header bg-gradient text-black p-4"
                style="background: linear-gradient(135deg, #007bff, #6610f2);">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold mb-0">
                            <i class="fas fa-file-contract me-2"></i>
                            {{ $subscription->plan_name ?? 'Subscription Plan' }} Details
                        </h3>
                        <small class="text-light opacity-75">
                            Manage your subscription, upload and download files securely.
                        </small>
                    </div>
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-light fw-bold">
                        <i class="fas fa-arrow-left me-2"></i> Back to Dashboard
                    </a>
                </div>
            </div>

            <div class="card-body bg-light p-4">

                {{-- 1. Subscription Status --}}
                <div class="card shadow-sm mb-4 border-0 rounded-3">
                    <div class="card-header bg-white py-3 border-0">
                        <h5 class="fw-bold mb-0 text-primary">
                            <i class="fas fa-info-circle me-2"></i> Subscription Status
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <p class="text-muted mb-1 small text-uppercase">Status</p>
                                @php
                                    $status = $subscription->is_active ?? 'inactive';
                                    $statusText = ucfirst($status);
                                    $statusClass = $status === 'active' ? 'success' : 'danger';
                                @endphp
                                <h4 class="fw-bold">
                                    <span class="badge bg-{{ $statusClass }} px-3 py-2">{{ $statusText }}</span>
                                </h4>
                            </div>
                            <div class="col-md-6 mb-3">
                                <p class="text-muted mb-1 small text-uppercase">Valid Until</p>
                                <h4 class="fw-bold">
                                    {{ $subscription->validity_till ?? 'N/A' }}
                                    @if ($isExpired)
                                        <span class="badge bg-danger ms-2">Expired</span>
                                    @endif
                                </h4>
                            </div>
                        </div>

                        @if ($isExpired)
                            <div class="alert alert-warning mt-3 mb-0" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                Your subscription has expired. File transfer and downloads are disabled.
                            </div>
                        @endif
                    </div>
                </div>

                {{-- 2. File Upload --}}
                @if (!$isExpired)
                    <div class="card shadow-sm mb-4 border-0 rounded-3">
                        <div class="card-header bg-success text-white py-3 border-0">
                            <h5 class="fw-bold mb-0"><i class="fas fa-cloud-upload-alt me-2"></i> Send File to Admin</h5>
                        </div>
                        <div class="card-body bg-white">
                            <form action="{{ route('files.send', $subscription->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="file" class="form-label fw-bold">Select File</label>
                                    <input type="file" name="file" id="file" class="form-control rounded-3"
                                        required>
                                    <div class="form-text">Max file size: 10MB</div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success fw-bold px-4">
                                        <i class="fas fa-upload me-2"></i> Upload & Send
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif

                {{-- 3. Shared Files --}}
                <div class="card shadow-sm mb-0 border-0 rounded-3">
                    <div class="card-header bg-white py-3 border-0">
                        <h5 class="fw-bold mb-0 text-info">
                            <i class="fas fa-folder-open me-2"></i> Shared Files
                        </h5>
                    </div>
                    <div class="card-body bg-white">
                        @if ($files->isEmpty())
                            <div class="p-4 text-center text-muted">
                                <i class="fas fa-inbox fa-2x mb-3 text-secondary"></i>
                                <p class="mb-0">No files have been shared for this subscription yet.</p>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table align-middle table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" class="fw-bold">File Name</th>
                                            <th scope="col" class="fw-bold">Direction</th>
                                            <th scope="col" class="fw-bold">Uploaded On</th>
                                            <th scope="col" class="fw-bold text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($files as $file)
                                            <tr>
                                                <td>
                                                    <i class="far fa-file-alt me-2 text-muted"></i>
                                                    <strong>{{ $file->file_name }}</strong>
                                                </td>
                                                <td>
                                                    @if ($file->transfer_type === 'send')
                                                        <span class="badge bg-primary">
                                                            <i class="fas fa-arrow-up me-1"></i> Sent by You
                                                        </span>
                                                    @else
                                                        <span class="badge bg-info">
                                                            <i class="fas fa-arrow-down me-1"></i> Sent by Admin
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($file->created_at)->format('Y-m-d H:i') }}</td>
                                                <td class="text-center">
                                                    @if (!$isExpired && $file->is_transferable === 'yes')
                                                        <a href="{{ route('files.download', $file->id) }}"
                                                            class="btn btn-sm btn-outline-success fw-bold">
                                                            <i class="fas fa-download me-1"></i> Download
                                                        </a>
                                                    @else
                                                        <span class="badge bg-secondary px-3 py-2">Disabled</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-footer bg-light text-center py-3">
                <small class="text-muted">
                    <i class="fas fa-shield-alt me-1"></i> Your data is encrypted and securely stored.
                </small>
            </div>
        </div>
    </div>
@endsection
