@extends('layouts.app')


@section('seo_scheme')
    @if (isset($seo['schema']))
        <script type="application/ld+json">
            {!! json_encode($seo['schema']) !!}
        </script>
    @endif
@endsection
@section('content')
    <div class="container mx-auto px-4 py-8 max-w-screen-xl">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl font-bold mb-8">Contact Us</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                {{-- Contact Form --}}
                <div>
                    <form action="#" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                            <textarea name="message" id="message" rows="4" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                        </div>

                        <button type="submit"
                            class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary-dark transition-colors">
                            Send Message
                        </button>
                    </form>
                </div>

                {{-- Contact Info --}}
                <div>
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-lg font-semibold mb-2">Address</h3>
                            <p class="text-gray-600">{{ config('site_settings.address') }}</p>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold mb-2">Phone</h3>
                            <p class="text-gray-600">{{ config('site_settings.phone') }}</p>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold mb-2">Email</h3>
                            <p class="text-gray-600">{{ config('site_settings.email') }}</p>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold mb-2">Business Hours</h3>
                            <p class="text-gray-600">{!! config('site_settings.business_hours') !!}</p>
                        </div>
                    </div>

                    {{-- Google Maps --}}
                    <div class="mt-8">
                        <div class="aspect-w-16 aspect-h-9">
                            {!! config('site_settings.google_maps_embed') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
