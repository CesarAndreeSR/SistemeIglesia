<?php $__env->startSection('title', 'Crear Cargo'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-4 md:space-y-6 animate-fade-in">

    <!-- Header -->
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl shadow-lg p-5 md:p-8">
        <!-- Botón volver arriba en móvil -->
        <div class="flex items-center justify-between mb-4 md:mb-0">
            <a href="<?php echo e(route('cargos.index')); ?>"
                class="bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded-xl backdrop-blur-sm transition-all duration-200 flex items-center gap-2 text-sm md:hidden">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Volver
            </a>
            <!-- Spacer para móvil -->
            <div class="md:hidden"></div>
        </div>

        <!-- Contenido del header -->
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3 md:gap-4">
                <div class="bg-white/20 p-2.5 md:p-3 rounded-xl backdrop-blur-sm shrink-0">
                    <svg class="w-6 h-6 md:w-8 md:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl md:text-3xl font-bold text-white leading-tight">
                        Crear Nuevo Cargo
                    </h1>
                    <p class="text-blue-100 mt-0.5 text-xs md:text-base">
                        Registra un nuevo cargo para la gestión de la iglesia
                    </p>
                </div>
            </div>

            <!-- Botón volver — solo en desktop -->
            <a href="<?php echo e(route('cargos.index')); ?>"
                class="hidden md:flex bg-white/20 hover:bg-white/30 text-white px-6 py-3 rounded-xl backdrop-blur-sm transition-all duration-200 items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Volver
            </a>
        </div>
    </div>

    <!-- Formulario -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <!-- Encabezado del card -->
        <div class="bg-gray-50 border-b border-gray-200 px-5 md:px-8 py-4 md:py-6">
            <h2 class="text-base md:text-xl font-semibold text-gray-800">Información del Cargo</h2>
            <p class="text-gray-500 text-xs md:text-sm mt-0.5">Complete los datos para crear el nuevo cargo.</p>
        </div>

        <form action="<?php echo e(route('cargos.store')); ?>" method="POST" class="p-5 md:p-8">
            <?php echo csrf_field(); ?>

            <div class="space-y-5 md:space-y-6">

                <!-- Nombre -->
                <div>
                    <label for="nombre" class="block text-sm font-semibold text-gray-700 mb-2">
                        Nombre del Cargo
                    </label>
                    <input type="text"
                        name="nombre"
                        id="nombre"
                        value="<?php echo e(old('nombre')); ?>"
                        placeholder="Ej: Pastor, Secretario, Tesorero"
                        required
                        class="w-full px-4 py-3.5 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all text-base">
                    <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Descripción -->
                <div>
                    <label for="descripcion" class="block text-sm font-semibold text-gray-700 mb-2">
                        Descripción
                    </label>
                    <textarea
                        name="descripcion"
                        id="descripcion"
                        rows="4"
                        placeholder="Describe las funciones y responsabilidades del cargo..."
                        class="w-full px-4 py-3.5 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all resize-none text-base"><?php echo e(old('descripcion')); ?></textarea>
                    <?php $__errorArgs = ['descripcion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Consejo -->
                <div class="bg-blue-50 border border-blue-100 rounded-xl p-4">
                    <div class="flex items-start gap-3">
                        <div class="bg-blue-100 p-2 rounded-lg shrink-0 mt-0.5">
                            <svg class="w-4 h-4 md:w-5 md:h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-blue-900 text-sm">Consejo</h3>
                            <p class="text-xs md:text-sm text-blue-700 mt-0.5">
                                Utiliza nombres claros y descripciones precisas para facilitar la administración de los usuarios.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Botones -->
                <div class="flex flex-col-reverse md:flex-row md:justify-end gap-3 md:gap-4 pt-5 border-t border-gray-200">
                    <a href="<?php echo e(route('cargos.index')); ?>"
                        class="w-full md:w-auto text-center px-6 py-3.5 border-2 border-gray-300 rounded-xl text-gray-700 hover:bg-gray-50 transition font-medium text-sm">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="w-full md:w-auto px-8 py-3.5 bg-gradient-to-r from-blue-600 to-indigo-700 text-white rounded-xl hover:from-blue-700 hover:to-indigo-800 transition-all shadow-lg font-medium text-sm">
                        Guardar Cargo
                    </button>
                </div>

            </div>
        </form>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistemaIglesia\sistemaIglesia\resources\views/cargos/create.blade.php ENDPATH**/ ?>