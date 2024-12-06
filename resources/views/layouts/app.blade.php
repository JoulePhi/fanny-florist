<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- SEO Meta Tags --}}
    <title>{{ $seo['title'] ?? config('app.name') }}</title>
    <meta name="description" content="{{ $seo['description'] ?? config('site.meta.default_description') }}">
    <meta name="keywords" content="{{ $seo['keywords'] ?? config('site.meta.default_keywords') }}">

    {{-- Open Graph Meta Tags --}}
    <meta property="og:title" content="{{ $seo['title'] ?? config('app.name') }}">
    <meta property="og:description" content="{{ $seo['description'] ?? config('site.meta.default_description') }}">
    <meta property="og:image" content="{{ $seo['image'] ?? asset(config('site.meta.default_image')) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    {{-- Twitter Card Meta Tags --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seo['title'] ?? config('app.name') }}">
    <meta name="twitter:description" content="{{ $seo['description'] ?? config('site.meta.default_description') }}">
    <meta name="twitter:image" content="{{ $seo['image'] ?? asset(config('site.meta.default_image')) }}">

    {{-- Canonical URL --}}
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Schema.org JSON-LD --}}

    @yield('seo_scheme')

    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Overpass:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    {{-- Styles --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    {{ view('layouts/navbar') }}
    <main>
        @yield('content')
    </main>
    {{-- WhatsApp Float Button --}}
    {{-- <div class="fixed bottom-8 right-8 z-50">
        <a href="https://wa.me/{{ config('site_settings.whatsapp_number') }}" target="_blank"
            class="bg-green-500 text-white p-4 rounded-full shadow-lg hover:bg-green-600 transition-colors">
            <x-icon-whatsapp class="w-6 h-6" />
        </a>
    </div> --}}
    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/{{ config('site_settings.whatsapp_number') }}"
        class="fixed z-50 bottom-8 right-8 bg-green-500 w-14 h-14 flex items-center justify-center rounded-full shadow-lg hover:bg-green-600 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 sm:w-16 sm:h-16">

        <x-icon-whatsapp />
    </a>

    <!-- Optional Tooltip (shows on hover) -->



    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>

    {{ view('layouts/footer') }}
</body>

</html>
