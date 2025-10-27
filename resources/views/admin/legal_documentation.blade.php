@extends('admin.dashboard')

@section('content')
    <div class="container mt-4">
        <h3 class="mb-4">Legal Documentation</h3>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- ===== Page Title Card ===== --}}
        <div class="card mb-4 shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Legal Documentation Settings</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.legal.title.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Main Title</label>
                            <input type="text" value="{{ $legal_docuemt_content->main_title ?? '' }}" name="main_title"
                                class="form-control" placeholder="Enter Main Title (e.g. Legal Documentation)" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Short Title / Subtitle</label>
                            <input type="text" name="short_title" class="form-control"
                                placeholder="Enter Short Title (e.g. Access and download documents)"
                                value="{{ $legal_docuemt_content->short_title ?? '' }}" required>
                        </div>
                    </div>
                    <div class="mt-3 text-end">
                        <button type="submit" class="btn btn-success px-4">Save Titles</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Upload Form --}}
        <div class="card mb-4">
            <div class="card-header">Upload New Document</div>
            <div class="card-body">
                <form action="{{ route('admin.legal.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="title" class="form-control" placeholder="Document Title" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="category" class="form-control" placeholder="Category" required>
                        </div>
                        <div class="col-md-4">
                            <input type="file" name="file" class="form-control" required>
                        </div>
                    </div>
                    <div class="mt-3 text-end">
                        <button type="submit" class="btn btn-primary px-4">Upload</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Documents Table --}}
        <div class="card">
            <div class="card-header">All Documents</div>
            <div class="card-body">
                <table id="legalTable" class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Type</th>
                            <th>Uploaded</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($documents as $index => $doc)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $doc->title }}</td>
                                <td>{{ $doc->category }}</td>
                                <td>{{ strtoupper($doc->file_type) }}</td>
                                <td>{{ $doc->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.legal.view', $doc->id) }}" target="_blank"
                                        class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('admin.legal.download', $doc->id) }}"
                                        class="btn btn-success btn-sm">Download</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#legalTable').DataTable({
                pageLength: 10
            });
        });
    </script>
@endpush
