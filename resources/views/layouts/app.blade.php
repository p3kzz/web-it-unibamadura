<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('meta_description', 'Website resmi UPT TIK Universitas Bahaudin Mudhary Madura.')">
    <meta name="robots" content="index, follow">
    <meta name="author" content="UPT TIK UNIBA Madura">
    <meta property="og:title" content="@yield('title', 'UPT TIK - UNIBA Madura')">
    <meta property="og:description" content="@yield('meta_description', 'Informasi resmi, kegiatan, dan pengumuman terbaru dari UPT TIK Universitas Bahaudin Mudhary Madura.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('assets/img/logo-uniba.webp'))">
    <title>@yield('title', 'UPT TIK - UNIBA Madura')</title>
    <link rel="shortcut icon" href="{{ asset('images/logo/logo.webp') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body class="bg-gray-50 text-gray-800 antialiased" x-data="{ mobileOpen: false, devModalOpen: false }">

    @include('partials.navbar')

    @yield('content')

    @include('partials.footer')
    {{-- @include('partials.developer-modal') --}}

    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
    @stack('scripts')
</body>

</html>
