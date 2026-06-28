<?php $__env->startSection('title', 'Iglesia San Marteen - Inicio'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-4 md:space-y-6 animate-fade-in">

    <!-- Bienvenida -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <h1 class="text-2xl md:text-3xl font-bold text-[#1F2937]">Inicio</h1>
        <p class="text-gray-500 mt-1 sm:mt-0 text-sm md:text-base">
            Bienvenido, <?php echo e(auth()->user()->name); ?>

        </p>
    </div>

    <!-- Tarjetas de estadísticas -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-6">

        <div class="bg-gradient-to-br from-[#C8A26E] to-[#A97142] rounded-2xl shadow-lg p-4 md:p-6 text-white transition-all duration-300 hover:shadow-xl hover:-translate-y-1 active:scale-95">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs md:text-sm text-[#E9D8B6]">Total Actividades</p>
                    <p class="text-2xl md:text-3xl font-bold mt-0.5"><?php echo e($totalActividades ?? 0); ?></p>
                </div>
                <div class="bg-white/20 p-2 md:p-3 rounded-xl shrink-0">
                    <svg class="w-5 h-5 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-[#E9D8B6] to-[#C8A26E] rounded-2xl shadow-lg p-4 md:p-6 text-[#1F2937] transition-all duration-300 hover:shadow-xl hover:-translate-y-1 active:scale-95">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs md:text-sm text-[#A97142]">Pendientes</p>
                    <p class="text-2xl md:text-3xl font-bold mt-0.5"><?php echo e($actividadesPendientes ?? 0); ?></p>
                </div>
                <div class="bg-white/30 p-2 md:p-3 rounded-xl shrink-0">
                    <svg class="w-5 h-5 md:w-8 md:h-8 text-[#A97142]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-2xl shadow-lg p-4 md:p-6 text-white transition-all duration-300 hover:shadow-xl hover:-translate-y-1 active:scale-95">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs md:text-sm text-emerald-100">Finalizadas</p>
                    <p class="text-2xl md:text-3xl font-bold mt-0.5"><?php echo e($actividadesFinalizadas ?? 0); ?></p>
                </div>
                <div class="bg-white/20 p-2 md:p-3 rounded-xl shrink-0">
                    <svg class="w-5 h-5 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-purple-400 to-purple-600 rounded-2xl shadow-lg p-4 md:p-6 text-white transition-all duration-300 hover:shadow-xl hover:-translate-y-1 active:scale-95">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs md:text-sm text-purple-100">Usuarios Activos</p>
                    <p class="text-2xl md:text-3xl font-bold mt-0.5"><?php echo e($totalUsuarios ?? 0); ?></p>
                </div>
                <div class="bg-white/20 p-2 md:p-3 rounded-xl shrink-0">
                    <svg class="w-5 h-5 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
            </div>
        </div>

    </div>

    <!-- Próximos Eventos -->
    <div class="bg-white rounded-2xl shadow-lg p-5 md:p-6 border border-[#E9D8B6]">
        <h2 class="text-lg md:text-xl font-bold text-[#1F2937] mb-4 flex items-center gap-2">
            <svg class="w-5 h-5 md:w-6 md:h-6 text-[#C8A26E] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            Próximos Eventos
        </h2>

        <?php if(isset($proximosEventos) && $proximosEventos->count() > 0): ?>
            <div class="space-y-3">
                <?php $__currentLoopData = $proximosEventos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('actividades.show', $evento)); ?>"
                        class="block p-4 bg-gradient-to-r from-[#FAF8F5] to-[#E9D8B6]/30 rounded-xl hover:from-[#E9D8B6]/30 hover:to-[#C8A26E]/20 active:from-[#E9D8B6]/50 active:to-[#C8A26E]/30 transition-all duration-300 hover:shadow-md border border-[#E9D8B6]/50">
                        <div class="flex items-start justify-between gap-3">
                            <div class="min-w-0">
                                <h3 class="font-semibold text-[#1F2937] text-sm md:text-base truncate">
                                    <?php echo e($evento->titulo); ?>

                                </h3>
                                <p class="text-xs md:text-sm text-[#A97142] mt-0.5">
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
                                    ? 'bg-[#E9D8B6] text-[#A97142]'
                                    : ($evento->estado === 'en_proceso'
                                        ? 'bg-[#C8A26E]/20 text-[#A97142]'
                                        : 'bg-emerald-100 text-emerald-800')); ?>">
                                <?php echo e(ucfirst(str_replace('_', ' ', $evento->estado))); ?>

                            </span>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="text-center py-8 md:py-12">
                <svg class="w-12 h-12 md:w-16 md:h-16 mx-auto text-[#E9D8B6] mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <p class="text-gray-500 text-sm">No hay próximos eventos programados.</p>
            </div>
        <?php endif; ?>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistemaIglesia\sistemaIglesia\resources\views/dashboard/index.blade.php ENDPATH**/ ?>