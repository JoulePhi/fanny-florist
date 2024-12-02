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
                <svg class="w-16 h-16 text-rose-400 mx-auto" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M12,2C17.52,2 22,6.48 22,12C22,17.52 17.52,22 12,22C6.48,22 2,17.52 2,12C2,6.48 6.48,2 12,2M12,4C7.58,4 4,7.58 4,12C4,16.42 7.58,20 12,20C16.42,20 20,16.42 20,12C20,7.58 16.42,4 12,4M12,6C15.31,6 18,8.69 18,12C18,15.31 15.31,18 12,18C8.69,18 6,15.31 6,12C6,8.69 8.69,6 12,6M12,8C9.79,8 8,9.79 8,12C8,14.21 9.79,16 12,16C14.21,16 16,14.21 16,12C16,9.79 14.21,8 12,8Z" />
                </svg>
            </div>

            <h1 class="text-4xl sm:text-5xl md:text-6xl font-serif text-rose-800 mb-4 animate-fade-in-down">
                Blooming Beauty
            </h1>

            <h2 class="text-xl sm:text-2xl md:text-3xl text-rose-600 font-light mb-8 max-w-3xl mx-auto animate-fade-in-up">
                Handcrafted bouquets that tell your story with nature's finest blooms
            </h2>

            <!-- CTA Buttons -->
            <div class="space-x-4">
                <button
                    class="px-8 py-4 bg-gradient-to-r from-rose-400 to-pink-500 text-white font-medium rounded-full
        transform transition duration-300 ease-in-out hover:scale-105 hover:shadow-lg
        focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-opacity-50">
                    Shop Bouquets
                </button>

                <button
                    class="px-8 py-4 bg-white/80 text-rose-600 font-medium rounded-full border-2 border-rose-400
        transform transition duration-300 ease-in-out hover:bg-rose-50 hover:shadow-lg
        focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-opacity-50">
                    Custom Order
                </button>
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
                <article
                    class="flex flex-col items-center text-center p-6 bg-gray-50 rounded-xl hover:shadow-lg transition-shadow duration-300">
                    <!-- Icon Container -->
                    <div class="w-16 h-16 flex items-center justify-center bg-blue-100 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <!-- Feature Title -->
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">
                        Gratis Ongkir
                    </h3>
                    <!-- Feature Description -->
                    <p class="text-gray-600">
                        Nikmati gratis ongkir ke seluruh Indonesia untuk setiap pembelian minimal Rp500.000
                    </p>
                </article>

                <!-- Feature 2 - Fast Service -->
                <article
                    class="flex flex-col items-center text-center p-6 bg-gray-50 rounded-xl hover:shadow-lg transition-shadow duration-300">
                    <div class="w-16 h-16 flex items-center justify-center bg-green-100 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">
                        Pengerjaan Cepat
                    </h3>
                    <p class="text-gray-600">
                        Proses pengerjaan cepat dan tepat waktu dengan hasil berkualitas
                    </p>
                </article>

                <!-- Feature 3 - Free Consultation -->
                <article
                    class="flex flex-col items-center text-center p-6 bg-gray-50 rounded-xl hover:shadow-lg transition-shadow duration-300">
                    <div class="w-16 h-16 flex items-center justify-center bg-purple-100 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-purple-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">
                        Konsultasi Gratis
                    </h3>
                    <p class="text-gray-600">
                        Dapatkan konsultasi gratis dari tim ahli kami untuk hasil terbaik
                    </p>
                </article>

                <!-- Feature 4 - Quality Guarantee -->
                <article
                    class="flex flex-col items-center text-center p-6 bg-gray-50 rounded-xl hover:shadow-lg transition-shadow duration-300">
                    <div class="w-16 h-16 flex items-center justify-center bg-yellow-100 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-yellow-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">
                        Garansi Kualitas
                    </h3>
                    <p class="text-gray-600">
                        Kami memberikan garansi untuk setiap produk dan layanan kami
                    </p>
                </article>
            </div>

            <!-- Additional Features List -->
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
            </div>
        </div>
    </section>


    {{-- Featured Products --}}
    <section class="py-8 sm:py-12 md:py-16">
        <div class="container mx-auto max-w-screen-xl px-4 sm:px-6">
            <h2 class="text-2xl sm:text-3xl font-bold mb-6 sm:mb-8">Bunga Pilihan Terbaik</h2>
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
                <a href=""
                    class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700 transition-colors duration-300">
                    Lihat Semua Kategori
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20"
                        fill="currentColor">
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
                    Find answers to common questions about our services
                </p>
            </div>

            <!-- FAQ Grid -->
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- FAQ Item 1 -->
                <article class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">
                        How do I get started?
                    </h3>
                    <p class="text-gray-600">
                        Getting started is easy! Simply sign up for an account and follow our quick onboarding process. Our
                        team will guide you through each step.
                    </p>
                </article>

                <!-- FAQ Item 2 -->
                <article class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">
                        What payment methods do you accept?
                    </h3>
                    <p class="text-gray-600">
                        We accept all major credit cards, PayPal, and bank transfers. All payments are processed securely
                        through our payment gateway.
                    </p>
                </article>

                <!-- FAQ Item 3 -->
                <article class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">
                        Can I cancel my subscription?
                    </h3>
                    <p class="text-gray-600">
                        Yes, you can cancel your subscription at any time. There are no long-term contracts or cancellation
                        fees.
                    </p>
                </article>

                <!-- Add more FAQ items as needed -->
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl mb-4">
                    What Our Clients Say
                </h2>
                <p class="text-lg text-gray-600">
                    Trusted by thousands of satisfied customers worldwide
                </p>
            </div>

            <!-- Testimonials Grid -->
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- Testimonial Card 1 -->
                <article class="bg-white rounded-lg shadow-sm p-8 relative">
                    <!-- Quote Icon -->
                    <div class="absolute top-4 right-4">
                        <svg class="w-8 h-8 text-indigo-200" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.999v10h-9.999z" />
                        </svg>
                    </div>

                    <!-- Testimonial Content -->
                    <div class="mb-6">
                        <p class="text-gray-600 italic">
                            "The service exceeded my expectations. The team was professional, responsive, and delivered
                            outstanding results. I couldn't be happier with the outcome."
                        </p>
                    </div>

                    <!-- Author Info -->
                    <div class="flex items-center">
                        <div class="h-12 w-12 rounded-full bg-gray-300">
                            <!-- Replace with actual image -->
                            <img src="https://picsum.photos/200" alt="Profile photo of Sarah Johnson"
                                class="h-full w-full object-cover rounded-full">
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-900">Sarah Johnson</h3>
                            <p class="text-gray-600">CEO, TechCorp</p>
                        </div>
                    </div>
                </article>

                <!-- Testimonial Card 2 -->
                <article class="bg-white rounded-lg shadow-sm p-8 relative">
                    <div class="absolute top-4 right-4">
                        <svg class="w-8 h-8 text-indigo-200" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.999v10h-9.999z" />
                        </svg>
                    </div>
                    <div class="mb-6">
                        <p class="text-gray-600 italic">
                            "Working with this team has transformed our business. Their innovative solutions and dedication
                            to customer success are unmatched in the industry."
                        </p>
                    </div>
                    <div class="flex items-center">
                        <div class="h-12 w-12 rounded-full bg-gray-300">
                            <img src="https://picsum.photos/200" alt="Profile photo of Michael Chen"
                                class="h-full w-full object-cover rounded-full">
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-900">Michael Chen</h3>
                            <p class="text-gray-600">Founder, Innovation Labs</p>
                        </div>
                    </div>
                </article>

                <!-- Testimonial Card 3 -->
                <article class="bg-white rounded-lg shadow-sm p-8 relative">
                    <div class="absolute top-4 right-4">
                        <svg class="w-8 h-8 text-indigo-200" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.999v10h-9.999z" />
                        </svg>
                    </div>
                    <div class="mb-6">
                        <p class="text-gray-600 italic">
                            "The attention to detail and level of support we received was remarkable. They truly understand
                            customer needs and deliver solutions that work."
                        </p>
                    </div>
                    <div class="flex items-center">
                        <div class="h-12 w-12 rounded-full bg-gray-300">
                            <img src="https://picsum.photos/200" alt="Profile photo of Emily Martinez"
                                class="h-full w-full object-cover rounded-full">
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-900">Emily Martinez</h3>
                            <p class="text-gray-600">Marketing Director, Growth Co</p>
                        </div>
                    </div>
                </article>
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
