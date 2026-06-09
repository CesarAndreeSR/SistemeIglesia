<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - San Martin App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-900 via-blue-700 to-indigo-800">
    <!-- Header -->
    
    <!-- Card -->
    <div class="w-full max-w-md bg-white/95 backdrop-blur-md rounded-2xl shadow-2xl p-8">
        <div class="text-center mb-8">

        <h1 class="text-3xl font-bold text-gray-800">San Martin App</h1>
        <p class="text-gray-500 text-sm mt-1">Crea tu cuenta para comenzar</p>
    </div>
        <!-- Errores -->
        <?php if($errors->any()): ?>
        <div class="mb-4 p-3 bg-red-50 border border-red-200 text-red-600 rounded-lg text-sm">
            <?php echo e($errors->first()); ?>

        </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('register.post')); ?>" class="space-y-4">
            <?php echo csrf_field(); ?>

            <!-- Nombre -->
            <div>
                <label class="text-sm font-medium text-gray-700">Nombre completo</label>
                <input type="text" name="name" value="<?php echo e(old('name')); ?>" required
                    class="w-full mt-1 px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                    placeholder="Ej: Cesar Andrés">
            </div>

            <!-- Usuario -->
            <div>
                <label class="text-sm font-medium text-gray-700">Nombre de usuario</label>
                <input type="text" name="username" value="<?php echo e(old('username')); ?>" required
                    class="w-full mt-1 px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                    placeholder="Ej: cesar123">
            </div>

            <!-- Password -->
            <div>
                <label class="text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" name="password" required
                    class="w-full mt-1 px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                    placeholder="••••••••">
            </div>

            <!-- Confirm -->
            <div>
                <label class="text-sm font-medium text-gray-700">Confirmar contraseña</label>
                <input type="password" name="password_confirmation" required
                    class="w-full mt-1 px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                    placeholder="••••••••">
            </div>

            <!-- Botón -->
            <button type="submit"
                class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-2.5 rounded-lg font-semibold shadow-md hover:shadow-lg hover:scale-[1.02] transition transform">
                Crear cuenta
            </button>

            <!-- Login -->
            <p class="text-center text-sm text-gray-500 mt-4">
                ¿Ya tienes cuenta?
                <a href="<?php echo e(route('login')); ?>"
                    class="text-blue-600 font-medium hover:text-blue-800">
                    Inicia sesión
                </a>
            </p>

        </form>
    </div>

</body>

</html><?php /**PATH C:\xampp\htdocs\sistemaIglesia\sistemaIglesia\resources\views/auth/register.blade.php ENDPATH**/ ?>