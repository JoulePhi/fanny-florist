@extends('layouts.app')


@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-6xl font-bold text-primary mb-4">404</h1>
            <p class="text-xl text-gray-600 mb-8">Oops! Page not found</p>
            <p class="text-gray-500 mb-8">The page you are looking for might have been removed or is temporarily
                unavailable.</p>
            <a href="{{ route('home') }}"
                class="inline-block bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary-dark transition-colors">
                Back to Home
            </a>
        </div>
    </div>
@endsection
