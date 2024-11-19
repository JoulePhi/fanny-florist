@extends('layouts.app')


@section('seo_scheme')
    @if (isset($seo['schema']))
        <script type="application/ld+json">
            {!! json_encode($seo['schema']) !!}
        </script>
    @endif
@endsection
@section('content')
    <div class="container mx-auto py-8 max-w-screen-xl">
        <x-schema-breadcrumbs :items="$breadcrumbs" />

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            {{-- Product Images --}}
            <div class="relative">
                <div class="aspect-w-1 aspect-h-1 bg-gray-100 rounded-lg overflow-hidden">
                    <img src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->name }}"
                        class="w-full h-full object-cover">
                </div>
                @if (count($product->images) > 1)
                    <div class="grid grid-cols-4 gap-4 mt-4">
                        @foreach (array_slice($product->images, 1) as $image)
                            <div class="aspect-w-1 aspect-h-1 bg-gray-100 rounded-lg overflow-hidden">
                                <img src="{{ $image }}" alt="{{ $product->name }}"
                                    class="w-full h-full object-cover cursor-pointer">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Product Info --}}
            <div>
                <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
                <div class="text-2xl text-primary font-bold mb-6">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </div>
                <div class="prose max-w-none mb-8">
                    {!! $product->description !!}
                </div>

                <a href="https://wa.me/{{ config('site_settings.whatsapp_number') }}?text=Hi, I'm interested in {{ $product->name }}"
                    target="_blank"
                    class="inline-flex items-center bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 transition-colors">
                    <x-icon-whatsapp class="w-5 h-5 mr-2" />
                    Order via WhatsApp
                </a>
            </div>
        </div>

        {{-- Related Products --}}
        @if ($relatedProducts->isNotEmpty())
            <div class="mt-16">
                <h2 class="text-2xl font-bold mb-6">Produk yang mungkin anda sukai</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($relatedProducts as $related)
                        <x-product-card :product="$related" />
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
