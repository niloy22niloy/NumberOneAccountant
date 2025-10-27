@extends('admin.dashboard')

@section('content')
    <div class="container-fluid p-0">
        <div class="col-auto d-none d-sm-block mb-5">
            <h3><strong>About/ </strong> About-Section</h3>
        </div>

        <div class="row">
            <div class="col-sm-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3>First Section</h3>
                    </div>
                    <div class="card-body">
                        {{-- Success Message --}}
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        {{--  Form --}}
                        <form action="{{ route('admin.about_first_section_post') }}" method="POST">
                            @csrf

                            {{-- Title --}}
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" id="title" value="{{ old('title', $About_first->title ?? '') }}">
                                {{-- Error message for title --}}
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Subtitle --}}
                            <div class="mb-3">
                                <label for="subtitle" class="form-label">Subtitle</label>
                                <textarea class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" id="subtitle" cols="10"
                                    rows="5">{{ old('subtitle', $About_first->subtitle ?? '') }}</textarea>

                                {{-- Error message for subtitle --}}
                                @error('subtitle')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Submit --}}
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--- Second Section ----->
            <div class="col-sm-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Second Section</h3>
                    </div>
                    <div class="card-body">

                        {{-- ✅ Success Message for Second Section --}}
                        @if (session('success_second'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success_second') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- ✅ Form --}}
                        <form action="{{ route('admin.about_second_section_post') }}" method="POST">
                            @csrf

                            {{-- Title --}}
                            <div class="mb-3">
                                <label for="second_title" class="form-label">Title</label>
                                <input type="text" class="form-control @error('second_title') is-invalid @enderror"
                                    name="second_title" id="second_title"
                                    value="{{ old('second_title', $About_second_section->second_title ?? '') }}">
                                {{-- Error message for title --}}
                                @error('second_title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Subtitle --}}
                            <div class="mb-3">
                                <label for="second_subtitle" class="form-label">Subtitle</label>
                                <textarea class="form-control @error('second_subtitle') is-invalid @enderror" name="second_subtitle"
                                    id="second_subtitle" cols="10" rows="5">{{ old('second_subtitle', $About_second_section->second_subtitle ?? '') }}</textarea>

                                {{-- Error message for subtitle --}}
                                @error('second_subtitle')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Submit --}}
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <!--- Second Section Cards----->
            <div class="col-sm-6 col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3>Card Section</h3>
                    </div>
                    <div class="card-body">

                        {{-- Success Message for Second Section --}}
                        @if (session('success_card'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success_card') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Form --}}
                        <form action="{{ route('admin.about_second_section_card_post') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="icon" class="form-label">Icon</label>
                                <input type="text" class="form-control @error('icon') is-invalid @enderror"
                                    name="icon" id="icon" value="{{ old('icon') }}">
                                {{-- Error message for title --}}
                                @error('icon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Title --}}
                            <div class="mb-3">
                                <label for="card_title" class="form-label">Card Title</label>
                                <input type="text" class="form-control @error('card_title') is-invalid @enderror"
                                    name="card_title" id="card-title" value="{{ old('card_title') }}">
                                {{-- Error message for title --}}
                                @error('card_title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Subtitle --}}
                            <div class="mb-3">
                                <label for="card_description" class="form-label">Card Description</label>
                                <textarea class="form-control @error('card_description') is-invalid @enderror" name="card_description"
                                    id="card_description" cols="10" rows="5">{{ old('card_description') }}</textarea>

                                {{-- Error message for subtitle --}}
                                @error('card_description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Submit --}}
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse($about_card as $card)
                <div class="col-lg-4 col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.about_card_update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="card_id" value="{{ $card->id }}">
                                <div class="mb-3">
                                    <label class="form-label">Icon</label>
                                    <input type="text" name="icon" class="form-control"
                                        value="{{ $card->icon }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Card Title</label>
                                    <input type="text" name="card_title" class="form-control"
                                        value="{{ $card->card_title }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Card Description</label>
                                    {{-- <input type="text" name="card_title" class="form-control" value="{{ $card->card_title }}"> --}}
                                    <textarea name="card_description" class="form-control" id="" cols="30" rows="10">{{ $card->card_description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary">Update</button>


                            </form>
                            <a href="{{ route('admin.about_card_delete', $card->id) }}" class="btn btn-danger">Delete</a>
                        </div>

                    </div>
                </div>
        </div>
    @empty
        @endforelse
    </div>

    <!---third section cards ----->

    <div class="row">
        <div class="col-sm-6 col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Third Section</h3>
                </div>
                <div class="card-body">

                    {{-- Success Message for Second Section --}}
                    @if (session('success_third'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success_third') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- Form --}}
                    <form action="{{ route('admin.about_third_section_post') }}" method="POST">
                        @csrf

                        {{-- Title --}}
                        <div class="mb-3">
                            <label for="third_title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('third_title') is-invalid @enderror"
                                name="third_title" id="card-third_title"
                                value="{{ $about_third_section->third_title ?? '' }}">
                            {{-- Error message for title --}}
                            @error('third_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Subtitle --}}
                        <div class="mb-3">
                            <label for="third_subtitle" class="form-label">Subtitle</label>
                            <textarea class="form-control @error('third_subtitle') is-invalid @enderror" name="third_subtitle"
                                id="third_subtitle" cols="10" rows="5">{{ $about_third_section->third_subtitle ?? '' }}</textarea>

                            {{-- Error message for subtitle --}}
                            @error('third_subtitle')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Submit --}}
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!--third section cards-->
    <div class="row">
        <!--- Second Section Cards----->
        <div class="col-sm-6 col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Third Section Cards</h3>
                </div>
                <div class="card-body">

                    {{-- Success Message for Second Section --}}
                    @if (session('success_third_card'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success_third_card') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- Form --}}
                    <form action="{{ route('admin.about_third_section_card_post') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="third_icon" class="form-label">Icon</label>
                            <input type="text" class="form-control @error('third_icon') is-invalid @enderror"
                                name="third_icon" id="icon" value="{{ old('third_icon') }}">
                            {{-- Error message for title --}}
                            @error('icon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Title --}}
                        <div class="mb-3">
                            <label for="third_title" class="form-label">Third Title</label>
                            <input type="text" class="form-control @error('third_title') is-invalid @enderror"
                                name="third_title" id="card-title" value="{{ old('third_title') }}">
                            {{-- Error message for title --}}
                            @error('third_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Submit --}}
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Display third section cards -->
    <div class="row">
        @forelse($about_third_section_cards as $third_card)
            <div class="col-lg-4 col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.about_third_section_card_update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="card_id" value="{{ $third_card->id }}">
                            <div class="mb-3">
                                <label for="" class="form-label">Third Section Icon</label>
                                <input type="text" class="form-control" name="third_icon"
                                    value="{{ $third_card->third_icon }}">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Third Section Title</label>
                                <input type="text" class="form-control" name="third_title"
                                    value="{{ $third_card->third_title }}">
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary">Update</button>
                        </form>
                        <a href="{{ route('admin.about_third_section_card_delete', $third_card->id) }}"
                            class="btn btn-danger">Delete</a>
                    </div>

                </div>
            </div>
    </div>
    <!---About-Last Secion --->
    <div class="row">
        <div class="col-sm-6 col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3>About Last Section</h3>
                </div>
                <div class="card-body">

                    {{-- Success Message for Second Section --}}
                    @if (session('success_last'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success_last') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- Form --}}
                    <form action="{{ route('admin.about_last_section_post') }}" method="POST">
                        @csrf

                        {{-- Title --}}
                        <div class="mb-3">
                            <label for="last_title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('last_title') is-invalid @enderror"
                                name="last_title" id="card-third_title"
                                value="{{ $about_last_section->last_title ?? '' }}">
                            {{-- Error message for title --}}
                            @error('last_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Subtitle --}}
                        <div class="mb-3">
                            <label for="last_subtitle" class="form-label">Subtitle</label>
                            <textarea class="form-control @error('last_subtitle') is-invalid @enderror" name="last_subtitle" id="last_subtitle"
                                cols="10" rows="5">{{ $about_last_section->last_subtitle ?? '' }}</textarea>

                            {{-- Error message for subtitle --}}
                            @error('last_subtitle')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="last_link" class="form-label">Link</label>
                            <input type="text" class="form-control @error('last_link') is-invalid @enderror"
                                name="last_link" id="card-third_title"
                                value="{{ $about_last_section->last_link ?? '' }}">

                            {{-- Error message for subtitle --}}
                            @error('last_link')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Submit --}}
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@empty
    @endforelse

    </div>

    @section('scripts')
    @endsection
@endsection
