


<?php $__env->startSection('title', 'Mis Actividades'); ?>

<?php $__env->startSection('content'); ?>

<div class="space-y-6">

    
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <h1 class="text-3xl font-bold text-gray-900">Mis Actividades</h1>

        <a href="<?php echo e(route('actividades.create')); ?>"
           class="mt-4 sm:mt-0 bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
            + Nueva Actividad
        </a>
    </div>

    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <?php $__empty_1 = true; $__currentLoopData = $actividades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actividad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

            <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition p-5 border border-gray-100">

                
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
                            ? 'bg-yellow-100 text-yellow-800'
                            : ($actividad->estado === 'en_proceso'
                                ? 'bg-blue-100 text-blue-800'
                                : 'bg-green-100 text-green-800')); ?>">
                        <?php echo e(ucfirst(str_replace('_',' ',$actividad->estado))); ?>

                    </span>
                </div>

                
                <div class="mt-4 flex gap-2">

                    <a href="<?php echo e(route('actividades.show', $actividad->id)); ?>"
                       class="flex-1 text-center bg-gray-100 hover:bg-gray-200 py-2 rounded-lg text-sm">
                        Ver
                    </a>

                    <a href="<?php echo e(route('actividades.edit', $actividad->id)); ?>"
                       class="flex-1 text-center bg-indigo-100 hover:bg-indigo-200 py-2 rounded-lg text-sm">
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

            <div class="col-span-full text-center py-10 text-gray-500">
                No tienes actividades registradas.
            </div>

        <?php endif; ?>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistemaIglesia\sistemaIglesia\resources\views/actividades/mis.blade.php ENDPATH**/ ?>