@extends('web-view.app')
@section('content')
    <section id="legal-view">
        <!-- <div class="container">
                        <div class="p-5 text-center border rounded-3 bg-light">
                            <h2 class="display-5 fw-bold text-primary-custom mb-3"> The Page Is Now on Development Process!!
                            </h2>
                        </div>
                    </div> -->

        <section class="legal-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">
                       {{$legal_document_content->main_title ?? " "}}
                    </h2>
                    <p class="section-subtitle">
                        {{$legal_document_content->short_title ?? " "}}
                    </p>
                </div>

                <div class="table-container">
                    <div class="table-responsive">
                        <table class="table custom-table">
                            <thead>
                                <tr>
                                    <th style="">#</th>
                                    <th style="">Document Name</th>
                                    <th style="">Category</th>

                                    <th style="">Type</th>
                                    <th style="">Date</th>
                                    <th style="" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @forelse($legal_documents as $key=>$document)

                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        <div class="doc-info">
                                            <h6>{{$document->title ?? ""}}</h6>
                                        </div>
                                    </td>
                                    <td>{{$document->category ?? " "}}</td>
                                    <td>{{$document->file_type ?? " "}}</td>
                                    <td>{{$document->created_at->format('D-M-Y') ?? " "}}</td>

                                    <td class="text-center">
                                        <a href="{{route('view',$document->id)}}" class="btn-action btn-view" target="_blank">
                                            <i class="fa fa-eye me-1"></i> View
                                        </a>
                                        <a href="{{route('download', $document->id)}}" download class="btn-action btn-download">
                                            <i class="fa fa-download me-1"></i> Download
                                        </a>
                                    </td>
                                </tr>
                                @empty

                                    @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- <div class="text-center mt-4">
                    <p class="text-muted">
                        <i class="fa-solid fa-circle-info me-2"></i>
                        For questions regarding our legal documents, please <a href="#"
                            class="text-primary text-decoration-none fw-bold">contact our legal team</a>
                    </p>
                </div> --}}
            </div>
        </section>
    </section>
@endsection
