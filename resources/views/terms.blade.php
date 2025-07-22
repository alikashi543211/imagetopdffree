@extends('layout')
@section('meta')
    <title>Terms of Service | imagetopdffree.com</title>
    <meta name="description"
        content="Read the terms of service for imagetopdffree.com. Understand your rights and responsibilities when using our free image to PDF converter.">
    <link rel="canonical" href="https://imagetopdffree.com/terms">
    <meta name="robots" content="index, follow">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://imagetopdffree.com/terms">
    <meta property="og:title" content="Terms of Service | imagetopdffree.com">
    <meta property="og:description"
        content="Read the terms of service for imagetopdffree.com. Understand your rights and responsibilities when using our free image to PDF converter.">
    <meta property="og:image" content="https://imagetopdffree.com/favicon.svg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="https://imagetopdffree.com/terms">
    <meta name="twitter:title" content="Terms of Service | imagetopdffree.com">
    <meta name="twitter:description"
        content="Read the terms of service for imagetopdffree.com. Understand your rights and responsibilities when using our free image to PDF converter.">
    <meta name="twitter:image" content="https://imagetopdffree.com/favicon.svg">
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebPage",
      "name": "Terms of Service | imagetopdffree.com",
      "url": "https://imagetopdffree.com/terms",
      "description": "Read the terms of service for imagetopdffree.com. Understand your rights and responsibilities when using our free image to PDF converter.",
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
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="my-5 shadow-sm card">
                <div class="p-4 card-body">
                    <div class="mb-4 text-center">
                        <i class="mb-3 fa-solid fa-file-contract fa-3x text-primary"></i>
                        <h1 class="mb-2 display-6 fw-bold">Terms of Service</h1>
                        <p class="lead text-muted">Please read these terms before using imagetopdffree.com</p>
                    </div>
                    <hr>
                    <h2 class="mt-4 h5">Use of Service</h2>
                    <ul>
                        <li>You may use our service for lawful purposes only.</li>
                        <li>You are responsible for the content you upload and convert.</li>
                    </ul>
                    <hr>
                    <h2 class="mt-4 h5">Intellectual Property</h2>
                    <p>All content and software on imagetopdffree.com is the property of the site owner. You may not copy,
                        modify, or distribute any part of our service without permission.</p>
                    <hr>
                    <h2 class="mt-4 h5">Disclaimer</h2>
                    <p>Our service is provided "as is" without warranties of any kind. We do not guarantee the accuracy,
                        reliability, or availability of the service.</p>
                    <hr>
                    <h2 class="mt-4 h5">Limitation of Liability</h2>
                    <p>imagetopdffree.com is not liable for any damages arising from the use or inability to use our
                        service.</p>
                    <hr>
                    <h2 class="mt-4 h5">Third-Party Links</h2>
                    <p>Our website may contain links to third-party sites. We are not responsible for their content or
                        privacy practices.</p>
                    <hr>
                    <h2 class="mt-4 h5">Changes to Terms</h2>
                    <p>We may update these Terms of Service at any time. Changes will be posted on this page.</p>
                    <hr>
                    <h2 class="mt-4 h5">Contact</h2>
                    <p>If you have any questions about these Terms, please <a href="{{ route('contact') }}">contact us</a>.
                    </p>
                    <p class="mt-4 mb-0 text-muted">Last updated: {{ date('F Y') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
