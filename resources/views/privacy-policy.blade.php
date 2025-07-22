@extends('layout')
@section('meta')
    <title>Privacy Policy | imagetopdffree.com</title>
    <meta name="description"
        content="Read the privacy policy for imagetopdffree.com. Learn how we protect your data and respect your privacy when you use our free image to PDF converter.">
    <link rel="canonical" href="https://imagetopdffree.com/privacy-policy">
    <meta name="robots" content="index, follow">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://imagetopdffree.com/privacy-policy">
    <meta property="og:title" content="Privacy Policy | imagetopdffree.com">
    <meta property="og:description"
        content="Read the privacy policy for imagetopdffree.com. Learn how we protect your data and respect your privacy when you use our free image to PDF converter.">
    <meta property="og:image" content="https://imagetopdffree.com/favicon.svg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="https://imagetopdffree.com/privacy-policy">
    <meta name="twitter:title" content="Privacy Policy | imagetopdffree.com">
    <meta name="twitter:description"
        content="Read the privacy policy for imagetopdffree.com. Learn how we protect your data and respect your privacy when you use our free image to PDF converter.">
    <meta name="twitter:image" content="https://imagetopdffree.com/favicon.svg">
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebPage",
      "name": "Privacy Policy | imagetopdffree.com",
      "url": "https://imagetopdffree.com/privacy-policy",
      "description": "Read the privacy policy for imagetopdffree.com. Learn how we protect your data and respect your privacy when you use our free image to PDF converter.",
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
                        <i class="mb-3 fa-solid fa-shield-halved fa-3x text-success"></i>
                        <h1 class="mb-2 display-6 fw-bold">Privacy Policy</h1>
                        <p class="lead text-muted">Your privacy matters at imagetopdffree.com</p>
                    </div>
                    <hr>
                    <h2 class="mt-4 h5">Information We Collect</h2>
                    <ul>
                        <li><strong>Uploaded Images:</strong> Images you upload are used solely for the purpose of
                            converting to PDF. We do not store your files after conversion.</li>
                        <li><strong>Usage Data:</strong> We may collect anonymous usage data (such as browser type, device,
                            and access times) to improve our service.</li>
                    </ul>
                    <hr>
                    <h2 class="mt-4 h5">How We Use Your Information</h2>
                    <ul>
                        <li>To provide and improve our image to PDF conversion service.</li>
                        <li>To analyze usage and enhance user experience.</li>
                    </ul>
                    <hr>
                    <h2 class="mt-4 h5">Third-Party Services</h2>
                    <p>We may use third-party analytics and advertising services (such as Google AdSense) that may collect
                        information in accordance with their own privacy policies.</p>
                    <hr>
                    <h2 class="mt-4 h5">Cookies</h2>
                    <p>We use cookies to enhance your experience. You can disable cookies in your browser settings.</p>
                    <hr>
                    <h2 class="mt-4 h5">Data Security</h2>
                    <p>We implement reasonable security measures to protect your data. However, no method of transmission
                        over the Internet is 100% secure.</p>
                    <hr>
                    <h2 class="mt-4 h5">Children's Privacy</h2>
                    <p>Our service is not intended for children under 13. We do not knowingly collect personal information
                        from children.</p>
                    <hr>
                    <h2 class="mt-4 h5">Changes to This Policy</h2>
                    <p>We may update this Privacy Policy from time to time. Changes will be posted on this page.</p>
                    <hr>
                    <h2 class="mt-4 h5">Contact Us</h2>
                    <p>If you have any questions about this Privacy Policy, please <a href="{{ route('contact') }}">contact
                            us</a>.</p>
                    <p class="mt-4 mb-0 text-muted">Last updated: {{ date('F Y') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
