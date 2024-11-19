@if ($isHome)

    @if (Route::current()->getName() == $href)
        <li class="group">
            <a href="{{ route($href) }}" class="block py-2 px-3 text-white text-lg font-bold"
                aria-current="page">{{ $slot }}</a>
            <span class="w-full h-0.5 bg-white block"></span>
        </li>
    @else
        <li class="group">
            <a href="{{ route($href) }}"
                class="block py-2 px-3 text-white text-lg font-bold  transition-colors duration-300"
                aria-current="page">{{ $slot }}</a>
            <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-0.5 bg-white"></span>

        </li>
    @endif
@else
    @if (Route::current()->getName() == $href)
        <li class="group">
            <a href="{{ route($href) }}" class="block py-2 px-3 text-slate-700 text-lg font-bold"
                aria-current="page">{{ $slot }}</a>
            <span class="w-full h-0.5 bg-slate-600 block"></span>
        </li>
    @else
        <li class="group">
            <a href="{{ route($href) }}"
                class="block py-2 px-3 text-slate-400 text-lg font-bold  transition-colors duration-300"
                aria-current="page">{{ $slot }}</a>
            <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-0.5 bg-slate-400"></span>

        </li>
    @endif
@endif
