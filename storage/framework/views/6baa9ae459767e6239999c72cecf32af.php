<?php $__env->startSection('title', 'Editar Usuario'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-8 animate-fade-in">
    <!-- Header con gradiente -->
    <div class="bg-gradient-to-r from-teal-600 to-teal-700 rounded-2xl shadow-lg p-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="bg-white/20 p-3 rounded-xl backdrop-blur-sm">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-white">Editar Usuario</h1>
                    <p class="text-teal-100 mt-1">Modifica la información del usuario</p>
                </div>
            </div>
            <a href="<?php echo e(route('users.index')); ?>" class="bg-white/20 hover:bg-white/30 text-white px-6 py-3 rounded-xl backdrop-blur-sm transition-all duration-200 flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span>Volver</span>
            </a>
        </div>
    </div>

    <!-- Formulario -->
    <div class="bg-white rounded-2xl shadow-xl p-8">
        <form action="<?php echo e(route('users.update', $user)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="space-y-6">
                <!-- Nombre Completo -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Nombre Completo
                    </label>
                    <input type="text" name="name" id="name" value="<?php echo e(old('name', $user->name)); ?>" required placeholder="Ej: Juan Pérez"
                        class="mt-1 block w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-100 transition-all duration-200 text-gray-900 placeholder-gray-400">
                    <?php $__errorArgs = ['name'];
                    $__bag = $errors->getBag($__errorArgs[1] ?? 'default');
                    if ($__bag->has($__errorArgs[0])) :
                        if (isset($message)) {
                            $__messageOriginal = $message;
                        }
                        $message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            <?php echo e($message); ?>

                        </p>
                    <?php unset($message);
                        if (isset($__messageOriginal)) {
                            $message = $__messageOriginal;
                        }
                    endif;
                    unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Nombre de Usuario -->
                <div>
                    <label for="username" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Nombre de Usuario (para login)
                    </label>
                    <input type="text" name="username" id="username" value="<?php echo e(old('username', $user->username)); ?>" required placeholder="Ej: juanperez"
                        class="mt-1 block w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-100 transition-all duration-200 text-gray-900 placeholder-gray-400">
                    <?php $__errorArgs = ['username'];
                    $__bag = $errors->getBag($__errorArgs[1] ?? 'default');
                    if ($__bag->has($__errorArgs[0])) :
                        if (isset($message)) {
                            $__messageOriginal = $message;
                        }
                        $message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            <?php echo e($message); ?>

                        </p>
                    <?php unset($message);
                        if (isset($__messageOriginal)) {
                            $message = $__messageOriginal;
                        }
                    endif;
                    unset($__errorArgs, $__bag); ?>
                    <p class="mt-2 text-xs text-gray-500 flex items-center">
                        <svg class="w-3 h-3 mr-1 text-teal-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                        Este nombre de usuario se usará para iniciar sesión.
                    </p>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Email (opcional)
                    </label>
                    <input type="email" name="email" id="email" value="<?php echo e(old('email', $user->email)); ?>" placeholder="Ej: juan@ejemplo.com"
                        class="mt-1 block w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-100 transition-all duration-200 text-gray-900 placeholder-gray-400">
                    <?php $__errorArgs = ['email'];
                    $__bag = $errors->getBag($__errorArgs[1] ?? 'default');
                    if ($__bag->has($__errorArgs[0])) :
                        if (isset($message)) {
                            $__messageOriginal = $message;
                        }
                        $message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            <?php echo e($message); ?>

                        </p>
                    <?php unset($message);
                        if (isset($__messageOriginal)) {
                            $message = $__messageOriginal;
                        }
                    endif;
                    unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Contraseña y Confirmación -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            Contraseña (dejar vacío para mantener)
                        </label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="mt-1 block w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-100 transition-all duration-200 text-gray-900 placeholder-gray-400">
                        <?php $__errorArgs = ['password'];
                        $__bag = $errors->getBag($__errorArgs[1] ?? 'default');
                        if ($__bag->has($__errorArgs[0])) :
                            if (isset($message)) {
                                $__messageOriginal = $message;
                            }
                            $message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                <?php echo e($message); ?>

                            </p>
                        <?php unset($message);
                            if (isset($__messageOriginal)) {
                                $message = $__messageOriginal;
                            }
                        endif;
                        unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Confirmar Contraseña
                        </label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••"
                            class="mt-1 block w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-100 transition-all duration-200 text-gray-900 placeholder-gray-400">
                    </div>
                </div>

                <!-- Teléfono -->
                <div>
                    <label for="telefono" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        Teléfono
                    </label>
                    <input type="text" name="telefono" id="telefono" value="<?php echo e(old('telefono', $user->telefono)); ?>" placeholder="Ej: +51 999 999 999"
                        class="mt-1 block w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-100 transition-all duration-200 text-gray-900 placeholder-gray-400">
                    <?php $__errorArgs = ['telefono'];
                    $__bag = $errors->getBag($__errorArgs[1] ?? 'default');
                    if ($__bag->has($__errorArgs[0])) :
                        if (isset($message)) {
                            $__messageOriginal = $message;
                        }
                        $message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            <?php echo e($message); ?>

                        </p>
                    <?php unset($message);
                        if (isset($__messageOriginal)) {
                            $message = $__messageOriginal;
                        }
                    endif;
                    unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Cargo -->
                <div>
                    <label for="cargo_id" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Cargo
                    </label>
                    <select name="cargo_id" id="cargo_id"
                        class="mt-1 block w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-100 transition-all duration-200 text-gray-900 bg-white">
                        <option value="">Seleccionar cargo</option>
                        <?php $__currentLoopData = $cargos;
                        $__env->addLoop($__currentLoopData);
                        foreach ($__currentLoopData as $cargo): $__env->incrementLoopIndices();
                            $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cargo->id); ?>" <?php echo e(old('cargo_id', $user->cargo_id) == $cargo->id ? 'selected' : ''); ?>><?php echo e($cargo->nombre); ?></option>
                        <?php endforeach;
                        $__env->popLoop();
                        $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['cargo_id'];
                    $__bag = $errors->getBag($__errorArgs[1] ?? 'default');
                    if ($__bag->has($__errorArgs[0])) :
                        if (isset($message)) {
                            $__messageOriginal = $message;
                        }
                        $message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            <?php echo e($message); ?>

                        </p>
                    <?php unset($message);
                        if (isset($__messageOriginal)) {
                            $message = $__messageOriginal;
                        }
                    endif;
                    unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Estado -->
                <div class="flex items-center p-4 bg-gray-50 rounded-xl">
                    <input type="checkbox" name="estado" id="estado" value="1" <?php echo e($user->estado ? 'checked' : ''); ?>

                        class="h-5 w-5 text-teal-600 focus:ring-teal-500 border-gray-300 rounded">
                    <label for="estado" class="ml-3 block text-sm font-medium text-gray-900 cursor-pointer">Usuario activo</label>
                </div>

                <!-- Botones -->
                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="<?php echo e(route('users.index')); ?>" class="px-6 py-3 border-2 border-gray-300 rounded-xl text-gray-700 hover:bg-gray-50 transition-all duration-200 flex items-center space-x-2 font-medium">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        <span>Cancelar</span>
                    </a>
                    <button type="submit" class="px-8 py-3 bg-gradient-to-r from-teal-600 to-teal-700 text-white rounded-xl hover:from-teal-700 hover:to-teal-800 transition-all duration-200 flex items-center space-x-2 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Actualizar Usuario</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistemaIglesia\sistemaIglesia\resources\views/users/edit.blade.php ENDPATH**/ ?>