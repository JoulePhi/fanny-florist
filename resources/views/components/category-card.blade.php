@props(['category'])

{{-- <a href="{{ route('catalog.category', $category->slug) }}"
    class="block bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
    <div class="p-6">
        <h3 class="text-xl font-semibold mb-2">{{ $category->name }}</h3>
        <p class="text-gray-600 mb-4">{{ Str::limit($category->description, 120) }}</p>
        <span class="text-sm text-gray-500">{{ $category->products_count }} products</span>
    </div>
</a> --}}


<a href="{{ route('catalog.category', $category->slug) }}"
    class="group relative overflow-hidden rounded-lg shadow-sm hover:shadow-md transition-all duration-300">
    <div class="aspect-square relative">
        <img src="{{ asset('storage/' . $category->products->first()?->images[0]) ?? asset('images/placeholder.jpg') }}"
            alt="Kategori {{ $category->name }} - {{ config('app.name') }}"
            class="object-cover w-full h-full transform group-hover:scale-105 transition-transform duration-300"
            loading="lazy">
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
    </div>

    <!-- Category Info -->
    <div class="absolute bottom-0 left-0 right-0 p-3 sm:p-4">
        <h3 class="text-white font-semibold text-sm sm:text-base">{{ $category->name }}</h3>
        <p class="text-white/80 text-xs sm:text-sm mt-1">{{ $category->products_count }} Produk</p>
    </div>

    <!-- SEO-friendly hidden description -->
    <span class="sr-only">Lihat semua produk dalam kategori {{ $category->name }}</span>
</a>
