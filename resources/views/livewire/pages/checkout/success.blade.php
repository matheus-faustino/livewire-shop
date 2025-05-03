<div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-md">
    <div class="text-center">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>
        
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Payment Successful!</h1>
        <p class="text-gray-600 mb-8">Thank you for your purchase. Your order has been processed successfully.</p>
        
        <a href="{{ route('products.index') }}" class="inline-block bg-blue-600 text-white py-2 px-6 rounded-md hover:bg-blue-700 transition-colors">
            Continue Shopping
        </a>
    </div>
</div>