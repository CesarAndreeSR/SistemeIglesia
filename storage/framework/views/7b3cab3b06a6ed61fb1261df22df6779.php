<?php $__env->startSection('title', 'San Martin App - Inicio'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-4 md:space-y-6 animate-fade-in">

    <!-- Bienvenida -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Inicio</h1>
        <p class="text-gray-500 mt-1 sm:mt-0 text-sm md:text-base">
            Bienvenido, <?php echo e(auth()->user()->name); ?>

        </p>
    </div>

    <!-- Tarjetas de estadísticas -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-6">

        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg p-4 md:p-6 text-white transition-all duration-300 hover:shadow-xl active:scale-95">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs md:text-sm text-blue-100">Total Actividades</p>
                    <p class="text-2xl md:text-3xl font-bold mt-0.5"><?php echo e($totalActividades ?? 0); ?></p>
                </div>
                <div class="bg-white/20 p-2 md:p-3 rounded-full shrink-0">
                    <svg class="w-5 h-5 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl shadow-lg p-4 md:p-6 text-white transition-all duration-300 hover:shadow-xl active:scale-95">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs md:text-sm text-yellow-100">Pendientes</p>
                    <p class="text-2xl md:text-3xl font-bold mt-0.5"><?php echo e($actividadesPendientes ?? 0); ?></p>
                </div>
                <div class="bg-white/20 p-2 md:p-3 rounded-full shrink-0">
                    <svg class="w-5 h-5 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl shadow-lg p-4 md:p-6 text-white transition-all duration-300 hover:shadow-xl active:scale-95">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs md:text-sm text-green-100">Finalizadas</p>
                    <p class="text-2xl md:text-3xl font-bold mt-0.5"><?php echo e($actividadesFinalizadas ?? 0); ?></p>
                </div>
                <div class="bg-white/20 p-2 md:p-3 rounded-full shrink-0">
                    <svg class="w-5 h-5 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl shadow-lg p-4 md:p-6 text-white transition-all duration-300 hover:shadow-xl active:scale-95">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs md:text-sm text-purple-100">Usuarios Activos</p>
                    <p class="text-2xl md:text-3xl font-bold mt-0.5"><?php echo e($totalUsuarios ?? 0); ?></p>
                </div>
                <div class="bg-white/20 p-2 md:p-3 rounded-full shrink-0">
                    <svg class="w-5 h-5 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
            </div>
        </div>

    </div>

    <!-- Próximos Eventos -->
    <div class="bg-white rounded-xl shadow-lg p-5 md:p-6">
        <h2 class="text-lg md:text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
            <svg class="w-5 h-5 md:w-6 md:h-6 text-blue-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            Próximos Eventos
        </h2>

        <?php if(isset($proximosEventos) && $proximosEventos->count() > 0): ?>
            <div class="space-y-3">
                <?php $__currentLoopData = $proximosEventos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('actividades.show', $evento)); ?>"
                        class="block p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-lg hover:from-blue-50 hover:to-blue-100 active:from-blue-100 active:to-blue-200 transition-all duration-300 hover:shadow-md">
                        <div class="flex items-start justify-between gap-3">
                            <div class="min-w-0">
                                <h3 class="font-semibold text-gray-900 text-sm md:text-base truncate">
                                    <?php echo e($evento->titulo); ?>

                                </h3>
                                <p class="text-xs md:text-sm text-gray-600 mt-0.5">
                                    <?php echo e($evento->fecha->format('d/m/Y')); ?> - <?php echo e($evento->hora); ?>

                                </p>
                                <?php if($evento->lugar): ?>
                                    <p class="text-xs md:text-sm text-gray-500 mt-0.5 truncate">
                                        <?php echo e($evento->lugar); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                            <span class="shrink-0 px-2.5 py-1 text-xs font-medium rounded-full
                                <?php echo e($evento->estado === 'pendiente'
                                    ? 'bg-yellow-100 text-yellow-800'
                                    : ($evento->estado === 'en_proceso'
                                        ? 'bg-blue-100 text-blue-800'
                                        : 'bg-green-100 text-green-800')); ?>">
                                <?php echo e(ucfirst(str_replace('_', ' ', $evento->estado))); ?>

                            </span>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="text-center py-8 md:py-12">
                <svg class="w-12 h-12 md:w-16 md:h-16 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <p class="text-gray-500 text-sm">No hay próximos eventos programados.</p>
            </div>
        <?php endif; ?>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistemaIglesia\sistemaIglesia\resources\views/dashboard/index.blade.php ENDPATH**/ ?>