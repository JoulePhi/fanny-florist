{{-- @extends('layouts.app')


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
@endsection --}}

@extends('layouts.app')

@section('seo_scheme')
    <meta name="description"
        content="{{ $seo['description'] ?? 'Explore our stunning collection of fresh flowers and arrangements. Find the perfect blooms for any occasion.' }}">
    <meta name="keywords" content="{{ $seo['keywords'] ?? 'flowers, bouquets, floral arrangements, fresh flowers' }}">
    <link rel="canonical" href="{{ url()->current() }}" />

    @if (isset($seo['schema']))
        <script type="application/ld+json">
            {!! json_encode($seo['schema']) !!}
        </script>
    @endif
@endsection

@section('content')
    <div class="container mx-auto py-8 px-4 max-w-screen-xl">
        <div class="mb-8">
            <h1 class="text-4xl font-bold mb-4">{{ $pageTitle ?? 'Our Flower Collection' }}</h1>
            <p class="text-gray-600">
                {{ $pageDescription ?? 'Browse our beautiful selection of fresh flowers and arrangements' }}</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            {{-- Filters Sidebar --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow p-6 sticky top-4">
                    {{-- Categories Filter --}}
                    <div class="mb-6">
                        <h2 class="text-xl font-semibold mb-4">Categories</h2>
                        <ul class="space-y-2">
                            @foreach ($categories as $cat)
                                <li>
                                    <a href="{{ route('catalog.category', $cat->slug) }}"
                                        class="text-gray-600 hover:text-primary {{ request()->segment(2) == $cat->slug ? 'text-primary font-semibold' : '' }}">
                                        {{ $cat->name }} ({{ $cat->products_count }})
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Price Range Filter --}}
                    <div class="mb-6">
                        <h2 class="text-xl font-semibold mb-4">Price Range</h2>
                        <form action="{{ request()->url() }}" method="GET" class="space-y-4">
                            <input type="hidden" name="sort" value="{{ request()->get('sort') }}">
                            <div class="flex gap-2">
                                <input type="number" name="min_price" value="{{ request()->get('min_price') }}"
                                    placeholder="Min" class="w-1/2 rounded border-gray-300">
                                <input type="number" name="max_price" value="{{ request()->get('max_price') }}"
                                    placeholder="Max" class="w-1/2 rounded border-gray-300">
                            </div>
                            <button type="submit" class="w-full bg-primary text-white py-2 rounded hover:bg-primary-dark">
                                Apply Filter
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Products Section --}}
            <div class="lg:col-span-3">
                {{-- Sorting and View Options --}}
                <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
                    <div class="flex items-center gap-4">
                        <label for="sort" class="text-gray-600">Sort by:</label>
                        <div class="relative">
                            <button id="sortDropdownButton" data-dropdown-toggle="sortDropdown"
                                class="text-gray-700 bg-white border border-rose-200 hover:bg-rose-50 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center justify-between min-w-[200px]"
                                type="button">
                                <span id="selectedOption">Newest</span>
                                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <div id="sortDropdown"
                                class="z-10 hidden bg-white divide-y divide-pink-100 rounded-lg shadow w-44">
                                <ul class="py-2 text-sm text-gray-700" aria-labelledby="sortDropdownButton">
                                    <li>
                                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'newest']) }}"
                                            class="block px-4 py-2 hover:bg-pink-50 {{ request()->get('sort') == 'newest' ? 'bg-pink-50' : '' }}">
                                            Newest
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'price_low']) }}"
                                            class="block px-4 py-2 hover:bg-pink-50 {{ request()->get('sort') == 'price_low' ? 'bg-pink-50' : '' }}">
                                            Price: Low to High
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'price_high']) }}"
                                            class="block px-4 py-2 hover:bg-pink-50 {{ request()->get('sort') == 'price_high' ? 'bg-pink-50' : '' }}">
                                            Price: High to Low
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'name_asc']) }}"
                                            class="block px-4 py-2 hover:bg-pink-50 {{ request()->get('sort') == 'name_asc' ? 'bg-pink-50' : '' }}">
                                            Name: A-Z
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'name_desc']) }}"
                                            class="block px-4 py-2 hover:bg-pink-50 {{ request()->get('sort') == 'name_desc' ? 'bg-pink-50' : '' }}">
                                            Name: Z-A
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600">Showing {{ $products->firstItem() }}-{{ $products->lastItem() }} of
                        {{ $products->total() }} products</p>
                </div>

                {{-- Products Grid --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($products as $product)
                        <x-product-card :product="$product" />
                    @empty
                        <div class="col-span-full text-center py-8">
                            <p class="text-gray-500">No products found matching your criteria.</p>
                        </div>
                    @endforelse
                </div>

                {{-- Pagination --}}
                @if ($products->hasPages())
                    <div class="mt-8">
                        {{ $products->withQueryString()->onEachSide(3)->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Update selected option text when clicking on links
            const links = document.querySelectorAll('#sortDropdown a');
            const selectedOption = document.getElementById('selectedOption');

            links.forEach(link => {
                link.addEventListener('click', function(e) {
                    selectedOption.textContent = this.textContent.trim();
                });
            });

            // Set initial selected option
            const currentSort = '{{ request()->get('sort', 'newest') }}';
            const currentOption = document.querySelector(`#sortDropdown a[href*="sort=${currentSort}"]`);
            if (currentOption) {
                selectedOption.textContent = currentOption.textContent.trim();
            }
        });
    </script>
@endpush
