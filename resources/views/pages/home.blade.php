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


    <section class="bg-center bg-no-repeat bg-hero bg-gray-700 bg-blend-multiply bg-cover">
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
    </section>


    {{-- Featured Products --}}
    <section class="py-16 ">
        <div class="container mx-auto max-w-screen-xl">
            <h2 class="text-3xl font-bold mb-8">Featured Flowers</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($featuredProducts as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </section>

    {{-- Categories --}}
    <section class="py-16 bg-gray-50 ">
        <div class="container mx-auto  max-w-screen-xl">
            <h2 class="text-3xl font-bold mb-8">Browse Categories</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($categories as $category)
                    <x-category-card :category="$category" />
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
