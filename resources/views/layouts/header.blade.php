<header class="bg-white shadow-lg border-b border-[#E9D8B6] relative z-30">
    <div class="flex items-center justify-between px-4 md:px-6 py-4">

        <!-- Botón menú móvil -->
        <button onclick="toggleSidebar()" class="md:hidden p-2 rounded-xl hover:bg-[#FAF8F5] transition transform hover:scale-105">
            <svg class="w-6 h-6 text-[#C8A26E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </button>

        <!-- Logo (solo visible en móvil cuando el sidebar está cerrado) -->
        <div class="md:hidden flex-1 text-center flex items-center justify-center gap-2">
            <img src="{{ asset('images/logo/icon.ico') }}" alt="Icono San Marteen" class="w-8 h-8">
            <h1 class="text-lg font-bold text-[#1F2937]">San Marteen</h1>
        </div>

        <!-- Información del usuario -->
        <div class="flex items-center space-x-4 ml-auto">
            @if(auth()->check())
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-medium text-[#1F2937]">
                        {{ auth()->user()->name }}
                    </p>
                    <p class="text-xs text-gray-500">
                        {{ auth()->user()->email }}
                    </p>
                </div>

                <!-- Avatar -->
                <div
                    class="w-10 h-10 bg-gradient-to-br from-[#C8A26E] to-[#A97142] rounded-full flex items-center justify-center text-white font-bold shadow-lg transform hover:scale-110 transition-transform duration-300">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
            @endif
        </div>

    </div>
</header>
