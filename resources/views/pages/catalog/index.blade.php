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
        <div class="mb-8">
            <h1 class="text-4xl font-bold mb-4">Our Flower Collection</h1>
            <p class="text-gray-600">Browse our beautiful selection of fresh flowers and arrangements</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            {{-- Categories Sidebar --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold mb-4">Categories</h2>
                    <ul class="space-y-2">
                        @foreach ($categories as $cat)
                            <li>
                                <a href="{{ route('catalog.category', $cat->slug) }}"
                                    class="text-gray-600 hover:text-primary">
                                    {{ $cat->name }} ({{ $cat->products_count }})
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            {{-- Products Grid --}}
            <div class="lg:col-span-3">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($products as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>

                <div class="mt-8">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
