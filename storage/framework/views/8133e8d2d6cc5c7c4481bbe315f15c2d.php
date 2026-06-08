<?php $__env->startSection('title', 'Usuarios'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-4 md:space-y-6 animate-fade-in">

    <!-- Header -->
    <div class="bg-gradient-to-r from-emerald-600 to-emerald-700 rounded-2xl shadow-lg p-5 md:p-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3 md:gap-4">
                <div class="bg-white/20 p-2.5 md:p-3 rounded-xl backdrop-blur-sm shrink-0">
                    <svg class="w-6 h-6 md:w-8 md:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl md:text-3xl font-bold text-white leading-tight">Usuarios</h1>
                    <p class="text-emerald-100 text-xs md:text-base mt-0.5">Gestión de usuarios del sistema</p>
                </div>
            </div>
            <a href="<?php echo e(route('users.create')); ?>"
                class="bg-white/20 hover:bg-white/30 active:bg-white/40 text-white px-4 md:px-6 py-2.5 md:py-3 rounded-xl backdrop-blur-sm transition-all duration-200 flex items-center gap-2 text-sm md:text-base font-medium">
                <svg class="w-4 h-4 md:w-5 md:h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                <span class="hidden sm:inline">Nuevo Usuario</span>
                <span class="sm:hidden">Nuevo</span>
            </a>
        </div>
    </div>

    <!-- Vista móvil: tarjetas -->
    <div class="md:hidden space-y-3">
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-start justify-between gap-3">
                <!-- Avatar + info -->
                <div class="flex items-center gap-3 min-w-0">
                    <div class="bg-emerald-100 text-emerald-700 rounded-full w-10 h-10 flex items-center justify-center font-bold text-sm shrink-0">
                        <?php echo e(strtoupper(substr($user->name, 0, 1))); ?>

                    </div>
                    <div class="min-w-0">
                        <p class="font-semibold text-gray-900 text-sm truncate"><?php echo e($user->name); ?></p>
                        <p class="text-xs text-blue-600 truncate">{{ $user->username ?? '-' }}</p>
                        <?php if($user->email): ?>
                            <p class="text-xs text-gray-400 truncate"><?php echo e($user->email); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Badge estado -->
                <span class="shrink-0 px-2.5 py-1 text-xs font-medium rounded-full
                    <?php echo e($user->estado ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'); ?>">
                    <?php echo e($user->estado ? 'Activo' : 'Inactivo'); ?>

                </span>
            </div>

            <!-- Cargo -->
            <?php if($user->cargo): ?>
            <div class="mt-3 flex items-center gap-1.5 text-xs text-gray-500">
                <svg class="w-3.5 h-3.5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <?php echo e($user->cargo->nombre); ?>

            </div>
            <?php endif; ?>

            <!-- Acciones en fila -->
            <div class="mt-3 pt-3 border-t border-gray-100 flex items-center gap-2">
                <a href="<?php echo e(route('users.show', $user)); ?>"
                    class="flex-1 text-center py-2 text-xs font-medium text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-lg transition">
                    Ver
                </a>
                <a href="<?php echo e(route('users.edit', $user)); ?>"
                    class="flex-1 text-center py-2 text-xs font-medium text-indigo-600 bg-indigo-50 hover:bg-indigo-100 rounded-lg transition">
                    Editar
                </a>
                <form action="<?php echo e(route('users.toggle-status', $user)); ?>" method="POST"
                    onsubmit="return confirm('¿Cambiar estado del usuario?');" class="flex-1">
                    <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                    <button type="submit"
                        class="w-full py-2 text-xs font-medium text-yellow-600 bg-yellow-50 hover:bg-yellow-100 rounded-lg transition">
                        <?php echo e($user->estado ? 'Desactivar' : 'Activar'); ?>

                    </button>
                </form>
                <form action="<?php echo e(route('users.destroy', $user)); ?>" method="POST"
                    onsubmit="return confirm('¿Eliminar este usuario?');" class="flex-1">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button type="submit"
                        class="w-full py-2 text-xs font-medium text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition">
                        Eliminar
                    </button>
                </form>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if($users->isEmpty()): ?>
        <div class="text-center py-12 bg-white rounded-xl">
            <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
            <p class="text-gray-500 text-sm">No hay usuarios registrados.</p>
        </div>
        <?php endif; ?>
    </div>

    <!-- Vista desktop: tabla -->
    <div class="hidden md:block bg-white rounded-2xl shadow-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cargo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center gap-3">
                            <div class="bg-emerald-100 text-emerald-700 rounded-full w-8 h-8 flex items-center justify-center font-bold text-xs shrink-0">
                                <?php echo e(strtoupper(substr($user->name, 0, 1))); ?>

                            </div>
                            <span class="text-sm font-medium text-gray-900"><?php echo e($user->name); ?></span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="text-sm font-medium text-blue-600"><?php echo e($user->username ?? '-'); ?></span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="text-sm text-gray-500"><?php echo e($user->email ?? '-'); ?></span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="text-sm text-gray-500"><?php echo e($user->cargo->nombre ?? '-'); ?></span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2.5 py-1 text-xs font-medium rounded-full
                            <?php echo e($user->estado ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'); ?>">
                            <?php echo e($user->estado ? 'Activo' : 'Inactivo'); ?>

                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium relative">
                        <div class="relative inline-block text-left">
                            <button onclick="toggleDropdown('dropdown-user-<?php echo e($user->id); ?>')"
                                class="p-2 rounded-full hover:bg-gray-100 transition-colors focus:outline-none">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                                </svg>
                            </button>
                            <div id="dropdown-user-<?php echo e($user->id); ?>"
                                class="hidden absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-100 z-50">
                                <div class="py-1">
                                    <a href="<?php echo e(route('users.show', $user)); ?>"
                                        class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        Ver
                                    </a>
                                    <a href="<?php echo e(route('users.edit', $user)); ?>"
                                        class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        Editar
                                    </a>
                                    <form action="<?php echo e(route('users.toggle-status', $user)); ?>" method="POST"
                                        onsubmit="return confirm('¿Cambiar estado del usuario?');">
                                        <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                                        <button type="submit"
                                            class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 transition-colors">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                                            </svg>
                                            <?php echo e($user->estado ? 'Desactivar' : 'Activar'); ?>

                                        </button>
                                    </form>
                                    <form action="<?php echo e(route('users.destroy', $user)); ?>" method="POST"
                                        onsubmit="return confirm('¿Está seguro de eliminar este usuario?');">
                                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                        <button type="submit"
                                            class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if($users->isEmpty()): ?>
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-500 text-sm">
                        No hay usuarios registrados.
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistemaIglesia\sistemaIglesia\resources\views/users/index.blade.php ENDPATH**/ ?>