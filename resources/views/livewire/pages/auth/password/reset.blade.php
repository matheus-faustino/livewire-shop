<div class="max-w-md w-full bg-white rounded-lg shadow-md p-8">
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800">Set New Password</h2>
        <p class="text-gray-600 mt-2">Create a new password for your account</p>
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
    <form wire:submit="resetPassword">
        <div class="mb-6">
            <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
            <input type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="your@email.com" wire:model="email" required>
        </div>
        
        <div class="mb-6">
            <label for="password" class="block text-gray-700 text-sm font-medium mb-2">New Password</label>
            <input type="password" id="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="••••••••" wire:model="password" required>
        </div>
        
        <div class="mb-6">
            <label for="password_confirmation" class="block text-gray-700 text-sm font-medium mb-2">Confirm New Password</label>
            <input type="password" id="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="••••••••" wire:model="password_confirmation" required>
        </div>
        
        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors cursor-pointer">
            Reset Password
        </button>
    </form>
    
    <div class="text-center mt-6">
        <p class="text-sm text-gray-600">
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Back to login</a>
        </p>
    </div>
</div>