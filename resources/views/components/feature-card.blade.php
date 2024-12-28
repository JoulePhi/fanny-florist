@props(['feature'])
<article
    class="flex flex-col items-center text-center p-6 bg-gray-50 rounded-xl hover:shadow-lg transition-shadow duration-300">
    <!-- Icon Container -->
    <div class="w-16 h-16 flex items-center justify-center {{ $feature->icon_bg_color }} rounded-full mb-4">
        {{ svg(trim($feature->icon), 'w-8 h-8 ' . $feature->icon_color) }}
    </div>
    <!-- Feature Title -->
    <h3 class="text-xl font-semibold text-gray-900 mb-2">
        {{ $feature->title }}
    </h3>
    <!-- Feature Description -->
    <p class="text-gray-600">
        {{ $feature->description }}
    </p>
</article>
