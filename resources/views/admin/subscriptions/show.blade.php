@extends('admin.dashboard')

@section('content')
    <div class="container py-4">

        <div class="card shadow-lg rounded-4 overflow-hidden">
            {{-- Card Header --}}
            <div class="card-header bg-gradient text-dark d-flex justify-content-between align-items-center"
                style="background: linear-gradient(135deg, #6610f2, #007bff);">
                <div>
                    <h3 class="fw-bold mb-0">
                        <i class="fas fa-file-contract me-2"></i>
                        Subscription: <span class="text-dark">{{ $subscription->plan_name }}</span>
                    </h3>
                    <small class="text-dark opacity-75">
                        Manage subscription, view files, and upload files to the user.
                    </small>
                </div>
                <a href="{{ route('admin.users.show', $subscription->user->id) }}" class="btn btn-outline-light fw-bold">
                    <i class="fas fa-arrow-left me-2"></i> Back to User
                </a>
            </div>

            <div class="card-body bg-light p-4">
                {{-- Subscription Info --}}
                <div class="row mb-4">
                    <div class="col-md-4">
                        <p class="text-muted mb-1 small text-uppercase">User</p>
                        <h5 class="fw-bold">{{ $subscription->user->name }}</h5>
                    </div>
                    <div class="col-md-4">
                        <p class="text-muted mb-1 small text-uppercase">Status</p>
                        <span class="badge {{ $subscription->is_active == 'yes' ? 'bg-success' : 'bg-danger' }}">
                            {{ ucfirst($subscription->is_active == 'yes' ? 'Active' : 'Inactive') }}
                        </span>
                    </div>
                    <div class="col-md-4">
                        <p class="text-muted mb-1 small text-uppercase">Valid Until</p>
                        <h5 class="fw-bold">
                            {{ \Carbon\Carbon::parse($subscription->validity_till)->format('Y-m-d') }}
                            @if (\Carbon\Carbon::parse($subscription->validity_till)->isPast())
                                <span class="badge bg-danger ms-2">Expired</span>
                            @endif
                        </h5>
                    </div>
                </div>

                {{-- User Uploaded Files --}}
                <div class="card shadow-sm mb-4 rounded-3">
                    <div class="card-header bg-white fw-bold">
                        User Uploaded Files
                    </div>
                    <div class="card-body">
                        @if ($subscription->files->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>File Name</th>
                                            <th>Direction</th>
                                            <th>Uploaded On</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subscription->files as $file)
                                            <tr>
                                                <td>{{ $file->file_name }}</td>
                                                <td>
                                                    @if ($file->transfer_type === 'send')
                                                        <span class="badge bg-primary">
                                                            <i class="fas fa-arrow-up me-1"></i> Sent by User
                                                        </span>
                                                    @else
                                                        <span class="badge bg-info">
                                                            <i class="fas fa-arrow-down me-1"></i> Sent by Admin
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($file->created_at)->format('Y-m-d H:i') }}</td>
                                                <td class="text-center">
                                                    <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank"
                                                        class="btn btn-sm btn-outline-success">
                                                        <i class="fas fa-download me-1"></i> Download
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center p-4 text-muted">
                                <i class="fas fa-inbox fa-2x mb-2"></i>
                                <p>No files uploaded by the user yet.</p>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Admin Upload File to User --}}
                <div class="card shadow-sm rounded-3">
                    <div class="card-header bg-success text-white fw-bold">
                        <i class="fas fa-cloud-upload-alt me-2"></i> Upload File to User
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.subscription.upload_file', $subscription->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="file" class="form-label fw-bold">Select File</label>
                                <input type="file" name="file" id="file" class="form-control" required>
                                <div class="form-text">Max file size: 10MB</div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-success fw-bold">
                                    <i class="fas fa-upload me-2"></i> Upload & Send
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <div class="card-footer bg-light text-center py-2">
                <small class="text-muted"><i class="fas fa-shield-alt me-1"></i> All files are stored securely.</small>
            </div>
        </div>

    </div>
@endsection
