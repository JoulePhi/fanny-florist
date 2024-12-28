@extends('layouts.app')


@section('content')
    {{-- Hero Section --}}
    {{-- <section class="relative h-[80vh]">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/hero.jpg') }}')">
            <div class="absolute inset-0 bg-black/50"></div>
        </div>
        <div class="relative container mx-auto px-4 h-full flex items-center">
            <div class="max-w-2xl text-white">
                <h1 class="text-5xl font-bold mb-4"></h1>
                <p class="text-xl mb-8"></p>
                
            </div>
        </div>
    </section> --}}


    {{-- <section class="bg-center bg-no-repeat bg-hero bg-gray-700 bg-blend-multiply bg-cover">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                {{ config('site_settings.hero_title') }}</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">
                {{ config('site_settings.hero_subtitle') }}</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="{{ route('catalog') }}"
                    class="bg-emerald-600 font-bold hover:bg-emerald-500 text-white px-8 py-3 rounded-lg">
                    Pesan Sekarang
                </a>
            </div>
        </div>
    </section> --}}

    <div class="relative h-screen w-full overflow-hidden">
        <!-- Floating Flower Elements (Decorative) -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="flower-petal animate-float-1 absolute top-10 left-[10%]">
                <div class="w-8 h-8 bg-pink-200 rounded-full opacity-60"></div>
            </div>
            <div class="flower-petal animate-float-2 absolute top-20 right-[15%]">
                <div class="w-6 h-6 bg-rose-300 rounded-full opacity-50"></div>
            </div>
            <div class="flower-petal animate-float-3 absolute bottom-40 left-[20%]">
                <div class="w-10 h-10 bg-purple-200 rounded-full opacity-40"></div>
            </div>
        </div>

        <!-- Main Background -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-hero bg-cover bg-center bg-fixed blur-[2px]">
            </div>
            <div class="absolute inset-0 bg-gradient-to-b from-white/60 to-white/80 backdrop-blur-sm"></div>
        </div>

        <!-- Content Container -->
        <div class="relative h-full flex flex-col items-center justify-center px-4 sm:px-6 lg:px-8 text-center">
            <!-- Decorative Element -->
            <div class="mb-6">
                <img src="{{ asset('images/sakura-icon.png') }}" class="h-32 object-contain" alt="Logo Sakura">
            </div>

            <h1 class="text-4xl sm:text-5xl md:text-6xl  text-rose-800 mb-4 animate-fade-in-down">
                {{ config('site_settings.hero_title') }}
            </h1>

            <h2 class="text-xl sm:text-2xl md:text-3xl text-rose-600 font-light mb-8 max-w-3xl mx-auto animate-fade-in-up">
                {{ config('site_settings.hero_subtitle') }}
            </h2>

            <!-- CTA Buttons -->
            <div class="space-x-4">
                <a href="https://wa.me/{{ config('site_settings.whatsapp_number') }}"
                    class="px-8 py-4 bg-gradient-to-r from-rose-400 to-pink-500 text-white font-medium rounded-full
        transform transition duration-300 ease-in-out hover:scale-105 hover:shadow-lg
        focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-opacity-50">
                    Pesan Sekarang!
                </a>

                {{-- <a href="{{ route('catalog') }}"
                    class="px-8 py-4 bg-white/80 text-rose-600 font-medium rounded-full border-2 border-rose-400
        transform transition duration-300 ease-in-out hover:bg-rose-50 hover:shadow-lg
        focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-opacity-50">
                    Lihat Produk
                </a> --}}
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto max-w-screen-xl px-4 sm:px-6">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Mengapa Memilih Kami?
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Kami memberikan pelayanan terbaik untuk kepuasan pelanggan
                </p>
            </div>

            <!-- Features Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Feature 1 - Free Shipping -->
                @foreach ($features as $feature)
                    <x-feature-card :feature="$feature" />
                @endforeach


            </div>

            {{-- <!-- Additional Features List -->
            <div class="mt-12 max-w-3xl mx-auto">
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <li class="flex items-center space-x-3">
                        <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-gray-600">Pembayaran Aman & Terpercaya</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-gray-600">Layanan Pelanggan 24/7</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-gray-600">Produk Original 100%</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-gray-600">Reward Points Setiap Pembelian</span>
                    </li>
                </ul>
            </div> --}}
        </div>
    </section>


    {{-- Featured Products --}}
    <section class="py-8 sm:py-12 md:py-16">
        <div class="container mx-auto max-w-screen-xl px-4 sm:px-6">
            <header class="text-center mb-8 sm:mb-12">
                <h2 class="text-2xl sm:text-3xl font-bold mb-3">Bunga Pilihan Terbaik</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Temukan bunga pilihan terbaik kami untuk setiap kesempatan spesial Anda
                </p>
            </header>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
                @foreach ($featuredProducts as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </section>


    {{-- Categories --}}
    <section class="py-8 sm:py-12 md:py-16 bg-gray-50">
        <div class="container mx-auto max-w-screen-xl px-4 sm:px-6">
            <!-- SEO-friendly header -->
            <header class="text-center mb-8 sm:mb-12">
                <h2 class="text-2xl sm:text-3xl font-bold mb-3">Koleksi Bunga untuk Setiap Momen</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Temukan berbagai kategori bunga segar untuk setiap kesempatan
                    spesial Anda - dari bunga wedding, wisuda, hingga duka cita.</p>
            </header>

            <!-- Categories Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 sm:gap-6">
                @foreach ($categories as $category)
                    <x-category-card :category="$category" />
                @endforeach
            </div>

            <!-- Call to Action -->
            <div class="text-center mt-8 sm:mt-12">
                <a href="{{ route('categories') }}"
                    class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700 transition-colors duration-300">
                    Lihat Semua Kategori
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- FAQ Header -->
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl mb-4">
                    Frequently Asked Questions
                </h2>
                <p class="text-lg text-gray-600">
                    Cari jawaban untuk pertanyaan umum tentang layanan kami
                </p>
            </div>

            <!-- FAQ Grid -->
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- FAQ Card 1 -->
                @foreach ($faqs as $faq)
                    <x-faq-card :faq="$faq" />
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl mb-4">
                    Apa Kata Pelanggan Kami?
                </h2>
                <p class="text-lg text-gray-600">
                    Baca testimoni pelanggan yang puas dengan layanan kami
                </p>
            </div>
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($testimonials as $testi)
                    <x-testi-card :testi="$testi" />
                @endforeach
            </div>
        </div>
    </section>







    {{-- WhatsApp Float Button --}}
    {{-- <div class="fixed bottom-8 right-8 z-50">
        <a href="https://wa.me/{{ config('site_settings.whatsapp_number') }}" target="_blank"
            class="bg-green-500 text-white p-4 rounded-full shadow-lg hover:bg-green-600 transition-colors">
            <x-icon-whatsapp class="w-6 h-6" />
        </a>
    </div> --}}
@endsection
