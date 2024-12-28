@props(['testi'])
<article
    class="bg-white rounded-lg shadow-sm p-8 relative {{ $testi->imageUrl ? 'hover:shadow-lg transition-shadow duration-300 cursor-pointer' : '' }}">
    @if ($testi->imageUrl)
        <a href="{{ $testi->imageUrl }}" target="_blank" class="block absolute inset-0"></a>
    @endif

    <!-- Quote Icon -->
    <div class="absolute top-4 right-4">
        <svg class="w-8 h-8 text-indigo-200" fill="currentColor" viewBox="0 0 24 24">
            <path
                d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.999v10h-9.999z" />
        </svg>
    </div>

    <!-- Testimonial Content -->
    <div class="mb-6 relative z-10">
        <p class="text-gray-600 italic">
            "{{ $testi->content }}"
        </p>
    </div>
</article>
