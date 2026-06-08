<?php $__env->startSection('title', 'Asistencias'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6 animate-fade-in">
    <h1 class="text-3xl font-bold text-gray-900">Asistencias por Actividad</h1>

    <?php
        $asistenciasPorActividad = $asistencias->groupBy('actividad_id');
    ?>

    <?php $__currentLoopData = $asistenciasPorActividad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actividadId => $asistenciasGrupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $actividad = $asistenciasGrupo->first()->actividad;
            $asistentes = $asistenciasGrupo->where('asistio', true)->count();
            $total = $asistenciasGrupo->count();
        ?>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-white"><?php echo e($actividad->titulo); ?></h2>
                        <p class="text-green-200 text-sm"><?php echo e($actividad->fecha->format('d/m/Y')); ?> - <?php echo e($actividad->hora); ?></p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-center">
                            <p class="text-2xl font-bold text-white"><?php echo e($asistentes); ?>/<?php echo e($total); ?></p>
                            <p class="text-green-200 text-xs">Asistencia</p>
                        </div>
                        <a href="<?php echo e(route('actividades.show', $actividad)); ?>" class="bg-white text-green-600 px-4 py-2 rounded-lg hover:bg-green-50 transition-colors font-medium">
                            Ver Actividad
                        </a>
                    </div>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <?php $__currentLoopData = $asistenciasGrupo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asistencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-gray-50 rounded-lg p-4 hover:shadow-md transition-shadow duration-200">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold">
                                        <?php echo e(strtoupper(substr($asistencia->user->name, 0, 1))); ?>

                                    </div>
                                    <div>
                                        <a href="<?php echo e(route('users.show', $asistencia->user)); ?>" class="font-medium text-gray-900 hover:text-blue-600">
                                            <?php echo e($asistencia->user->name); ?>

                                        </a>
                                        <p class="text-xs text-gray-500"><?php echo e($asistencia->user->cargo->nombre ?? 'Sin cargo'); ?></p>
                                    </div>
                                </div>
                                <span class="px-3 py-1 text-xs font-medium rounded-full <?php echo e($asistencia->asistio ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'); ?>">
                                    <?php echo e($asistencia->asistio ? 'Asistió' : 'No asistió'); ?>

                                </span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-xs text-gray-500"><?php echo e($actividad->fecha->format('d/m/Y')); ?></span>

                                <div class="relative inline-block text-left">
                                    <button onclick="toggleDropdown('dropdown-asistencia-<?php echo e($asistencia->id); ?>')" class="p-1 rounded-full hover:bg-gray-200 transition-colors focus:outline-none">
                                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                        </svg>
                                    </button>

                                    <div id="dropdown-asistencia-<?php echo e($asistencia->id); ?>" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-50">
                                        <div class="py-1">
                                            <a href="<?php echo e(route('asistencias.show', $asistencia)); ?>" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                Ver Detalles
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <?php if($asistenciasGrupo->isEmpty()): ?>
                    <div class="text-center py-8 text-gray-500">
                        <p>No hay asistencias registradas para esta actividad</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if($asistenciasPorActividad->isEmpty()): ?>
        <div class="bg-white rounded-lg shadow-md p-8 text-center">
            <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
            </svg>
            <p class="text-gray-600">No hay asistencias registradas</p>
        </div>
    <?php endif; ?>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
    function toggleDropdown(dropdownId) {
        // Cerrar todos los dropdowns abiertos
        document.querySelectorAll('[id^="dropdown-"]').forEach(dropdown => {
            if (dropdown.id !== dropdownId) {
                dropdown.classList.add('hidden');
            }
        });

        // Toggle el dropdown seleccionado
        const dropdown = document.getElementById(dropdownId);
        dropdown.classList.toggle('hidden');
    }

    // Cerrar dropdowns al hacer clic fuera de ellos
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.relative.inline-block')) {
            document.querySelectorAll('[id^="dropdown-"]').forEach(dropdown => {
                dropdown.classList.add('hidden');
            });
        }
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistemaIglesia\sistemaIglesia\resources\views/asistencias/index.blade.php ENDPATH**/ ?>