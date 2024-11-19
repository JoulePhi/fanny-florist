@props(['items'])

@php
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => collect($items)
            ->map(function ($item, $index) {
                return [
                    '@type' => 'ListItem',
                    'position' => $index + 1,
                    'name' => $item['name'],
                    'item' => $item['url'],
                ];
            })
            ->toArray(),
    ];
@endphp

<script type="application/ld+json">
    {!! json_encode($schema) !!}
</script>

<nav class="text-sm text-gray-500 mb-4">
    @foreach ($items as $index => $item)
        @if ($index > 0)
            <span class="mx-2">/</span>
        @endif
        <a href="{{ $item['url'] }}" class="hover:text-primary">{{ $item['name'] }}</a>
    @endforeach
</nav>
