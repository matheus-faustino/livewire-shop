<div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col h-full transition-transform duration-200 hover:shadow-lg hover:-translate-y-1">
    <!-- Product Image (1:1 Square) -->
    <div class="relative pb-[100%] overflow-hidden bg-gray-100">
        <img 
            src="{{ $product->image_url }}" 
            alt="{{ $product->name }}"
            class="absolute top-0 left-0 w-full h-full object-cover object-center"
        >
    </div>
    <div class="p-4 flex-grow flex flex-col">
        <!-- Product Name -->
        <h3 class="text-lg font-medium text-gray-900 mb-2"><a href="{{ route('products.show', ['product' => $product]) }}">{{ $product->name }}</a></h3>
        
        <!-- Price and Add to Cart -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 mt-auto w-full">
            <span class="font-medium text-gray-900">{{ $product->getFormattedPrice() }}</span>
            <button class="w-full sm:w-auto bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-md flex items-center justify-center sm:justify-start gap-2 text-sm font-medium transition-colors cursor-pointer" wire:click="$dispatch('product-added', { productId: {{ $product->id }} })">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-cart"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                Add to cart
            </button>
        </div>
    </div>
</div>