@extends('layout')
@section('meta')
    <title>Contact Us | imagetopdffree.com</title>
    <meta name="description"
        content="Contact imagetopdffree.com for support, feedback, or business inquiries. We are here to help you with our free image to PDF converter.">
    <link rel="canonical" href="https://imagetopdffree.com/contact">
    <meta name="robots" content="index, follow">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://imagetopdffree.com/contact">
    <meta property="og:title" content="Contact Us | imagetopdffree.com">
    <meta property="og:description"
        content="Contact imagetopdffree.com for support, feedback, or business inquiries. We are here to help you with our free image to PDF converter.">
    <meta property="og:image" content="https://imagetopdffree.com/favicon.svg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="https://imagetopdffree.com/contact">
    <meta name="twitter:title" content="Contact Us | imagetopdffree.com">
    <meta name="twitter:description"
        content="Contact imagetopdffree.com for support, feedback, or business inquiries. We are here to help you with our free image to PDF converter.">
    <meta name="twitter:image" content="https://imagetopdffree.com/favicon.svg">
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ContactPage",
      "name": "Contact Us | imagetopdffree.com",
      "url": "https://imagetopdffree.com/contact",
      "description": "Contact imagetopdffree.com for support, feedback, or business inquiries. We are here to help you with our free image to PDF converter.",
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
        <div class="col-md-8 col-lg-6">
            <div class="my-5 shadow-sm card">
                <div class="p-4 card-body">
                    <div class="mb-4 text-center">
                        <i class="fa-solid fa-envelope-circle-check fa-3x text-primary mb-3"></i>
                        <h1 class="mb-2 display-6 fw-bold">Contact Us</h1>
                        <p class="lead text-muted">We'd love to hear from you!</p>
                    </div>
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" disabled>Send Message (Demo Only)</button>
                    </form>
                    <p class="mt-4 mb-0 text-muted">We aim to respond to all inquiries within 2 business days.<br>Email: <a
                            href="mailto:info@imagetopdffree.com">info@imagetopdffree.com</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
