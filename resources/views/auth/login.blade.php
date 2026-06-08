<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema de Gestión de Actividades</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-blue-900">San Martin App</h1>
            <p class="text-gray-600">Gestión de Actividades</p>
        </div>

        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">¿No tienes cuenta?
                <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                    Regístrate aquí
                </a>
            </p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                {{ $errors->first('username') }}
            </div>
            @endif

            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Nombre de Usuario</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Ej: Cesar">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Contraseña</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="••••••••">
            </div>

            <div class="mb-6">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <span class="ml-2 text-sm text-gray-600">Recordarme</span>
                </label>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                Iniciar Sesión
            </button>
        </form>

        <div class="mt-6 text-center text-sm text-gray-600">
            <p>Usa tu nombre de usuario para iniciar sesión</p>
            <p class="mt-2">Ejemplo: Si te llamas "Cesar Andreee", usa "Cesar"</p>
        </div>
    </div>
</body>

</html>