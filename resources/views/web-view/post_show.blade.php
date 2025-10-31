@extends('web-view.app')

@section('content')
<style>
    .hero-article-header {
        height: 50vh;
        background-color: #3b82f6;
        background-size: cover;
        background-position: center;
        position: relative;
        color: white;
        display: flex;
        align-items: flex-end;
        justify-content: center;
        text-align: center;
    }
    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.1));
    }
    .hero-content {
        z-index: 10;
        padding-bottom: 3rem;
        max-width: 800px;
    }
</style>

<!-- Article Hero Section -->
<div class="hero-article-header mb-5" style="background-image: url('{{ asset($post->image) }}');">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <span class="badge text-bg-primary text-uppercase fw-bold mb-3">
            {{ $post->resourceModule->name ?? 'General' }}
        </span>
        <h1 class="display-5 fw-bolder mb-3">{{ $post->title }}</h1>
        <p class="small text-white-50">
            Published by <span class="fw-bold text-white">Admin</span> on {{ $post->created_at->format('F d, Y') }}
        </p>
    </div>
</div>

<!-- Main Content Section -->
<main class="flex-grow-1 container pb-5">
    <div class="row justify-content-center">
        <article class="col-lg-8">

            <!-- Subtitle -->
            @if($post->subtitle)
                <p class="lead mb-5 text-dark">{{ $post->subtitle }}</p>
            @endif

            <!-- Description (Main Body) -->
            <div class="text-secondary mb-4">
                {!! (($post->description)) !!}
            </div>

        </article>
    </div>
</main>
@endsection
