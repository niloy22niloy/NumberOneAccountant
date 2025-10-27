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
    <main class="flex-grow-1 container py-5">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bolder text-dark mb-3">Latest Insights & Analysis</h1>
            <p class="lead text-muted mx-auto" style="max-width: 48rem;">Deep dives into technology, future trends, and
                creative development. Stay informed with our expert analysis.</p>
        </div>

        <!-- Blog Post Grid -->
        <div id="blog-list" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-5">

            <!-- Blog Post Card 1: AI Integration -->
            <div class="col">
                <div class="card h-100 blog-card shadow-sm rounded-3 overflow-hidden">
                    <div class="card-img-height"
                        style="background-image: url('https://img.freepik.com/free-photo/online-message-blog-chat-communication-envelop-graphic-icon-concept_53876-139717.jpg');">
                    </div>
                    <div class="card-body p-4">
                        <p class="small fw-bold text-primary mb-1 text-uppercase">Technology</p>
                        <h2 class="h5 fw-bolder text-dark mb-3">The Next Frontier: Integrating Generative AI into
                            Everyday Workflows</h2>
                        <p class="card-text text-secondary mb-4"
                            style="-webkit-line-clamp: 3; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden;">
                            Explore how small businesses can leverage large language models to automate routine tasks,
                            enhance customer service, and unlock new levels of efficiency.</p>
                        <div class="d-flex justify-content-between align-items-center small text-muted border-top pt-3">
                            <span>By **Alex Doe**</span>
                            <span>Oct 25, 2025</span>
                        </div>
                        <a href="#"
                            class="d-inline-block mt-3 text-primary fw-bold text-decoration-none border-bottom border-primary">
                            Read Full Article &rarr;
                        </a>
                    </div>
                </div>
            </div>

            <!-- Blog Post Card 2: Design Systems -->
            <div class="col">
                <div class="card h-100 blog-card shadow-sm rounded-3 overflow-hidden">
                    <div class="card-img-height"
                        style="background-image: url('https://placehold.co/600x400/45A2FF/ffffff?text=Design+System');">
                    </div>
                    <div class="card-body p-4">
                        <p class="small fw-bold text-primary mb-1 text-uppercase">Design</p>
                        <h2 class="h5 fw-bolder text-dark mb-3">Building Scalable UI: Why Every Team Needs a Robust
                            Design System</h2>
                        <p class="card-text text-secondary mb-4"
                            style="-webkit-line-clamp: 3; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden;">
                            A deep dive into the principles of atomic design and how standardized components improve
                            consistency, speed up development, and reduce technical debt.</p>
                        <div class="d-flex justify-content-between align-items-center small text-muted border-top pt-3">
                            <span>By **Jane Smith**</span>
                            <span>Oct 20, 2025</span>
                        </div>
                        <a href="#"
                            class="d-inline-block mt-3 text-primary fw-bold text-decoration-none border-bottom border-primary">
                            Read Full Article &rarr;
                        </a>
                    </div>
                </div>
            </div>

            <!-- Blog Post Card 3: Remote Work -->
            <div class="col">
                <div class="card h-100 blog-card shadow-sm rounded-3 overflow-hidden">
                    <div class="card-img-height"
                        style="background-image: url('https://placehold.co/600x400/2563EB/ffffff?text=Remote+Productivity');">
                    </div>
                    <div class="card-body p-4">
                        <p class="small fw-bold text-primary mb-1 text-uppercase">Productivity</p>
                        <h2 class="h5 fw-bolder text-dark mb-3">Mastering Asynchronous Communication in a Fully Remote
                            Environment</h2>
                        <p class="card-text text-secondary mb-4"
                            style="-webkit-line-clamp: 3; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden;">
                            Tips and tools for teams looking to maximize output and maintain team cohesion without
                            relying on constant real-time meetings. Focus on documentation.</p>
                        <div class="d-flex justify-content-between align-items-center small text-muted border-top pt-3">
                            <span>By **Chris Lee**</span>
                            <span>Oct 15, 2025</span>
                        </div>
                        <a href="#"
                            class="d-inline-block mt-3 text-primary fw-bold text-decoration-none border-bottom border-primary">
                            Read Full Article &rarr;
                        </a>
                    </div>
                </div>
            </div>

            <!-- Blog Post Card 4: Web Development -->
            <div class="col">
                <div class="card h-100 blog-card shadow-sm rounded-3 overflow-hidden">
                    <div class="card-img-height"
                        style="background-image: url('https://placehold.co/600x400/1E40AF/ffffff?text=Frontend+Trends');">
                    </div>
                    <div class="card-body p-4">
                        <p class="small fw-bold text-primary mb-1 text-uppercase">Development</p>
                        <h2 class="h5 fw-bolder text-dark mb-3">The Rise of Server Components: Reshaping Modern Frontend
                            Architecture</h2>
                        <p class="card-text text-secondary mb-4"
                            style="-webkit-line-clamp: 3; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden;">
                            An examination of the performance benefits and conceptual shifts brought about by new
                            component models in major JavaScript frameworks.</p>
                        <div class="d-flex justify-content-between align-items-center small text-muted border-top pt-3">
                            <span>By **Pat Ryan**</span>
                            <span>Oct 10, 2025</span>
                        </div>
                        <a href="#"
                            class="d-inline-block mt-3 text-primary fw-bold text-decoration-none border-bottom border-primary">
                            Read Full Article &rarr;
                        </a>
                    </div>
                </div>
            </div>

            <!-- Blog Post Card 5: Ethical AI -->
            <div class="col">
                <div class="card h-100 blog-card shadow-sm rounded-3 overflow-hidden">
                    <div class="card-img-height"
                        style="background-image: url('https://placehold.co/600x400/1E3A8A/ffffff?text=Ethical+AI');">
                    </div>
                    <div class="card-body p-4">
                        <p class="small fw-bold text-primary mb-1 text-uppercase">Ethics</p>
                        <h2 class="h5 fw-bolder text-dark mb-3">Navigating Bias: Best Practices for Auditing Machine
                            Learning Models</h2>
                        <p class="card-text text-secondary mb-4"
                            style="-webkit-line-clamp: 3; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden;">
                            How to systematically check your AI systems for embedded biases and strategies to ensure
                            fairness and transparency in automated decision-making.</p>
                        <div class="d-flex justify-content-between align-items-center small text-muted border-top pt-3">
                            <span>By **Mia Chen**</span>
                            <span>Oct 05, 2025</span>
                        </div>
                        <a href="#"
                            class="d-inline-block mt-3 text-primary fw-bold text-decoration-none border-bottom border-primary">
                            Read Full Article &rarr;
                        </a>
                    </div>
                </div>
            </div>

            <!-- Blog Post Card 6: Data Science -->
            <div class="col">
                <div class="card h-100 blog-card shadow-sm rounded-3 overflow-hidden">
                    <div class="card-img-height"
                        style="background-image: url('https://placehold.co/600x400/38BDF8/ffffff?text=Big+Data');">
                    </div>
                    <div class="card-body p-4">
                        <p class="small fw-bold text-primary mb-1 text-uppercase">Data Science</p>
                        <h2 class="h5 fw-bolder text-dark mb-3">The Unseen Power of Small Data: Focusing on Qualitative
                            Analysis</h2>
                        <p class="card-text text-secondary mb-4"
                            style="-webkit-line-clamp: 3; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden;">
                            While Big Data dominates, this article champions the focused, deep insights derived from
                            smaller, carefully curated datasets and qualitative research methods.</p>
                        <div class="d-flex justify-content-between align-items-center small text-muted border-top pt-3">
                            <span>By **Kai Sato**</span>
                            <span>Sep 28, 2025</span>
                        </div>
                        <a href="#"
                            class="d-inline-block mt-3 text-primary fw-bold text-decoration-none border-bottom border-primary">
                            Read Full Article &rarr;
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
