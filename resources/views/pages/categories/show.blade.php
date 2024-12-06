@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        {{-- Breadcrumb --}}
        <nav class="flex mb-8 text-gray-600 text-sm">
            <a href="{{ url('/') }}" class="hover:text-primary">Home</a>
            <span class="mx-2">/</span>
            <a href="{{ route('categories.index') }}" class="hover:text-primary">Categories</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800">{{ $category->name }}</span>
        </nav>

        {{-- Category Header --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold mb-4">{{ $category->name }}</h1>
            @if ($category->description)
                <p class="text-gray-600">{{ $category->description }}</p>
            @endif
        </div>

        {{-- Filters (Optional) --}}
        <div class="mb-8">
            <div class="flex flex-wrap gap-4">
                <select class="form-select" id="sort">
                    <option value="latest">Latest</option>
                    <option value="price_low">Price: Low to High</option>
                    <option value="price_high">Price: High to Low</option>
                    <option value="popular">Most Popular</option>
                </select>
            </div>
        </div>

        {{-- Products Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($products as $product)
                <x-product-card :product="$product" />
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500">No products found in this category.</p>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-8">
            {{ $products->links() }}
        </div>
    </div>

    @push('scripts')
        <script>
            // Sort functionality
            document.getElementById('sort').addEventListener('change', function(e) {
                const currentUrl = new URL(window.location.href);
                currentUrl.searchParams.set('sort', e.target.value);
                window.location.href = currentUrl.toString();
            });

            // Add to Cart functionality
            function addToCart(productId) {
                // Implement your add to cart logic here
                console.log('Adding product to cart:', productId);
            }
        </script>
    @endpush
@endsection
