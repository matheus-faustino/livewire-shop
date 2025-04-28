<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body>
        <div class="min-h-screen bg-gray-100">
            <header class="bg-white shadow-sm">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center h-16">
                        <h1 class="text-xl font-semibold text-gray-900"><a href="{{ route('products.index') }}">Livewire Shop</a></h1>
                        <div class="flex items-center">
                            <div class="relative" x-data="{ open: false }" @click.away="open = false">
                                <button 
                                    @click="open = !open" 
                                    class="flex items-center space-x-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 cursor-pointer"
                                >
                                    <span>{{ auth()->user()->name }}</span>
                                    <svg 
                                        :class="{'transform rotate-180': open}" 
                                        class="h-5 w-5 text-gray-400 transition-transform duration-200" 
                                        xmlns="http://www.w3.org/2000/svg" 
                                        viewBox="0 0 20 20" 
                                        fill="currentColor"
                                    >
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                
                                <div 
                                    x-show="open" 
                                    x-transition:enter="transition ease-out duration-100" 
                                    x-transition:enter-start="transform opacity-0 scale-95" 
                                    x-transition:enter-end="transform opacity-100 scale-100" 
                                    x-transition:leave="transition ease-in duration-75" 
                                    x-transition:leave-start="transform opacity-100 scale-100" 
                                    x-transition:leave-end="transform opacity-0 scale-95" 
                                    class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-1"
                                    style="display: none;"
                                >
                                    <div class="px-4 py-3 border-b border-gray-100">
                                        <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</p>
                                        <p class="text-sm text-gray-500 truncate">{{ auth()->user()->email }}</p>
                                    </div>
                                    
                                    <button type="submit" form="logout-form" class="w-full px-4 py-2 text-sm text-red-600 hover:bg-gray-100 cursor-pointer">
                                        <i class="bi bi-power"></i>
                                        Logout
                                    </button>
                                </div>
                            </div>
                            <livewire:ui.cart-badge/>
                        </div>
                    </div>
                </div>
            </header>

            <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                {{ $slot }}
            </main>
        </div>

        <form id="logout-form" method="POST" action="{{ route('logout') }}">
            @csrf
        </form>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>
</html>
