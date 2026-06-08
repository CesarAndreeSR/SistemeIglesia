<header class="bg-white shadow-lg border-b border-gray-200 relative z-30">
    <div class="flex items-center justify-between px-4 md:px-6 py-4">

        <!-- Botón menú móvil -->
        <button onclick="toggleSidebar()" class="md:hidden p-2 rounded-lg hover:bg-gray-100 transition transform hover:scale-105">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </button>

        <!-- Logo (solo visible en móvil cuando el sidebar está cerrado) -->
        <div class="md:hidden flex-1 text-center">
            <h1 class="text-lg font-bold text-gray-900">San Martin App</h1>
        </div>

        <!-- Información del usuario -->
        <div class="flex items-center space-x-4 ml-auto">
            @if(auth()->check())
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-medium text-gray-900">
                        {{ auth()->user()->name }}
                    </p>
                    <p class="text-xs text-gray-500">
                        {{ auth()->user()->email }}
                    </p>
                </div>

                <!-- Avatar -->
                <div
                    class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold shadow-lg transform hover:scale-110 transition-transform duration-200">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
            @endif
        </div>

    </div>
</header>
