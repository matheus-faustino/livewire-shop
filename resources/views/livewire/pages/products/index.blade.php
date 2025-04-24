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
        </ol>
    </nav>

    <!-- Product Grid -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
        @foreach ($products as $product)
            <livewire:ui.product-card :$product :key="$product->id">
        @endforeach
    </div>
</div>