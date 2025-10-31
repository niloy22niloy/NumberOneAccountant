@extends('web-view.app')
@section('content')
    <!-- 3. About Us Section -->
    <section id="about-view" class="">
        <!-- <div class="container">
                        <div class="p-5 text-center border rounded-3 bg-light">
                            <h2 class="display-5 fw-bold text-primary-custom mb-3"> The Page Is Now on Development Process!!
                            </h2>
                        </div>
                    </div> -->
        <section class="about-section">
            <div class="container">
                <div class="intro-card text-center">
                    <h1 class="text-white mb-3">
                        @if(isset($about_first_section->title))
                        {{$about_first_section->title}}
                        @else
                        Please Add Title
                        @endif
                    </h1>
                    <p class="lead">
                        @if(isset($about_first_section->subtitle))
                        {{$about_first_section->subtitle}}
                        @else
                        Please Add Subtitle
                        @endif

                    </p>
                </div>

                <div class="feat bg-gray pt-5 pb-5">
                    <div class="container">
                        <div class="row">
                            <div class="section-head col-sm-12">
                                <h4><span>W
                                    @if(isset($about_second_section->second_title))
                                    {{$about_second_section->section_title}}
                                    @else
                                    Please add title
                                    @endif
                                </h4>
                                <p style="color:#000;font-size:18px;">
                                    @if(isset($about_second_section->second_subtitle))
                                    {{$about_second_section->second_subtitle}}
                                    @else
                                    Please add subtitle
                                    @endif
                                </p>
                            </div>
                            @forelse ($about_second_section_card as $cards)
                                <div class="col-lg-4 col-sm-6">
                                <div class="item">
                                    <span class="icon feature_box_col_two"><i class="{{$cards->icon ?? " "}}"></i></span>
                                    <h6>Transparent Fixed Fees</h6>
                                    <p>Our pricing is simple and clear, with one fixed monthly fee and no hidden costs,
                                        making budgeting easy.</p>
                                </div>
                            </div>

                            @empty


                            @endforelse

                        </div>
                    </div>
                </div>
                <hr class="my-5">

                <div class="section-header">
                    {{-- {{$about_third_section}} --}}
                    <h2 class="section-title">
                        {{$about_third_section->third_title ?? ""}}
                    </h2>
                    <p class="section-subtitle">
                        {{$about_third_section->third_subtitle??""}}
                    </p>
                </div>

                <div class="client-box-wrapper mb-5">

                    @forelse ($about_third_section_card as $cards)

                     <div class="client-box">
                        <i class="{{$cards->third_icon ?? ""}}"></i>
                        <span>{{$cards->third_title ?? ""}}</span>
                    </div>
                    @empty

                    @endforelse



                </div>

                <!-- <div class="text-center mt-5">
                    <a href="#" class="btn btn-primary btn-lg px-5 py-3 shadow-lg">Get a Free Consultation Today</a>
                </div> -->
                <div class="cta-section">
                    <h3>
                        {{$about_last_section->last_title ?? " "}}
                    </h3>
                    <p>{{$about_last_section->last_subtitle ?? " "}}</p>
                    <a href="{{$about_last_section->last_link ?? " "}}" class="btn-cta">
                        <i class="fas fa-rocket me-2"></i>Get Started Today
                    </a>
                </div>

            </div>
        </section>
    </section>
@endsection
