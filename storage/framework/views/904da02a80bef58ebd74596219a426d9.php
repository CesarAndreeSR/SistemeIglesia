<?php $__env->startSection('title', 'Actividades'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6 animate-fade-in">
    <!-- Header -->
    <div class="bg-gradient-to-r from-[#C8A26E] to-[#A97142] rounded-2xl shadow-lg p-5 md:p-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3 md:gap-4">
                <div class="bg-white/20 p-2.5 md:p-3 rounded-xl backdrop-blur-sm shrink-0">
                    <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl md:text-2xl font-bold text-white">Actividades</h1>
                </div>
            </div>
            <a href="<?php echo e(route('actividades.create')); ?>"
                class="bg-white/20 hover:bg-white/30 active:bg-white/40 text-white px-4 md:px-6 py-2.5 md:py-3 rounded-xl backdrop-blur-sm transition-all duration-300 flex items-center gap-2 text-sm md:text-base font-medium">
                <svg class="w-4 h-4 md:w-5 md:h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                <span class="hidden sm:inline">Nueva Actividad</span>
                <span class="sm:hidden">Nueva</span>
            </a>
        </div>
    </div>

    <!-- Tabla -->
    <div class="bg-white rounded-2xl shadow-lg overflow-visible border border-[#E9D8B6]">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-[#E9D8B6]">
                <thead class="bg-[#FAF8F5]">
                    <tr>
                        <th class="px-4 md:px-6 py-3 text-left text-xs font-medium text-[#A97142] uppercase tracking-wider">Título</th>
                        <th class="px-4 md:px-6 py-3 text-left text-xs font-medium text-[#A97142] uppercase tracking-wider hidden sm:table-cell">Fecha</th>
                        <th class="px-4 md:px-6 py-3 text-left text-xs font-medium text-[#A97142] uppercase tracking-wider hidden md:table-cell">Hora</th>
                        <th class="px-4 md:px-6 py-3 text-left text-xs font-medium text-[#A97142] uppercase tracking-wider hidden lg:table-cell">Lugar</th>
                        <th class="px-4 md:px-6 py-3 text-left text-xs font-medium text-[#A97142] uppercase tracking-wider">Estado</th>
                        <th class="px-4 md:px-6 py-3 text-right text-xs font-medium text-[#A97142] uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-[#E9D8B6]">
                    <?php $__currentLoopData = $actividades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actividad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="hover:bg-[#FAF8F5] transition-colors duration-200">
                            <td class="px-4 md:px-6 py-4">
                                <div class="text-sm font-medium text-[#1F2937]"><?php echo e($actividad->titulo); ?></div>
                            </td>
                            <td class="px-4 md:px-6 py-4 whitespace-nowrap hidden sm:table-cell">
                                <div class="text-sm text-gray-500"><?php echo e($actividad->fecha->format('d/m/Y')); ?></div>
                            </td>
                            <td class="px-4 md:px-6 py-4 whitespace-nowrap hidden md:table-cell">
                                <div class="text-sm text-gray-500"><?php echo e($actividad->hora); ?></div>
                            </td>
                            <td class="px-4 md:px-6 py-4 whitespace-nowrap hidden lg:table-cell">
                                <div class="text-sm text-gray-500"><?php echo e($actividad->lugar ?? '-'); ?></div>
                            </td>
                            <td class="px-4 md:px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-medium rounded-full <?php echo e($actividad->estado === 'pendiente' ? 'bg-[#E9D8B6] text-[#A97142]' : ($actividad->estado === 'en_proceso' ? 'bg-[#C8A26E]/20 text-[#A97142]' : 'bg-[#E9D8B6] text-[#A97142]')); ?>">
                                    <?php echo e(ucfirst(str_replace('_', ' ', $actividad->estado))); ?>

                                </span>
                            </td>
                            <td class="px-4 md:px-6 py-4 whitespace-nowrap text-right text-sm font-medium relative">
                                <div class="relative inline-block text-left">
                                    <button onclick="toggleDropdown('dropdown-<?php echo e($actividad->id); ?>')" class="p-2 rounded-full hover:bg-[#FAF8F5] transition-colors focus:outline-none">
                                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                        </svg>
                                    </button>

                                    <div id="dropdown-<?php echo e($actividad->id); ?>" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-[#E9D8B6] z-50">
                                        <div class="py-1">
                                            <a href="<?php echo e(route('actividades.show', ['actividad' => $actividad->id])); ?>" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-[#FAF8F5] hover:text-[#C8A26E] transition-colors">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                Ver
                                            </a>
                                            <a href="<?php echo e(route('actividades.edit', ['actividad' => $actividad->id])); ?>" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-[#FAF8F5] hover:text-[#A97142] transition-colors">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                Editar
                                            </a>
                                            <form action="<?php echo e(route('actividades.destroy', ['actividad' => $actividad->id])); ?>" method="POST" onsubmit="return confirm('¿Está seguro de eliminar esta actividad?');">
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
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistemaIglesia\sistemaIglesia\resources\views/actividades/index.blade.php ENDPATH**/ ?>