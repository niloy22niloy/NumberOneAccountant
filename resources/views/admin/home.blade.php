@extends('admin.dashboard')

@section('content')
    <div class="containerfluid p-0">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>First-Section/ </strong> Hero-Section</h3>
        </div>

        <div class="row">
            <div class="col-sm-6 col-md-8 col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3>Hero Section Settings</h3>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <form action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Title (You can color words)</label>

                                @if (isset($hero->title))
                                    <textarea name="title" id="titleEditor" class="form-control" rows="10" cols="50">{!! $hero->title !!}</textarea>
                                @else
                                    <textarea name="title" id="titleEditor" class="form-control"></textarea>
                                @endif

                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Subtitle</label>
                                <input type="text" name="subtitle" class="form-control"
                                    value="{{ old('subtitle', $hero->subtitle ?? '') }}">
                                @error('subtitle')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="3">{{ old('description', $hero->description ?? '') }}</textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Button 1 Text</label>
                                    <input type="text" name="button1_text" class="form-control"
                                        value="{{ old('button1_text', $hero->button1_text ?? '') }}">
                                    @error('button1_text')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Button 1 Link</label>
                                    <input type="text" name="button1_link" class="form-control"
                                        value="{{ old('button1_link', $hero->button1_link ?? '') }}">
                                    @error('button1_link')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Button 2 Text</label>
                                    <input type="text" name="button2_text" class="form-control"
                                        value="{{ old('button2_text', $hero->button2_text ?? '') }}">
                                    @error('button2_text')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Button 2 Link</label>
                                    <input type="text" name="button2_link" class="form-control"
                                        value="{{ old('button2_link', $hero->button2_link ?? '') }}">
                                    @error('button2_link')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Hero Video</label>
                                <input type="file" name="video" class="form-control">
                                @error('video')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                @if (!empty($hero->video))
                                    <video width="300" controls class="mt-2">
                                        <source src="{{ asset($hero->video) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@section('scripts')
    <!-- 🧠 Initialize Summernote -->
    <script>
        $(document).ready(function() {
            var $editor = $('#titleEditor');

            $editor.summernote({
                height: 80,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['fontsize', 'fontname', 'color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['codeview']]
                ],
                fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '20', '24', '28', '32', '36',
                    '48', '72'
                ]
            });

            // After initialization, set the font dropdown based on first element's font
            var firstNode = $editor.summernote('code').trim();
            var temp = $('<div>').html(firstNode);
            var font = temp.find('*').first().css('font-family'); // get first element font-family

            if (font) {
                $editor.summernote('fontName', font);
            }
        });
    </script>
@endsection
@endsection
