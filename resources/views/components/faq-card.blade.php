@props(['faq'])
<article class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow">
    <h3 class="text-xl font-semibold text-gray-900 mb-3">
        {{ $faq->question }}
    </h3>
    <p class="text-gray-600">
        {{ $faq->answer }}
    </p>
</article>
