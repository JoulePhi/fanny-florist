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
    {{-- Navigation --}}

    <nav class="bg-gradient-to-r from-rose-100 to-pink-100 shadow-md">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <!-- Logo and Brand Name -->
                <div class="flex items-center">
                    <span class="text-2xl text-rose-600">🌸</span>
                    <a href="#" class="ml-2 font-serif text-xl text-rose-700 hover:text-rose-600">Sakura
                        Florist</a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#"
                        class="text-rose-700 hover:text-rose-600 font-medium transition-colors duration-200">Home</a>
                    <a href="#"
                        class="text-rose-700 hover:text-rose-600 font-medium transition-colors duration-200">Shop</a>
                    <a href="#"
                        class="text-rose-700 hover:text-rose-600 font-medium transition-colors duration-200">Collections</a>
                    <a href="#"
                        class="text-rose-700 hover:text-rose-600 font-medium transition-colors duration-200">About</a>
                    <a href="#"
                        class="text-rose-700 hover:text-rose-600 font-medium transition-colors duration-200">Contact</a>
                </div>

                <!-- Shopping Cart -->
                <div class="hidden md:flex items-center space-x-4">
                    <button class="text-rose-700 hover:text-rose-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </button>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-rose-700 hover:text-rose-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden pb-4">
                <div class="flex flex-col space-y-4">
                    <a href="#" class="text-rose-700 hover:text-rose-600 font-medium">Home</a>
                    <a href="#" class="text-rose-700 hover:text-rose-600 font-medium">Shop</a>
                    <a href="#" class="text-rose-700 hover:text-rose-600 font-medium">Collections</a>
                    <a href="#" class="text-rose-700 hover:text-rose-600 font-medium">About</a>
                    <a href="#" class="text-rose-700 hover:text-rose-600 font-medium">Contact</a>
                    <a href="#" class="text-rose-700 hover:text-rose-600 font-medium">Cart</a>
                </div>
            </div>
        </div>
    </nav>



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
