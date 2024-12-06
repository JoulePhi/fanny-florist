@extends('layouts.app')


@section('seo_scheme')
    @if (isset($seo['schema']))
        <script type="application/ld+json">
            {!! json_encode($seo['schema']) !!}
        </script>
    @endif
@endsection
@section('content')
    <section class="py-8 sm:py-12 md:py-16 bg-gray-50">
        <div class="container mx-auto max-w-screen-xl px-4 sm:px-6">
            <!-- SEO-friendly header with breadcrumbs -->
            <nav class="mb-4 text-sm" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2">
                    <li><a href="/" class="text-gray-600 hover:text-emerald-600">Beranda</a></li>
                    <li class="text-gray-400">/</li>
                    <li class="text-gray-900 font-medium">Kategori Bunga</li>
                </ol>
            </nav>

            <header class="mb-8 sm:mb-12">
                <h1 class="text-3xl sm:text-4xl font-bold mb-4">Kategori Bunga</h1>
                <p class="text-gray-600 max-w-3xl">Jelajahi koleksi lengkap kategori bunga kami untuk setiap momen spesial
                    dalam hidup Anda. Dari perayaan bahagia hingga momen duka, kami menyediakan rangkaian bunga yang tepat
                    untuk mengekspresikan perasaan Anda.</p>
            </header>

            <!-- Categories Grid with Filtering -->
            <div class="mb-8">
                {{-- <div class="flex flex-wrap gap-3 mb-6">
                    <button class="px-4 py-2 rounded-full bg-emerald-600 text-white">Semua</button>
                    <button
                        class="px-4 py-2 rounded-full bg-gray-200 hover:bg-emerald-600 hover:text-white transition-colors">Wedding</button>
                    <button
                        class="px-4 py-2 rounded-full bg-gray-200 hover:bg-emerald-600 hover:text-white transition-colors">Wisuda</button>
                    <button
                        class="px-4 py-2 rounded-full bg-gray-200 hover:bg-emerald-600 hover:text-white transition-colors">Duka
                        Cita</button>
                </div> --}}

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                    @foreach ($categories as $category)
                        <x-category-card :category="$category" />
                    @endforeach
                </div>
            </div>

            <!-- Pagination -->
            <div class="flex justify-center">
                {{ $categories->links() }}
            </div>
        </div>
    </section>
@endsection
