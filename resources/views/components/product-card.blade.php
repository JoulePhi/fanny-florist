@props(['product'])

{{-- <div class="bg-white rounded-lg shadow-md overflow-hidden">
    <img src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
    <div class="p-4">
        <h3 class="font-semibold mb-2">{{ $product->name }}</h3>
        <p class="text-gray-600 text-sm mb-2">{{ Str::limit($product->description, 100) }}</p>
        <div class="flex justify-between items-center">
            <span class="text-primary font-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
            <a href=""
                class="text-primary hover:underline">
                View Details
            </a>
        </div>
    </div>
</div> --}}


{{-- <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow  overflow-hidden">
    <a href="{{ route('catalog.product', [$product->category->slug, $product->slug]) }}">
        <img src="" alt=""
            class="w-full object-cover aspect-square">
    </a>
    <div class="p-5">
        <div class="flex justify-between items-center">
            <a href="">
                <h5 class="mb-2 text-base font-medium tracking-tight text-gray-900 hover:underline">
                </h5>
            </a>
            <a href="{{ route('catalog.product', [$product->category->slug, $product->slug]) }}">
                <h4 class="mb-2 text-base font-bold tracking-tight text-gray-900 text-end w-full hover:underline"></h4>
            </a>
        </div>
        <div class="h-full">
            <p class="mb-3 font-normal text-gray-700 ">{{ Str::limit($product->description, 100) }}</p>
        </div>

    </div>
</div> --}}

<div class="w-full sm:w-64 md:w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl relative">
    @if (isset($product->sale) && $product->sale > 0)
        <span
            class="bg-red-500 text-white font-bold text-xs sm:text-sm px-4 sm:px-6 py-1 rounded absolute top-2 sm:top-4 left-2 sm:left-4">
            SALE
        </span>
    @endif
    <a href="{{ route('catalog.product', [$product->category->slug, $product->slug]) }}">
        <img src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->name }}"
            class="w-full aspect-square object-cover rounded-t-xl" />
        <div class="px-3 sm:px-4 py-2 sm:py-3">
            <span class="text-gray-400 mr-3 uppercase text-xs">{{ $product->category->name }}</span>
            <p class="text-base sm:text-lg font-bold text-black truncate block capitalize">{{ $product->name }}</p>
            <div class="flex items-center">
                @if (isset($product->sale) && $product->sale > 0)
                    <p class="text-base sm:text-lg font-semibold text-black cursor-auto my-2 sm:my-3">Rp
                        {{ number_format($product->sale, 0, ',', '.') }}</p>
                    <del>
                        <p class="text-xs sm:text-sm text-gray-600 cursor-auto ml-2">Rp
                            {{ number_format($product->price, 0, ',', '.') }}</p>
                    </del>
                @else
                    <p class="text-base sm:text-lg font-semibold text-black cursor-auto my-2 sm:my-3">Rp
                        {{ number_format($product->price, 0, ',', '.') }}</p>
                @endif

                <div class="ml-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                        class="sm:w-[20px] sm:h-[20px]" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                        <path
                            d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                    </svg>
                </div>
            </div>
        </div>
    </a>
</div>
