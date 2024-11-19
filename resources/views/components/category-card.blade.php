@props(['category'])

<a href="{{ route('catalog.category', $category->slug) }}"
    class="block bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
    <div class="p-6">
        <h3 class="text-xl font-semibold mb-2">{{ $category->name }}</h3>
        <p class="text-gray-600 mb-4">{{ Str::limit($category->description, 120) }}</p>
        <span class="text-sm text-gray-500">{{ $category->products_count }} products</span>
    </div>
</a>
