{{-- @extends('layouts.app')


@section('seo_scheme')
    @if (isset($seo['schema']))
        <script type="application/ld+json">
            {!! json_encode($seo['schema']) !!}
        </script>
    @endif
@endsection
@section('content')
    <div class="container mx-auto px-4 py-8 max-w-screen-xl">
        <div class="mx-auto">
            <h1 class="text-4xl font-bold mb-8">Contact Us</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
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

                    <div class="mt-8">
                        <div class="aspect-w-16 aspect-h-9">
                            {!! config('site_settings.google_maps_embed') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
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
        <!-- Decorative flower header -->

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            {{-- Contact Form --}}
            <div class="bg-white p-8 rounded-lg shadow-lg border border-rose-100">
                <h2 class="text-2xl font-serif text-rose-800 mb-6">Send Us a Message</h2>
                <form action="#" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Your Name</label>
                        <input type="text" name="name" id="name" required
                            class="mt-1 block w-full rounded-md border-rose-200 shadow-sm focus:border-rose-300 focus:ring focus:ring-rose-200 focus:ring-opacity-50 transition-colors">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Your Email</label>
                        <input type="email" name="email" id="email" required
                            class="mt-1 block w-full rounded-md border-rose-200 shadow-sm focus:border-rose-300 focus:ring focus:ring-rose-200 focus:ring-opacity-50 transition-colors">
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">Your Message</label>
                        <textarea name="message" id="message" rows="4" required
                            class="mt-1 block w-full rounded-md border-rose-200 shadow-sm focus:border-rose-300 focus:ring focus:ring-rose-200 focus:ring-opacity-50 transition-colors"></textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-rose-600 text-white px-6 py-3 rounded-lg hover:bg-rose-700 transition-colors duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                        Send Message
                    </button>
                </form>
            </div>

            {{-- Contact Info --}}
            <div class="space-y-8">
                <div class="bg-white p-8 rounded-lg shadow-lg border border-rose-100">
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <span class="text-rose-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </span>
                            <div>
                                <h3 class="text-lg font-serif text-rose-800 mb-2">Visit Our Shop</h3>
                                <p class="text-gray-600">{{ config('site_settings.address') }}</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <span class="text-rose-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </span>
                            <div>
                                <h3 class="text-lg font-serif text-rose-800 mb-2">Call Us</h3>
                                <p class="text-gray-600">{{ config('site_settings.phone') }}</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <span class="text-rose-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </span>
                            <div>
                                <h3 class="text-lg font-serif text-rose-800 mb-2">Email Us</h3>
                                <p class="text-gray-600">{{ config('site_settings.email') }}</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <span class="text-rose-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            <div>
                                <h3 class="text-lg font-serif text-rose-800 mb-2">Business Hours</h3>
                                <p class="text-gray-600">{!! config('site_settings.business_hours') !!}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Google Maps --}}
                <div class="bg-white p-4 rounded-lg shadow-lg border border-rose-100">
                    <div class="aspect-w-16 overflow-hidden rounded-lg">
                        {!! config('site_settings.google_maps_embed') !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- Decorative footer flourish -->

    </div>
@endsection
