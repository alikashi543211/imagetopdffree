@extends('layout')

@section('meta')
    <title>Free Image to PDF Converter – Fast, Secure & No Signup | imagetopdffree.com</title>
    <meta name="description"
        content="Convert your images to PDF for free with imagetopdffree.com. No registration required. Fast, secure, and easy-to-use online image to PDF converter supporting JPG, PNG, and more.">
    <link rel="canonical" href="https://imagetopdffree.com/">
    <meta name="robots" content="index, follow">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://imagetopdffree.com/">
    <meta property="og:title" content="Free Image to PDF Converter – Fast, Secure & No Signup | imagetopdffree.com">
    <meta property="og:description"
        content="Convert your images to PDF for free with imagetopdffree.com. No registration required. Fast, secure, and easy-to-use online image to PDF converter supporting JPG, PNG, and more.">
    <meta property="og:image" content="https://imagetopdffree.com/favicon.svg">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="https://imagetopdffree.com/">
    <meta name="twitter:title" content="Free Image to PDF Converter – Fast, Secure & No Signup | imagetopdffree.com">
    <meta name="twitter:description"
        content="Convert your images to PDF for free with imagetopdffree.com. No registration required. Fast, secure, and easy-to-use online image to PDF converter supporting JPG, PNG, and more.">
    <meta name="twitter:image" content="https://imagetopdffree.com/favicon.svg">
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "name": "imagetopdffree.com",
      "url": "https://imagetopdffree.com/",
      "description": "Convert your images to PDF for free with imagetopdffree.com. No registration required. Fast, secure, and easy-to-use online image to PDF converter supporting JPG, PNG, and more.",
      "publisher": {
        "@type": "Organization",
        "name": "imagetopdffree.com",
        "url": "https://imagetopdffree.com/",
        "logo": {
          "@type": "ImageObject",
          "url": "https://imagetopdffree.com/favicon.svg"
        }
      },
      "potentialAction": {
        "@type": "SearchAction",
        "target": "https://imagetopdffree.com/?q={search_term_string}",
        "query-input": "required name=search_term_string"
      }
    }
    </script>
@endsection

@section('content')
    <section class="mb-5 home-hero">
        <div class="container py-5 text-center">
            <div class="mb-3">
                <i class="fa-solid fa-file-pdf fa-3x" style="color:#dc3545;"></i>
            </div>
            <h1 class="mb-3 display-4 fw-bold" style="color:#007bff; letter-spacing:1px;">Free Online Image to PDF Converter
            </h1>
            <p class="mb-4 lead" style="color:#333; font-size:1.35rem;">Convert your images to PDF instantly. No
                registration,
                no watermark, always free.<br>Fast, secure, and easy to use.</p>
            <div class="flex-wrap gap-3 d-flex justify-content-center">
                <span class="badge rounded-pill bg-primary fs-6">No Signup</span>
                <span class="badge rounded-pill bg-success fs-6">100% Free</span>
                <span class="badge rounded-pill bg-warning text-dark fs-6">No Watermark</span>
                <span class="badge rounded-pill bg-info text-dark fs-6">Secure &amp; Private</span>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="mx-auto col-md-8">
            <div id="converterCard" class="shadow card">
                <div id="converterHeading" class="text-white card-header bg-primary">
                    <h4 class="mb-0">Convert Images to PDF</h4>
                </div>
                <div class="card-body">
                    <form id="pdfForm" action="{{ route('convert.to.pdf') }}" method="POST" enctype="multipart/form-data"
                        autocomplete="off">
                        @csrf

                        <div class="mb-3">
                            <label for="images" class="form-label">Select Images</label>
                            <div id="dropzone" class="p-4 mb-2 text-center dropzone" tabindex="0"
                                aria-label="Image dropzone">
                                <span class="text-muted">Drag & drop images here or click to select</span>
                                <input type="file" class="form-control d-none" id="images" name="images[]" multiple
                                    accept="image/*" aria-label="Select images">
                            </div>
                            <div class="form-text">You can select or drag multiple images. Reorder by dragging thumbnails.
                            </div>
                        </div>

                        <div id="imagePreview" class="mb-3 row g-2"></div>

                        <div class="mb-3">
                            <label for="pdfName" class="form-label">PDF File Name</label>
                            <input type="text" class="form-control" id="pdfName" name="pdf_name"
                                value="converted_images" aria-label="PDF file name">
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="pageSize" class="form-label">Page Size</label>
                                <select class="form-select" id="pageSize" name="page_size" aria-label="Page size">
                                    <option value="a4">A4</option>
                                    <option value="letter">Letter</option>
                                    <option value="legal">Legal</option>
                                    <option value="a3">A3</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="orientation" class="form-label">Orientation</label>
                                <select class="form-select" id="orientation" name="orientation" aria-label="Orientation">
                                    <option value="portrait">Portrait</option>
                                    <option value="landscape">Landscape</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="margin" class="form-label">Margin (mm)</label>
                                <input type="number" class="form-control" id="margin" name="margin" value="0"
                                    min="0" max="50" aria-label="Margin">
                            </div>
                            <div class="col-md-6">
                                <label for="border" class="form-label">Border (px)</label>
                                <input type="number" class="form-control" id="border" name="border" value="0"
                                    min="0" max="20" aria-label="Border">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image Layout</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="layout" id="layoutSingle"
                                    value="single" checked>
                                <label class="form-check-label" for="layoutSingle">Single Image Per Page</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="layout" id="layoutDouble"
                                    value="double">
                                <label class="form-check-label" for="layoutDouble">Two Images Per Page (Side by
                                    Side)</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="compress" name="compress">
                                <label class="form-check-label" for="compress">Compress PDF</label>
                            </div>
                        </div>

                        <div id="alertArea" class="alert alert-danger d-none" role="alert"></div>
                        <div class="mb-3 progress d-none" id="uploadProgress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                style="width: 0%" id="progressBar"></div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100" id="convertBtn">
                            <span id="btnText">Convert to PDF</span>
                            <span id="btnSpinner" class="spinner-border spinner-border-sm d-none" role="status"></span>
                        </button>
                    </form>
                </div>
            </div>

            <div class="mt-4 d-none" id="downloadCard">
                <div class="border-2 shadow-lg card border-success">
                    <div class="py-5 text-center card-body">
                        <div class="mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="mb-2 text-success">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"
                                    fill="#d4edda" />
                                <path stroke="#28a745" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 12l2.5 2.5L16 9" />
                            </svg>
                        </div>
                        <h3 class="mb-2 card-title text-success fw-bold">PDF Ready!</h3>
                        <p class="mb-4 card-text">Your PDF has been generated successfully.<br>Click below to download your
                            file or start a new conversion.</p>
                        <div class="gap-2 d-grid d-sm-flex justify-content-sm-center">
                            <a href="#" class="px-4 btn btn-success btn-lg me-sm-3" id="downloadLink">
                                <i class="bi bi-download me-2"></i>Download PDF
                            </a>
                            <button class="px-4 btn btn-outline-secondary btn-lg" id="newConversion">
                                <i class="bi bi-arrow-left me-2"></i>Back to Converter
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/converter.js') }}"></script>
@endpush
