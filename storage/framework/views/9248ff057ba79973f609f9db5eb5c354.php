<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - San Martin App</title>
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

<body class="bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md animate-fade-in">

        <!-- Logo / Header -->
        <div class="text-center mb-8">
            
            <h1 class="text-3xl font-bold text-white">San Martin App</h1>
            <p class="text-blue-200 mt-1 text-sm">Gestión de Actividades</p>
        </div>

        <!-- Card -->
        <div class="bg-white rounded-2xl shadow-2xl p-6 md:p-8">

            <h2 class="text-xl font-bold text-gray-800 mb-1">Bienvenido</h2>
            <p class="text-gray-500 text-sm mb-6">Ingresa tus credenciales para continuar</p>

            <!-- Error -->
            <?php if($errors->any()): ?>
            <div class="mb-5 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl flex items-center gap-2 text-sm">
                <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
                <?php echo e($errors->first('username')); ?>

            </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>

                <!-- Usuario -->
                <div class="mb-5">
                    <label for="username" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Nombre de Usuario
                    </label>
                    <input type="text" id="username" name="username" value="<?php echo e(old('username')); ?>" required
                        placeholder="Ej: Cesar"
                        class="w-full px-4 py-3.5 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all text-base text-gray-900 placeholder-gray-400">
                </div>

                <!-- Contraseña -->
                <div class="mb-5">
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        Contraseña
                    </label>
                    <input type="password" id="password" name="password" required
                        placeholder="••••••••"
                        class="w-full px-4 py-3.5 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all text-base">
                </div>

                <!-- Recordarme -->
                <div class="mb-6">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="remember"
                            class="h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <span class="text-sm text-gray-600">Recordarme</span>
                    </label>
                </div>

                <!-- Botón -->
                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-3.5 px-4 rounded-xl hover:from-blue-700 hover:to-indigo-800 active:scale-95 transition-all font-semibold text-sm shadow-lg">
                    Iniciar Sesión
                </button>
                <!-- Registro -->
                <div class="mt-4 text-center">
                    <p class="text-sm text-gray-600">¿No tienes cuenta?
                        <a href="<?php echo e(route('register')); ?>" class="text-blue-600 hover:text-blue-800 font-semibold transition">
                            Regístrate aquí
                        </a>
                    </p>
                </div>

            </form>

            <!-- Hint -->
            <div class="mt-6 p-4 bg-blue-50 rounded-xl">
                <p class="text-xs text-blue-700 text-center">
                    Usa tu nombre de usuario para iniciar sesión.<br>
                    Ejemplo: Si te llamas "Cesar Andreee", usa <strong>Cesar</strong>
                </p>
            </div>

        </div>

        <!-- Footer -->
        <p class="text-center text-blue-300 text-xs mt-6">
                Intihawua © <?php echo e(date('Y')); ?>

        </p>

    </div>

</body>

</html><?php /**PATH C:\xampp\htdocs\sistemaIglesia\sistemaIglesia\resources\views/auth/login.blade.php ENDPATH**/ ?>