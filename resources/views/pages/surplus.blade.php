<x-app-layout :seo="$seo">
    <div class="container mx-auto px-4 py-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold mb-4">Flash Sale - Limited Time Offers</h1>
            <p class="text-gray-600">Get beautiful flowers at special discounted prices!</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($surplusProducts as $product)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    {{-- Product Image --}}
                    <div class="relative aspect-w-1 aspect-h-1">
                        <img src="{{ $product->images[0] }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        <div class="absolute top-0 right-0 bg-red-500 text-white px-4 py-2">
                            {{ round((($product->original_price - $product->discount_price) / $product->original_price) * 100) }}%
                            OFF
                        </div>
                    </div>

                    {{-- Product Info --}}
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">{{ $product->name }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($product->description, 100) }}</p>

                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <span class="text-gray-500 line-through text-sm">
                                    Rp {{ number_format($product->original_price, 0, ',', '.') }}
                                </span>
                                <span class="text-red-500 font-bold ml-2">
                                    Rp {{ number_format($product->discount_price, 0, ',', '.') }}
                                </span>
                            </div>
                            <span class="text-sm text-gray-500">
                                {{ $product->quantity }} left
                            </span>
                        </div>

                        {{-- Expires countdown --}}
                        <div class="text-sm text-gray-500 mb-4">
                            Expires in:
                            <span x-data="countdown('{{ $product->expires_at }}')" x-text="timeLeft">
                            </span>
                        </div>

                        <a href="https://wa.me/{{ config('site_settings.whatsapp_number') }}?text=Hi, I'm interested in the flash sale item: {{ $product->name }}"
                            target="_blank"
                            class="block w-full bg-green-500 text-white text-center py-2 rounded-lg hover:bg-green-600 transition-colors">
                            Order via WhatsApp
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $surplusProducts->links() }}
        </div>
    </div>

    {{-- Countdown Script --}}
    <script>
        function countdown(expiryDate) {
            return {
                timeLeft: '',
                calculateTimeLeft() {
                    const now = new Date().getTime();
                    const expiry = new Date(expiryDate).getTime();
                    const diff = expiry - now;

                    if (diff <= 0) {
                        this.timeLeft = 'Expired';
                        return;
                    }

                    const days = Math.floor(diff / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));

                    this.timeLeft = `${days}d ${hours}h ${minutes}m`;
                },
                init() {
                    this.calculateTimeLeft();
                    setInterval(() => this.calculateTimeLeft(), 60000);
                }
            }
        }
    </script>
</x-app-layout>
