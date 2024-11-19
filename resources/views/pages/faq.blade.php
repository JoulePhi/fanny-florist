// resources/views/pages/faq.blade.php
<x-app-layout :seo="$seo">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-4xl font-bold mb-8">Frequently Asked Questions</h1>

            <div class="space-y-6">
                @foreach ($faqs as $faq)
                    <div x-data="{ open: false }" class="border rounded-lg">
                        <button @click="open = !open"
                            class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50">
                            <span class="text-lg font-medium">{{ $faq->question }}</span>
                            <svg :class="{ 'rotate-180': open }" class="w-5 h-5 transform transition-transform">
                                <path d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-transition class="px-6 py-4 prose max-w-none border-t">
                            {!! $faq->answer !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
