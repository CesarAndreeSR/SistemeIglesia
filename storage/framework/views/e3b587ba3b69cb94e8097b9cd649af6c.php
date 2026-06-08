<?php $__env->startSection('title', 'Ver Usuario'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-bold text-gray-900">Detalle del Usuario</h1>
        <div class="space-x-3">
            <a href="<?php echo e(route('users.edit', $user)); ?>" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                Editar
            </a>
            <a href="<?php echo e(route('users.index')); ?>" class="text-blue-600 hover:text-blue-900">Volver</a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-500">Nombre Completo</label>
                <p class="text-lg font-semibold text-gray-900"><?php echo e($user->name); ?></p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Nombre de Usuario</label>
                <p class="text-lg font-semibold text-blue-600"><?php echo e($user->username ?? '-'); ?></p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Email</label>
                <p class="text-gray-900"><?php echo e($user->email ?? 'No registrado'); ?></p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Teléfono</label>
                <p class="text-gray-900"><?php echo e($user->telefono ?? 'No registrado'); ?></p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Cargo</label>
                <p class="text-gray-900"><?php echo e($user->cargo->nombre ?? 'Sin cargo asignado'); ?></p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Estado</label>
                <span class="px-3 py-1 text-xs font-medium rounded-full <?php echo e($user->estado ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'); ?>">
                    <?php echo e($user->estado ? 'Activo' : 'Inactivo'); ?>

                </span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Actividades Asignadas</h2>
            <?php if($user->actividadesAsignadas->count() > 0): ?>
                <div class="space-y-3">
                    <?php $__currentLoopData = $user->actividadesAsignadas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actividad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('actividades.show', $actividad)); ?>" class="block p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                            <h3 class="font-semibold text-gray-900"><?php echo e($actividad->titulo); ?></h3>
                            <p class="text-sm text-gray-600"><?php echo e($actividad->fecha->format('d/m/Y')); ?> - <?php echo e($actividad->hora); ?></p>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <p class="text-gray-500 text-center py-8">No hay actividades asignadas.</p>
            <?php endif; ?>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Historial de Asistencia</h2>
            <?php if($user->asistencias->count() > 0): ?>
                <div class="space-y-3">
                    <?php $__currentLoopData = $user->asistencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asistencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('actividades.show', $asistencia->actividad)); ?>" class="block p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="font-semibold text-gray-900"><?php echo e($asistencia->actividad->titulo); ?></h3>
                                    <p class="text-sm text-gray-600"><?php echo e($asistencia->actividad->fecha->format('d/m/Y')); ?></p>
                                </div>
                                <span class="px-3 py-1 text-xs font-medium rounded-full <?php echo e($asistencia->asistio ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'); ?>">
                                    <?php echo e($asistencia->asistio ? 'Asistió' : 'No asistió'); ?>

                                </span>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <p class="text-gray-500 text-center py-8">No hay registros de asistencia.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistemaIglesia\sistemaIglesia\resources\views/users/show.blade.php ENDPATH**/ ?>