<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'UPT TIK - UNIBA Madura')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 antialiased" x-data="{ mobileOpen: false, devModalOpen: false }">

    @include('partials.navbar')

    @yield('content')

    @include('partials.footer')
    @include('partials.developer-modal')

</body>
</html>
