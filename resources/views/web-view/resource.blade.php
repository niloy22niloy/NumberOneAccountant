@extends('web-view.app')
@section('content')
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f6f8fc;
            /* Light background for the page */
        }

        .card-img-height {
            height: 12rem;
            /* h-48 equivalent */
            background-size: cover;
            background-position: center;
        }

        /* Custom Hover Effect to replicate Tailwind's look */
        .blog-card {
            border: 2px solid transparent;
            transition: all 0.5s ease-in-out;
        }

        .blog-card:hover {
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
            /* shadow-lg / shadow-2xl equivalent */
            border-color: #3b82f6 !important;
            /* blue-500 equivalent */
            transform: translateY(-5px);
        }
    </style>

    <!-- Main Content Section -->
    @foreach ($resources as $resource)
        <main class="flex-grow-1 container py-5">
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bolder text-dark mb-3">{{ $resource->name }}</h1>
                <p class="lead text-muted mx-auto" style="max-width: 48rem;">
                    {{ $resource->description }}
                </p>
            </div>


            <div class="mb-4">

                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-5">
                    @foreach ($resource->modulePosts as $post)
                        <div class="col">
                            <div class="card h-100 blog-card shadow-sm rounded-3 overflow-hidden">
                                <div class="card-img-height"
                                    style="background-image: url('{{ asset($post->image) }}'); background-size: cover; background-position: center;">
                                </div>
                                <div class="card-body p-4">
                                    <p class="small fw-bold text-primary mb-1 text-uppercase">{{ $resource->name }}</p>
                                    <h2 class="h5 fw-bolder text-dark mb-3">{{ $post->title }}</h2>
                                    <p class="card-text text-secondary mb-4"
                                        style="-webkit-line-clamp: 3; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden;">
                                        {{ $post->subtitle }}
                                    </p>
                                    <div
                                        class="d-flex justify-content-between align-items-center small text-muted border-top pt-3">
                                        <span>By <strong>Admin</strong></span>
                                        <span>{{ $post->created_at->format('M d, Y') }}</span>
                                    </div>
                                    <a href="{{ route('post.show', $post->id) }}"
                                        class="d-inline-block mt-3 text-primary fw-bold text-decoration-none border-bottom border-primary"
                                        wire:navigate>
                                        Read Full Article &rarr;
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </main>
    @endforeach
@endsection
