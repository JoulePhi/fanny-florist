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
        <div class="mb-8">
            <h1 class="text-4xl font-bold mb-4">{{ $category->name }}</h1>
            <p class="text-gray-600">Browse our beautiful selection of fresh flowers and arrangements</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>

        <div class="mt-8">
            {{ $products->links() }}
        </div>
    </div>
@endsection
