@extends('layouts.app')

@section('seo_scheme')
    @if (isset($seo['schema']))
        <script type="application/ld+json">
            {!! json_encode($seo['schema']) !!}
        </script>
    @endif
@endsection

@section('content')
    <div class="container mx-auto px-4 py-4 sm:py-8 max-w-screen-xl">
        <x-schema-breadcrumbs :items="$breadcrumbs" />

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-12">
            {{-- Product Images --}}
            <div class="relative">
                <div class="aspect-w-1 aspect-h-1 bg-gray-100 rounded-lg overflow-hidden">
                    <img src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->name }}"
                        class="w-full h-full object-cover">
                </div>
                @if (count($product->images) > 1)
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 sm:gap-4 mt-2 sm:mt-4">
                        @foreach (array_slice($product->images, 1) as $image)
                            <div class="aspect-w-1 aspect-h-1 bg-gray-100 rounded-lg overflow-hidden">
                                <img src="{{ $image }}" alt="{{ $product->name }}"
                                    class="w-full h-full object-cover cursor-pointer hover:opacity-75 transition-opacity">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Product Info --}}
            <div class="px-0 md:px-4">
                <h1 class="text-2xl sm:text-3xl font-bold mb-3 sm:mb-4">{{ $product->name }}</h1>
                <div class="text-xl sm:text-2xl text-primary font-bold mb-4 sm:mb-6">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </div>
                <div class="prose prose-sm sm:prose max-w-none mb-6 sm:mb-8">
                    {!! $product->description !!}
                </div>

                <a href="https://wa.me/{{ config('site_settings.whatsapp_number') }}?text=Hi, Saya tertarik untuk membeli produk {{ $product->name }}  {{ route('catalog.product', [$category->slug, $product->slug]) }}"
                    target="_blank"
                    class="w-full sm:w-auto inline-flex items-center justify-center bg-green-500 text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg hover:bg-green-600 transition-colors">
                    <x-icon-whatsapp class="w-4 h-4 sm:w-5 sm:h-5 mr-2" />
                    <span class="font-bold ms-2 sm:ms-5">Order via WhatsApp</span>
                </a>
            </div>
        </div>

        {{-- Related Products --}}
        @if ($relatedProducts->isNotEmpty())
            <div class="mt-8 sm:mt-16">
                <h2 class="text-xl sm:text-2xl font-bold mb-4 sm:mb-6 px-0 md:px-4">
                    Produk yang mungkin anda sukai
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                    @foreach ($relatedProducts as $related)
                        <x-product-card :product="$related" />
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
