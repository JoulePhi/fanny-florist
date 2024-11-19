@props(['items'])

<nav class="flex items-center space-x-2 text-gray-500 text-sm mb-6">
    @foreach ($items as $index => $item)
        @if ($index > 0)
            <span class="text-gray-400">/</span>
        @endif

        @if ($item['url'])
            <a href="{{ $item['url'] }}" class="hover:text-primary">
                {{ $item['name'] }}
            </a>
        @else
            <span>{{ $item['name'] }}</span>
        @endif
    @endforeach
</nav>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        @foreach($items as $index => $item)
        {
            "@type": "ListItem",
            "position": {{ $index + 1 }},
            "name": "{{ $item['name'] }}",
            "item": "{{ $item['url'] ?? url()->current() }}"
        }@if(!$loop->last),@endif
        @endforeach
    ]
}
</script>
