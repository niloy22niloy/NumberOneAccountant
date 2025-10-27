@extends('admin.dashboard')

@section('content')
    <div class="container mt-4">
        <h3 class="mb-4">Manage Modules</h3>

        <!-- Add New Module Form -->
        <div class="card mb-4">
            <div class="card-header">Add New Module</div>
            <div class="card-body">
                <form action="{{ route('admin.modules.store') }}" method="POST">
                    @csrf
                    <div class="row g-2">
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Module Name (e.g., News)"
                                required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="description" class="form-control" placeholder="Short Description">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success w-100">Add Module</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modules List -->
        {{-- <div class="card">
            <div class="card-header">Existing Modules</div>
            <div class="card-body">
                @if ($modules->count() > 0)
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Module Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($modules as $module)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $module->name }}</td>
                                    <td>{{ $module->description }}</td>
                                    <td>
                                        <a href="{{ route('admin.modules.show', $module->id) }}"
                                            class="btn btn-primary btn-sm">Open</a>
                                        <form action="{{ route('admin.modules.destroy', $module->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Delete this module?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No modules created yet.</p>
                @endif
            </div>
        </div> --}}
    </div>
@endsection
