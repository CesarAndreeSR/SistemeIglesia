<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Iglesia San Marteen</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo/icon.ico') }}" type="image/x-icon">
    
    <!-- Poppins Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.4s ease-out;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-[#C8A26E] via-[#E9D8B6] to-[#FAF8F5] min-h-screen flex items-center justify-center p-4 font-['Poppins']">

    <div class="w-full max-w-md animate-fade-in">

        <!-- Logo / Header -->
        <div class="text-center mb-8">
            <img src="{{ asset('images/logo/logo.png') }}" alt="Logo Iglesia San Marteen" class="w-32 h-32 mx-auto mb-4 rounded-2xl shadow-xl">
            <h1 class="text-3xl font-bold text-[#1F2937]">Iglesia San Marteen</h1>
            <p class="text-[#A97142] mt-1 text-sm">Crea tu cuenta para comenzar</p>
        </div>

        <!-- Card -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 border border-[#E9D8B6]">

            <h2 class="text-xl font-bold text-[#1F2937] mb-1">Registro</h2>
            <p class="text-gray-500 text-sm mb-6">Completa el formulario para crear tu cuenta</p>

            <!-- Errores -->
            @if ($errors->any())
            <div class="mb-5 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl flex items-center gap-2 text-sm">
                <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
                {{ $errors->first() }}
            </div>
            @endif

            <form method="POST" action="{{ route('register.post') }}">
                @csrf

                <!-- Nombre -->
                <div class="mb-5">
                    <label class="block text-sm font-semibold text-[#1F2937] mb-2">Nombre completo</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full px-4 py-3.5 rounded-xl border-2 border-[#E9D8B6] focus:border-[#C8A26E] focus:ring-4 focus:ring-[#E9D8B6] transition-all text-base text-[#1F2937] placeholder-gray-400"
                        placeholder="Ej: Cesar Andrés">
                </div>

                <!-- Usuario -->
                <div class="mb-5">
                    <label class="block text-sm font-semibold text-[#1F2937] mb-2">Nombre de usuario</label>
                    <input type="text" name="username" value="{{ old('username') }}" required
                        class="w-full px-4 py-3.5 rounded-xl border-2 border-[#E9D8B6] focus:border-[#C8A26E] focus:ring-4 focus:ring-[#E9D8B6] transition-all text-base text-[#1F2937] placeholder-gray-400"
                        placeholder="Ej: cesar123">
                </div>

                <!-- Password -->
                <div class="mb-5">
                    <label class="block text-sm font-semibold text-[#1F2937] mb-2">Contraseña</label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-3.5 rounded-xl border-2 border-[#E9D8B6] focus:border-[#C8A26E] focus:ring-4 focus:ring-[#E9D8B6] transition-all text-base"
                        placeholder="••••••••">
                </div>

                <!-- Confirm -->
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-[#1F2937] mb-2">Confirmar contraseña</label>
                    <input type="password" name="password_confirmation" required
                        class="w-full px-4 py-3.5 rounded-xl border-2 border-[#E9D8B6] focus:border-[#C8A26E] focus:ring-4 focus:ring-[#E9D8B6] transition-all text-base"
                        placeholder="••••••••">
                </div>

                <!-- Botón -->
                <button type="submit"
                    class="w-full bg-gradient-to-r from-[#C8A26E] to-[#A97142] text-white py-3.5 px-4 rounded-xl hover:from-[#A97142] hover:to-[#C8A26E] active:scale-95 transition-all font-semibold text-sm shadow-lg">
                    Crear cuenta
                </button>

                <!-- Login -->
                <div class="mt-4 text-center">
                    <p class="text-sm text-gray-600">¿Ya tienes cuenta?
                        <a href="{{ route('login') }}" class="text-[#C8A26E] hover:text-[#A97142] font-semibold transition">
                            Inicia sesión
                        </a>
                    </p>
                </div>

            </form>

        </div>

        <!-- Footer -->
        <p class="text-center text-[#A97142] text-xs mt-6">
                Iglesia San Marteen © {{ date('Y') }}
        </p>

    </div>

</body>

</html>
