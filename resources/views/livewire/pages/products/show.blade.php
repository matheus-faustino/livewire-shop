<div>
    <!-- Breadcrumbs -->
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li>
                <div class="flex items-center">
                    <a href="{{ route('products.index') }}" class="ml-1 md:ml-2 text-gray-500 hover:text-indigo-600">
                        Products
                    </a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="ml-1 md:ml-2 text-gray-700 font-medium">
                        {{ $product->name }}
                    </span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Product -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="md:flex">
            <!-- Product Images -->
            <div class="md:w-1/2">
                <div class="relative pb-[100%] md:pb-0 md:h-full overflow-hidden bg-gray-100">
                    <img 
                        src="{{ $product->image_url }}" 
                        alt="{{ $product->name }}"
                        class="absolute md:relative top-0 left-0 w-full h-full object-cover object-center"
                    >
                </div>
            </div>
            
            <!-- Product Info -->
            <div class="md:w-1/2 p-6 md:p-8 flex flex-col">
                <h1 class="text-2xl font-bold text-gray-900 mb-2">{{ $product->name }}</h1>                
                <div class="mb-6">
                    <span class="text-3xl font-bold text-gray-900">{{ $product->getFormattedPrice() }}</span>
                </div>
                
                <div class="border-t border-b border-gray-200 py-4 my-4">
                    <p class="text-gray-700 leading-relaxed">{{ $product->description }}</p>
                </div>

                <div class="flex flex-col space-y-4 mt-auto">                    
                    <!-- Add to Cart Button -->
                    <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 px-6 rounded-md flex items-center justify-center gap-2 font-medium transition-colors cursor-pointer" wire:click="$dispatch('product-added', { productId: {{ $product->id }}})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-cart"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                        Add to cart
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
