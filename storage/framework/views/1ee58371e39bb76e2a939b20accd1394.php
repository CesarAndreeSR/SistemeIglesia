<?php $__env->startSection('title', 'Evidencias'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6 animate-fade-in">
    <h1 class="text-3xl font-bold text-gray-900">Evidencias por Actividad</h1>

    <?php
        $evidenciasPorActividad = $evidencias->groupBy('actividad_id');
    ?>

    <?php $__currentLoopData = $evidenciasPorActividad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actividadId => $evidenciasGrupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $actividad = $evidenciasGrupo->first()->actividad;
        ?>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-white"><?php echo e($actividad->titulo); ?></h2>
                        <p class="text-purple-200 text-sm"><?php echo e($actividad->fecha->format('d/m/Y')); ?> - <?php echo e($actividad->hora); ?></p>
                    </div>
                    <a href="<?php echo e(route('actividades.show', $actividad)); ?>" class="bg-white text-purple-600 px-4 py-2 rounded-lg hover:bg-purple-50 transition-colors font-medium">
                        Ver Actividad
                    </a>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php $__currentLoopData = $evidenciasGrupo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evidencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-gray-50 rounded-lg overflow-hidden hover:shadow-md transition-shadow duration-200">
                            <?php if($evidencia->tipo === 'imagen'): ?>
                                <a href="<?php echo e(route('evidencias.show', $evidencia)); ?>" class="block">
                                    <img src="<?php echo e(Storage::url($evidencia->archivo)); ?>" alt="<?php echo e($evidencia->descripcion ?? 'Evidencia'); ?>" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-200 cursor-pointer" onerror="this.src='https://via.placeholder.com/400x300?text=No+Image';">
                                </a>
                            <?php else: ?>
                                <div class="w-full h-48 bg-red-50 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            <?php endif; ?>

                            <div class="p-4">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full <?php echo e($evidencia->tipo === 'imagen' ? 'bg-purple-100 text-purple-800' : 'bg-red-100 text-red-800'); ?>">
                                        <?php echo e(ucfirst($evidencia->tipo)); ?>

                                    </span>
                                    <span class="text-xs text-gray-500"><?php echo e($evidencia->created_at->format('d/m/Y')); ?></span>
                                </div>

                                <?php if($evidencia->descripcion): ?>
                                    <p class="text-sm text-gray-600 mb-3 line-clamp-2"><?php echo e($evidencia->descripcion); ?></p>
                                <?php endif; ?>

                                <div class="flex items-center justify-between">
                                    <div class="text-xs text-gray-500">
                                        <span class="font-medium">Subido por:</span> <?php echo e($evidencia->subidor->name ?? 'N/A'); ?>

                                    </div>

                                    <div class="relative inline-block text-left">
                                        <button onclick="toggleDropdown('dropdown-evidencia-<?php echo e($evidencia->id); ?>')" class="p-1 rounded-full hover:bg-gray-200 transition-colors focus:outline-none">
                                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                            </svg>
                                        </button>

                                        <div id="dropdown-evidencia-<?php echo e($evidencia->id); ?>" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-50">
                                            <div class="py-1">
                                                <a href="<?php echo e(route('evidencias.show', $evidencia)); ?>" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                    Ver
                                                </a>
                                                <a href="<?php echo e(route('evidencias.download', $evidencia)); ?>" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-600 transition-colors">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                                    </svg>
                                                    Descargar
                                                </a>
                                                <form action="<?php echo e(route('evidencias.destroy', $evidencia)); ?>" method="POST" onsubmit="return confirm('¿Está seguro de eliminar esta evidencia?');">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors">
                                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                        Eliminar
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <?php if($evidenciasGrupo->isEmpty()): ?>
                    <div class="text-center py-8 text-gray-500">
                        <p>No hay evidencias para esta actividad</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if($evidenciasPorActividad->isEmpty()): ?>
        <div class="bg-white rounded-lg shadow-md p-8 text-center">
            <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <p class="text-gray-600">No hay evidencias registradas</p>
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistemaIglesia\sistemaIglesia\resources\views/evidencias/index.blade.php ENDPATH**/ ?>