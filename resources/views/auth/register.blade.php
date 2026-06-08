<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - San Martin App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-blue-900">San Martin App</h1>
            <p class="text-gray-600">Crear cuenta nueva</p>
        </div>

        <form method="POST" action="{{ route('register.post') }}">
            @csrf

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Nombre Completo</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Ej: Cesar Andrés">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Nombre de Usuario (para login)</label>
                <input type="text" name="username" value="{{ old('username') }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Ej: cesar">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Contraseña</label>
                <input type="password" name="password" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="••••••••">
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="••••••••">
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">
                Crear Cuenta
            </button>

            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">¿Ya tienes cuenta?
                    <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                        Inicia sesión
                    </a>
                </p>
            </div>
        </form>
    </div>
</body>
</html>