<?php $__env->startSection('title', 'Mis Actividades'); ?>

<?php $__env->startSection('content'); ?>

<div class="space-y-6 animate-fade-in">

    
    <div class="bg-gradient-to-r from-[#C8A26E] to-[#A97142] rounded-2xl shadow-lg p-5 md:p-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3 md:gap-4">
                <div class="bg-white/20 p-2.5 md:p-3 rounded-xl backdrop-blur-sm shrink-0">
                    <svg class="w-6 h-6 md:w-8 md:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl md:text-3xl font-bold text-white leading-tight">Mis Actividades</h1>
                </div>
            </div>
            <a href="<?php echo e(route('actividades.create')); ?>"
               class="bg-white/20 hover:bg-white/30 text-white px-4 md:px-6 py-2.5 md:py-3 rounded-xl backdrop-blur-sm transition-all duration-200 flex items-center gap-2 text-sm md:text-base font-medium">
                <svg class="w-4 h-4 md:w-5 md:h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                <span class="hidden sm:inline">Nueva Actividad</span>
                <span class="sm:hidden">Nueva</span>
            </a>
        </div>
    </div>

    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <?php $__empty_1 = true; $__currentLoopData = $actividades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actividad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

            <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition p-5 border border-[#E9D8B6]">

                
                <h2 class="text-lg font-bold text-gray-900 mb-2">
                    <?php echo e($actividad->titulo); ?>

                </h2>

                
                <div class="space-y-1 text-sm text-gray-600">
                    <p>📅 <?php echo e($actividad->fecha->format('d/m/Y')); ?></p>
                    <p>⏰ <?php echo e($actividad->hora); ?></p>
                    <p>📍 <?php echo e($actividad->lugar ?? 'Sin lugar'); ?></p>
                </div>

                
                <div class="mt-3">
                    <span class="px-3 py-1 text-xs rounded-full font-medium
                        <?php echo e($actividad->estado === 'pendiente'
                            ? 'bg-[#E9D8B6] text-[#A97142]'
                            : ($actividad->estado === 'en_proceso'
                                ? 'bg-[#C8A26E] text-white'
                                : 'bg-[#E9D8B6] text-[#A97142]')); ?>">
                        <?php echo e(ucfirst(str_replace('_',' ',$actividad->estado))); ?>

                    </span>
                </div>

                
                <div class="mt-4 flex gap-2">

                    <a href="<?php echo e(route('actividades.show', $actividad->id)); ?>"
                       class="flex-1 text-center bg-[#FAF8F5] hover:bg-[#E9D8B6] py-2 rounded-lg text-sm text-gray-700 transition">
                        Ver
                    </a>

                    <a href="<?php echo e(route('actividades.edit', $actividad->id)); ?>"
                       class="flex-1 text-center bg-[#E9D8B6] hover:bg-[#C8A26E] py-2 rounded-lg text-sm text-[#A97142] hover:text-white transition">
                        Editar
                    </a>

                    <form action="<?php echo e(route('actividades.destroy', $actividad->id)); ?>"
                          method="POST"
                          onsubmit="return confirm('¿Eliminar actividad?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-2 rounded-lg text-sm">
                            X
                        </button>
                    </form>

                </div>

            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <div class="col-span-full text-center py-10 text-gray-500 bg-white rounded-2xl border border-[#E9D8B6]">
                No tienes actividades registradas.
            </div>

        <?php endif; ?>

    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistemaIglesia\sistemaIglesia\resources\views/actividades/mis.blade.php ENDPATH**/ ?>