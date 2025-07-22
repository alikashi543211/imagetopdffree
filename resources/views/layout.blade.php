<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="google-adsense-account" content="ca-pub-7222806549951885">
    <meta name="google-site-verification" content="w1xadXknw0IlomVJN1WtDJKHAD0o8I3lPw7f7LSudCA" />
    @yield('meta')

    @if (!View::hasSection('meta'))
        <title>Free Image to PDF Converter – Fast, Secure & No Signup | imagetopdffree.com</title>
        <meta name="description"
            content="Convert your images to PDF for free with imagetopdffree.com. No registration required. Fast, secure, and easy-to-use online image to PDF converter supporting JPG, PNG, and more.">
        <meta name="robots" content="index, follow">
        <link rel="canonical" href="https://imagetopdffree.com/">
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://imagetopdffree.com/">
        <meta property="og:title" content="Free Image to PDF Converter – Fast, Secure & No Signup | imagetopdffree.com">
        <meta property="og:description"
            content="Convert your images to PDF for free with imagetopdffree.com. No registration required. Fast, secure, and easy-to-use online image to PDF converter supporting JPG, PNG, and more.">
        <meta property="og:image" content="https://imagetopdffree.com/favicon.svg">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:url" content="https://imagetopdffree.com/">
        <meta name="twitter:title"
            content="Free Image to PDF Converter – Fast, Secure & No Signup | imagetopdffree.com">
        <meta name="twitter:description"
            content="Convert your images to PDF for free with imagetopdffree.com. No registration required. Fast, secure, and easy-to-use online image to PDF converter supporting JPG, PNG, and more.">
        <meta name="twitter:image" content="https://imagetopdffree.com/favicon.svg">
    @endif
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKB4Imkb9h6Y5Q5Q0siJmq9ki3V+1z5l5vlaQt1zArQXd1LSeXfhBF3X6/3u9P5AnbcW2k7Vw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <style>
        .navbar {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .navbar-nav .nav-link {
            font-size: 1.1rem;
            padding: 0.7rem 1.2rem;
            letter-spacing: 0.5px;
            color: #fff !important;
            transition: background 0.2s, color 0.2s, border-bottom 0.2s;
        }

        .navbar-nav .nav-link.active,
        .navbar-nav .nav-link:focus {
            font-weight: bold;
            color: #ffd700 !important;
            border-bottom: 2.5px solid #ffd700;
            background: rgba(0, 123, 255, 0.08);
        }

        .navbar-nav .nav-link:hover {
            color: #ffd700 !important;
            background: #f8f9fa;
            border-radius: 0.25rem;
        }

        .dropdown-menu {
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05);
        }

        .dropdown-item:active,
        .dropdown-item.active {
            background-color: #e9ecef;
            color: #007bff;
        }

        @media (max-width: 991.98px) {
            .navbar-nav .nav-link {
                padding: 0.7rem 1rem;
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/" style="font-size:1.7rem; letter-spacing:1px;">
                <i class="fa-solid fa-file-pdf me-2" style="color:#dc3545;"></i>
                <span style="color:#fff;">image</span><span style="color:#ffd700;">to</span><span
                    style="color:#fff;">pdf</span><span style="color:#28a745;">free</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('/') ? ' active' : '' }}" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('blog*') ? ' active' : '' }}"
                            href="{{ route('blog.index') }}">Blog</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Support & Legal
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item{{ request()->is('privacy-policy') ? ' active' : '' }}"
                                    href="{{ route('privacy.policy') }}">Privacy Policy</a></li>
                            <li><a class="dropdown-item{{ request()->is('terms') ? ' active' : '' }}"
                                    href="{{ route('terms') }}">Terms</a></li>
                            <li><a class="dropdown-item{{ request()->is('contact') ? ' active' : '' }}"
                                    href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container pb-5 mt-4" style="padding-bottom: 120px; min-height: 80vh;">
        @yield('content')
    </div>

    <footer class="py-4 mt-5 text-center shadow-sm bg-light border-top">
        <div class="container">
            <div class="mb-2">
                <i class="fa-solid fa-file-pdf me-2" style="color:#dc3545; font-size:1.5rem;"></i>
                <span style="color:#007bff; font-weight:bold; font-size:1.2rem;">image</span>to<span
                    style="color:#ffd700; font-weight:bold; font-size:1.2rem;">pdf</span><span
                    style="color:#28a745; font-weight:bold; font-size:1.2rem;">free</span>.com
            </div>
            <ul class="mb-2 list-inline">
                <li class="list-inline-item"><a href="/" class="text-decoration-none">Home</a></li>
                <li class="list-inline-item"><a href="{{ route('blog.index') }}"
                        class="text-decoration-none">Blog</a>
                </li>
                <li class="list-inline-item"><a href="{{ route('privacy.policy') }}"
                        class="text-decoration-none">Privacy Policy</a></li>
                <li class="list-inline-item"><a href="{{ route('terms') }}" class="text-decoration-none">Terms</a>
                </li>
                <li class="list-inline-item"><a href="{{ route('contact') }}"
                        class="text-decoration-none">Contact</a></li>
            </ul>
            <p class="mb-0 small text-muted">&copy; {{ date('Y') }} imagetopdffree.com. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
