<nav class="bg-gradient-to-r from-rose-100 to-pink-100 shadow-md">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center h-16"> <!-- Logo and Brand Name -->
            <div class="flex items-center"> <img src="{{ asset('images/sakura-icon.png') }}" class="h-12 object-contain"
                    alt="Logo Sakura"><a href="{{ route('home') }}"
                    class="ml-2 text-xl text-rose-700 hover:text-rose-600">{{ config('site_settings.company_name') }}</a>
            </div>
            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}"
                    class="text-rose-700 hover:text-rose-600 font-medium transition-colors duration-200 {{ request()->routeIs('home') ? 'border-b-2 border-rose-500' : '' }}">Home</a>
                <a href="{{ route('catalog') }}"
                    class="text-rose-700 hover:text-rose-600 font-medium transition-colors duration-200 {{ request()->routeIs('catalog') ? 'border-b-2 border-rose-500' : '' }}">Shop</a>
                <a href="{{ route('categories') }}"
                    class="text-rose-700 hover:text-rose-600 font-medium transition-colors duration-200 {{ request()->routeIs('categories') ? 'border-b-2 border-rose-500' : '' }}">Collections</a>
                {{-- <a href=""
                    class="text-rose-700 hover:text-rose-600 font-medium transition-colors duration-200">About</a> --}}
                <a href="{{ route('contact') }}"
                    class="text-rose-700 hover:text-rose-600 font-medium transition-colors duration-200 {{ request()->routeIs('contact') ? 'border-b-2 border-rose-500' : '' }}">Contact</a>
            </div>



            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-rose-700 hover:text-rose-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden pb-4">
            <div class="flex flex-col space-y-4">
                <a href="{{ route('home') }}"
                    class="text-rose-700 hover:text-rose-600 w-fit font-medium {{ request()->routeIs('home') ? 'border-b-2 border-rose-500' : '' }}">Home</a>
                <a href="{{ route('catalog') }}"
                    class="text-rose-700 hover:text-rose-600 w-fit font-medium {{ request()->routeIs('catalog') ? 'border-b-2 border-rose-500' : '' }}">Shop</a>
                <a href="{{ route('categories') }}"
                    class="text-rose-700 hover:text-rose-600 w-fit font-medium {{ request()->routeIs('categories') ? 'border-b-2 border-rose-500' : '' }}">Collections</a>
                {{-- <a href="#" class="text-rose-700 hover:text-rose-600 font-medium w-fit">About</a> --}}
                <a href="{{ route('contact') }}"
                    class="text-rose-700 hover:text-rose-600 font-medium w-fit {{ request()->routeIs('contact') ? 'border-b-2 border-rose-500' : '' }}">Contact</a>
            </div>
        </div>
    </div>
</nav>
