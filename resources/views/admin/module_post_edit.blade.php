@extends('admin.dashboard')

@section('content')
    <div class="container mt-4">
        <h3 class="mb-4">Edit {{ $module->name }} Post</h3>

        <!-- Display success message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Edit Post Form -->
        <div class="card mb-4">
            <div class="card-header">Edit {{ $module->name }} Post</div>
            <div class="card-body">
                <form action="{{ route('admin.modules.posts.update', [$module->id, $post->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title"
                            class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title', $post->title) }}" required>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Subtitle -->
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Subtitle</label>
                        <input type="text" name="subtitle" id="subtitle"
                            class="form-control @error('subtitle') is-invalid @enderror"
                            value="{{ old('subtitle', $post->subtitle) }}">
                        @error('subtitle')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Image -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" id="image"
                            class="form-control @error('image') is-invalid @enderror" accept="image/*">

                        @if ($post->image)
                            <div class="mt-2">
                                <p>Current Image:</p>
                                <img src="{{ asset($post->image) }}" alt="Image" width="120">
                            </div>
                        @endif
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea name="description" id="summernote" class="form-control @error('description') is-invalid @enderror"
                            rows="6" required>{{ old('description', $post->description) }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Update {{ $module->name }} Post</button>
                    <a href="{{ route('admin.modules.show', $module->id) }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 200
            });
        });
    </script>
@endsection
