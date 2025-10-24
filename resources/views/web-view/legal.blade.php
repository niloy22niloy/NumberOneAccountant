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
                    <h2 class="section-title">Legal Documentation</h2>
                    <p class="section-subtitle">Access and download our comprehensive legal documents</p>
                </div>

                <div class="table-container">
                    <div class="table-responsive">
                        <table class="table custom-table">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">#</th>
                                    <th style="width: 40%;">Document Name</th>
                                    <th style="width: 15%;">Category</th>
                                    <th style="width: 15%;">Last Updated</th>
                                    <th style="width: 25%;" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-number">1.</td>
                                    <td>
                                        <div class="doc-info">
                                            <h6>Terms and Conditions</h6>
                                            <small>Review our latest terms outlining user responsibilities and platform
                                                usage guidelines.</small>
                                        </div>
                                    </td>
                                    <td>Contract</td>
                                    <td>July 2025</td>
                                    <td class="text-center">
                                        <a href="docs/terms.pdf" class="btn-action btn-view" target="_blank">
                                            <i class="fa fa-eye me-1"></i> View
                                        </a>
                                        <a href="docs/terms.pdf" download class="btn-action btn-download">
                                            <i class="fa fa-download me-1"></i> Download
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="col-number">2.</td>
                                    <td>
                                        <div class="doc-info">
                                            <h6>Privacy Policy</h6>
                                            <small>Learn how we protect, store, and use your personal data securely.</small>
                                        </div>
                                    </td>
                                    <td>Privacy</td>
                                    <td>March 2025</td>
                                    <td class="text-center">
                                        <a href="docs/privacy.pdf" class="btn-action btn-view" target="_blank">
                                            <i class="fa fa-eye me-1"></i> View
                                        </a>
                                        <a href="docs/privacy.pdf" download class="btn-action btn-download">
                                            <i class="fa fa-download me-1"></i> Download
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="col-number">3.</td>
                                    <td>
                                        <div class="doc-info">
                                            <h6>Data Processing Agreement</h6>
                                            <small>Understand how we handle data shared by users under GDPR
                                                compliance.</small>
                                        </div>
                                    </td>
                                    <td>Compliance</td>
                                    <td>January 2025</td>
                                    <td class="text-center">
                                        <a href="docs/dpa.pdf" class="btn-action btn-view" target="_blank">
                                            <i class="fa fa-eye me-1"></i> View
                                        </a>
                                        <a href="docs/dpa.pdf" download class="btn-action btn-download">
                                            <i class="fa fa-download me-1"></i> Download
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="col-number">4.</td>
                                    <td>
                                        <div class="doc-info">
                                            <h6>Cookie Policy</h6>
                                            <small>Details on how cookies are used to improve your browsing
                                                experience.</small>
                                        </div>
                                    </td>
                                    <td>Policy</td>
                                    <td>May 2025</td>
                                    <td class="text-center">
                                        <a href="docs/cookie.pdf" class="btn-action btn-view" target="_blank">
                                            <i class="fa fa-eye me-1"></i> View
                                        </a>
                                        <a href="docs/cookie.pdf" download class="btn-action btn-download">
                                            <i class="fa fa-download me-1"></i> Download
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-number">5.</td>
                                    <td>
                                        <div class="doc-info">
                                            <h6>End-User License Agreement</h6>
                                            <small>Legal agreement between the end-user and the software vendor.</small>
                                        </div>
                                    </td>
                                    <td>Agreement</td>
                                    <td>Feb 2024</td>
                                    <td class="text-center">
                                        <a href="docs/eula.pdf" class="btn-action btn-view" target="_blank">
                                            <i class="fa fa-eye me-1"></i> View
                                        </a>
                                        <a href="docs/eula.pdf" download class="btn-action btn-download">
                                            <i class="fa fa-download me-1"></i> Download
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <p class="text-muted">
                        <i class="fa-solid fa-circle-info me-2"></i>
                        For questions regarding our legal documents, please <a href="#"
                            class="text-primary text-decoration-none fw-bold">contact our legal team</a>
                    </p>
                </div>
            </div>
        </section>
    </section>
@endsection
