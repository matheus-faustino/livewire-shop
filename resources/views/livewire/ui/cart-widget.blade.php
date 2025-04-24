<div>
    <div class="fixed top-0 right-0 h-full w-80 bg-white shadow-lg z-50 transform transition-transform {{ $isOpen ? 'translate-x-0' : 'translate-x-full' }}">
        <div class="p-4 border-b flex justify-between items-center h-16">
            <h2 class="text-lg font-semibold">Your Cart</h2>
            <button wire:click="$dispatch('toggle-open')" class="text-gray-500 hover:text-gray-700 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="p-4 overflow-y-auto h-[calc(100%-12rem)]">
            @if(count($products) > 0)
                @foreach($products as $index => $product)
                    <div class="flex items-center justify-between py-3 border-b">
                        <div class="flex items-center">
                            <img src="{{ $product->image_url }}" class="w-12 h-12 object-cover rounded" alt="{{ $product->name }}">
                            <div class="ml-3">
                                <h3 class="text-sm font-medium">{{ $product->name }}</h3>
                                <p class="text-sm text-gray-500">{{ $product->getFormattedPrice() }}</p>
                            </div>
                        </div>
                        <button class="inline-flex items-center text-sm p-2 bg-red-500 text-white rounded cursor-pointer" wire:click="$dispatch('product-removed', { index: {{ $index }} })">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                            </svg>
                        </button>
                    </div>
                @endforeach
            @else
                <div class="text-center py-8">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <p class="mt-2 text-gray-500">Your cart is empty</p>
                </div>
            @endif
        </div>

        @if(count($products) > 0)
            <div class="p-4 border-t">
                <div class="flex justify-between mb-4">
                    <span class="font-semibold">Total:</span>
                    <span class="font-semibold">{{ $this->getTotalPrice() }}</span>
                </div>
                <a href="#" class="block text-center bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                    Checkout
                </a>
            </div>
        @endif
    </div>
</div>