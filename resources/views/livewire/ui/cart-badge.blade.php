<div 
    x-data="{ open: false }" 
    @click.away="open = false"
    class="relative">
    <!-- Dropdown toggle -->
    <button 
        @click="open = !open" 
        wire:click="$dispatch('toggle-open')" 
        class="relative p-2 cursor-pointer"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        @if (count($products) > 0)
            <span class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full text-xs w-5 h-5 flex items-center justify-center">
                {{ array_reduce($products, fn($carry, $item) => $carry + $item['quantity'] ) }}
            </span>
        @endif
    </button>
    
    <!-- Cart Dropdown -->
    <div 
        x-show="open" 
        x-transition:enter="transition ease-out duration-200" 
        x-transition:enter-start="opacity-0 scale-95" 
        x-transition:enter-end="opacity-100 scale-100" 
        x-transition:leave="transition ease-in duration-150" 
        x-transition:leave-start="opacity-100 scale-100" 
        x-transition:leave-end="opacity-0 scale-95" 
        class="absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-lg z-50 overflow-hidden"
        style="display: none;"
    >
        <div class="p-4 border-b border-gray-100 flex justify-between items-center">
            <h2 class="text-lg font-semibold">Your Cart</h2>
            <button @click="open = false" class="text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <div class="p-4 max-h-96 overflow-y-auto">
            @if(count($products) > 0)
                @foreach($products as $index => $item)
                    <div class="flex items-center justify-between py-3 border-b border-gray-100">
                        <div class="flex items-center">
                            <img src="{{ $item['product']->image_url }}" class="w-12 h-12 object-cover rounded" alt="{{ $item['product']->name }}">
                            <div class="ml-3">
                                <h3 class="text-sm font-medium">{{ $item['product']->name }}</h3>
                                <p class="text-sm text-gray-500">{{ $item['product']->getFormattedPrice() }}</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <!-- Quantity control buttons -->
                            <div class="flex items-center mr-2">
                                <button 
                                    wire:click="$dispatch('update-quantity', { productId: {{ $item['product']->id }}, quantity: {{ $item['quantity'] - 1 }} })"
                                    class="text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 w-6 h-6 flex items-center justify-center cursor-pointer"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                    </svg>
                                </button>
                                <span class="mx-1 text-sm">{{ $item['quantity'] }}</span>
                                <button 
                                    wire:click="$dispatch('update-quantity', { productId: {{ $item['product']->id }}, quantity: {{ $item['quantity'] + 1 }} })"
                                    class="text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 w-6 h-6 flex items-center justify-center cursor-pointer"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                </button>
                            </div>
                            <!-- Remove product button -->
                            <button class="text-red-500 hover:text-red-700 cursor-pointer" wire:click="$dispatch('product-removed', { index: {{ $index }} })">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center py-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <p class="mt-2 text-gray-500">Your cart is empty</p>
                </div>
            @endif
        </div>
        
        @if(count($products) > 0)
            <!-- Checout button -->
            <div class="p-4">
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