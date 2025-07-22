@extends('layout')
@section('meta')
    <title>Help & Blog | imagetopdffree.com</title>
    <meta name="description"
        content="Find helpful guides, FAQs, and support articles for imagetopdffree.com. Learn how to convert images to PDF, troubleshoot issues, and more.">
    <link rel="canonical" href="https://imagetopdffree.com/blog">
    <meta name="robots" content="index, follow">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://imagetopdffree.com/blog">
    <meta property="og:title" content="Help & Blog | imagetopdffree.com">
    <meta property="og:description"
        content="Find helpful guides, FAQs, and support articles for imagetopdffree.com. Learn how to convert images to PDF, troubleshoot issues, and more.">
    <meta property="og:image" content="https://imagetopdffree.com/favicon.svg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="https://imagetopdffree.com/blog">
    <meta name="twitter:title" content="Help & Blog | imagetopdffree.com">
    <meta name="twitter:description"
        content="Find helpful guides, FAQs, and support articles for imagetopdffree.com. Learn how to convert images to PDF, troubleshoot issues, and more.">
    <meta name="twitter:image" content="https://imagetopdffree.com/favicon.svg">
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Blog",
      "name": "Help & Blog | imagetopdffree.com",
      "url": "https://imagetopdffree.com/blog",
      "description": "Find helpful guides, FAQs, and support articles for imagetopdffree.com. Learn how to convert images to PDF, troubleshoot issues, and more.",
      "publisher": {
        "@type": "Organization",
        "name": "imagetopdffree.com",
        "url": "https://imagetopdffree.com/",
        "logo": {
          "@type": "ImageObject",
          "url": "https://imagetopdffree.com/favicon.svg"
        }
      }
    }
    </script>
@endsection
@section('content')
    <div class="mb-5 blog-hero">
        <i class="fa-solid fa-circle-question"></i>
        <h1 class="mb-2">Help & Blog</h1>
        <p class="lead">Guides, FAQs, and support for imagetopdffree.com</p>
    </div>
    <div class="row g-4 justify-content-center">
        <div class="col-12 col-md-6 col-lg-4">
            <a href="{{ route('blog.how-to-convert-images') }}" class="text-decoration-none">
                <div class="blog-card card h-100 hover-shadow">
                    <div class="blog-accent"></div>
                    <div class="card-body">
                        <h2 class="mb-2 card-title">How to Convert Images to PDF</h2>
                        <p class="card-text">Step-by-step guide to using imagetopdffree.com.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <a href="{{ route('blog.faq') }}" class="text-decoration-none">
                <div class="blog-card card h-100 hover-shadow">
                    <div class="blog-accent"></div>
                    <div class="card-body">
                        <h2 class="mb-2 card-title">Frequently Asked Questions (FAQ)</h2>
                        <p class="card-text">Answers to common questions about our service.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <a href="{{ route('blog.troubleshooting') }}" class="text-decoration-none">
                <div class="blog-card card h-100 hover-shadow">
                    <div class="blog-accent"></div>
                    <div class="card-body">
                        <h2 class="mb-2 card-title">Troubleshooting: Common Issues</h2>
                        <p class="card-text">How to solve common problems with image to PDF conversion.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <a href="{{ route('blog.features') }}" class="text-decoration-none">
                <div class="blog-card card h-100 hover-shadow">
                    <div class="blog-accent"></div>
                    <div class="card-body">
                        <h2 class="mb-2 card-title">Features of imagetopdffree.com</h2>
                        <p class="card-text">Discover what makes our tool unique and useful.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <a href="{{ route('blog.about') }}" class="text-decoration-none">
                <div class="blog-card card h-100 hover-shadow">
                    <div class="blog-accent"></div>
                    <div class="card-body">
                        <h2 class="mb-2 card-title">About imagetopdffree.com</h2>
                        <p class="card-text">Learn about our mission and commitment to free, secure conversion.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
