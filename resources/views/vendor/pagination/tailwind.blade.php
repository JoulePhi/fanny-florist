@if ($paginator->hasPages())
    <nav aria-label="Page navigation">
        <ul class="flex items-center -space-x-px h-10 text-base">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span
                        class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg cursor-not-allowed">
                        <span class="sr-only">Previous</span>
                        <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"
                        class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700">
                        <span class="sr-only">Previous</span>
                        <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                    </a>
                </li>
            @endif

            {{-- First Page Link --}}
            @if ($paginator->currentPage() > 3)
                <li>
                    <a href="{{ $paginator->url(1) }}"
                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">1</a>
                </li>
                @if ($paginator->currentPage() > 4)
                    <li>
                        <span
                            class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300">...</span>
                    </li>
                @endif
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span aria-current="page"
                                    class="z-10 flex items-center justify-center px-4 h-10 leading-tight text-bloom-600 border border-bloom-300 border-r-bloom-300 bg-bloom-50 hover:bg-bloom-100 hover:text-bloom-700">{{ $page }}</span>
                            </li>
                        @elseif (
                            $page === $paginator->currentPage() + 1 ||
                                $page === $paginator->currentPage() + 2 ||
                                $page === $paginator->currentPage() - 1 ||
                                $page === $paginator->currentPage() - 2)
                            <li>
                                <a href="{{ $url }}"
                                    class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Last Page Link --}}
            @if ($paginator->currentPage() < $paginator->lastPage() - 2)
                @if ($paginator->currentPage() < $paginator->lastPage() - 3)
                    <li>
                        <span
                            class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300">...</span>
                    </li>
                @endif
                <li>
                    <a href="{{ $paginator->url($paginator->lastPage()) }}"
                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">{{ $paginator->lastPage() }}</a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"
                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700">
                        <span class="sr-only">Next</span>
                        <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                    </a>
                </li>
            @else
                <li>
                    <span
                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg cursor-not-allowed">
                        <span class="sr-only">Next</span>
                        <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
