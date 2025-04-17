<div class="max-w-md w-full bg-white rounded-lg shadow-md p-8">
    <div class="text-center mb-6">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4">
            <i class="bi bi-envelope text-blue-500 text-3xl"></i>
        </div>
        <h2 class="text-2xl font-bold text-gray-800">Verify your email</h2>
    </div>
    
    <div class="mb-8 text-center">
        <p class="text-gray-600">
            Please check your inbox and click on the verification link to complete your account setup.
        </p>
    </div>
    @if (session()->has('success'))
        <div class="mb-6 border-l-4 p-4 rounded-r shadow-md flex items-start bg-green-100 border-green-500 text-green-700">
            <div class="flex-shrink-0 mr-3">
                <i class="fas fa-check-circle text-green-500 text-xl mt-0.5"></i>
            </div>
            <div class="flex-grow">
                <div class="font-bold">Success!</div>
                <div class="text-sm">{{ session('success') }}</div>
            </div>
            <button class="text-green-500 hover:text-green-700 ml-auto" aria-label="Close">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="mb-6 border-l-4 p-4 rounded-r shadow-md flex items-start bg-red-100 border-red-500 text-red-700">
            <div class="flex-shrink-0 mr-3">
                <i class="fas fa-check-circle text-red-500 text-xl mt-0.5"></i>
            </div>
            <div class="flex-grow">
                <div class="font-bold">Oops!</div>
                <div class="text-sm">{{ session('error') }}</div>
            </div>
            <button class="text-red-500 hover:text-red-700 ml-auto" aria-label="Close">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif
    <div class="mb-6 text-center">
        <button type="submit" form="verification-send-form" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors cursor-pointer">
            Resend verification email
        </button>
    </div>
    
    <div class="text-center">
        <button type="submit" form="logout-form" class="text-blue-600 hover:text-blue-800 hover:underline text-sm cursor-pointer">
            <i class="fas fa-arrow-left mr-1"></i> Back to login
        </button>
    </div>

    <form id="verification-send-form" method="POST" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form id="logout-form" method="POST" action="{{ route('logout') }}">
        @csrf
    </form>
</div>