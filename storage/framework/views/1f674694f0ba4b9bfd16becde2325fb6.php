<aside id="sidebar"
    class="bg-gradient-to-b from-blue-900 to-blue-800 text-white w-64 flex-shrink-0 transition-all duration-300 fixed md:relative h-full z-50 -translate-x-full md:translate-x-0 flex flex-col">

    <!-- Logo -->
    <div class="p-4 border-b border-blue-700">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-xl font-bold">San Martin App</h1>
                <p class="text-blue-300 text-sm">Gestión de Actividades</p>
            </div>
            <button id="closeSidebar" class="md:hidden text-white hover:text-blue-300 transition p-1">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Nav -->
    <nav class="p-4 overflow-y-auto flex-1 pb-24">
        <ul class="space-y-1">

            <li>
                <a href="<?php echo e(route('dashboard.index')); ?>"
                    class="flex items-center p-3 rounded-lg hover:bg-blue-700 transition-all duration-200 active:bg-blue-600
                        <?php echo e(request()->routeIs('dashboard.*') ? 'bg-blue-700 shadow-lg' : ''); ?>">
                    <svg class="w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span class="font-medium">Inicio</span>
                </a>
            </li>

            <li>
                <a href="<?php echo e(route('users.index')); ?>"
                    class="flex items-center p-3 rounded-lg hover:bg-blue-700 transition-all duration-200 active:bg-blue-600
                        <?php echo e(request()->routeIs('users.*') ? 'bg-blue-700 shadow-lg' : ''); ?>">
                    <svg class="w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <span class="font-medium">Usuarios</span>
                </a>
            </li>

            <li>
                <a href="<?php echo e(route('cargos.index')); ?>"
                    class="flex items-center p-3 rounded-lg hover:bg-blue-700 transition-all duration-200 active:bg-blue-600
                        <?php echo e(request()->routeIs('cargos.*') ? 'bg-blue-700 shadow-lg' : ''); ?>">
                    <svg class="w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    <span class="font-medium">Cargos</span>
                </a>
            </li>

            <!-- Actividades con submenu -->
            <li x-data="{ open: <?php echo e(request()->routeIs('actividades.*') ? 'true' : 'false'); ?> }">
                <button @click="open = !open"
                    class="flex items-center justify-between w-full p-3 rounded-lg hover:bg-blue-700 transition-all duration-200 active:bg-blue-600
                        <?php echo e(request()->routeIs('actividades.*') ? 'bg-blue-700 shadow-lg' : ''); ?>">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                        </svg>
                        <span class="font-medium">Actividades</span>
                    </div>
                    <svg class="w-4 h-4 transition-transform duration-200"
                        :class="{ 'rotate-180': open }"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div x-show="open"
                    x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 -translate-y-1"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="ml-4 mt-1 space-y-1 border-l-2 border-blue-600 pl-4">
                    <a href="<?php echo e(route('actividades.index')); ?>"
                        class="block py-2 px-2 text-sm rounded-lg text-white/80 hover:text-white hover:bg-blue-700 transition-all
                            <?php echo e(request()->routeIs('actividades.index') ? 'text-white font-medium' : ''); ?>">
                        Todas las actividades
                    </a>
                    <a href="<?php echo e(route('actividades.mis')); ?>"
                        class="block py-2 px-2 text-sm rounded-lg text-white/80 hover:text-white hover:bg-blue-700 transition-all
                            <?php echo e(request()->routeIs('actividades.mis') ? 'text-white font-medium' : ''); ?>">
                        Mis actividades
                    </a>
                </div>
            </li>

            <li>
                <a href="<?php echo e(route('evidencias.index')); ?>"
                    class="flex items-center p-3 rounded-lg hover:bg-blue-700 transition-all duration-200 active:bg-blue-600
                        <?php echo e(request()->routeIs('evidencias.*') ? 'bg-blue-700 shadow-lg' : ''); ?>">
                    <svg class="w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span class="font-medium">Evidencias</span>
                </a>
            </li>

            <li>
                <a href="<?php echo e(route('asistencias.index')); ?>"
                    class="flex items-center p-3 rounded-lg hover:bg-blue-700 transition-all duration-200 active:bg-blue-600
                        <?php echo e(request()->routeIs('asistencias.*') ? 'bg-blue-700 shadow-lg' : ''); ?>">
                    <svg class="w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="font-medium">Asistencias</span>
                </a>
            </li>

        </ul>
    </nav>

    <!-- Cerrar sesión fijo abajo -->
    <div class="absolute bottom-0 left-0 w-full p-4 border-t border-blue-700 bg-gradient-to-t from-blue-900 to-blue-800">
        <form action="<?php echo e(route('logout')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <button type="submit"
                class="flex items-center w-full p-3 rounded-lg hover:bg-red-600 active:bg-red-700 transition-all duration-200 text-left">
                <svg class="w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                <span class="font-medium">Cerrar Sesión</span>
            </button>
        </form>
    </div>
</aside>

<!-- Overlay -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden md:hidden"></div>

<script>
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const closeSidebarBtn = document.getElementById('closeSidebar');

    function openSidebar() {
        sidebar.classList.remove('-translate-x-full');
        sidebarOverlay.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeSidebarFn() {
        sidebar.classList.add('-translate-x-full');
        sidebarOverlay.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    closeSidebarBtn.addEventListener('click', closeSidebarFn);
    sidebarOverlay.addEventListener('click', closeSidebarFn);

    // Exponer para el header
    window.toggleSidebar = function() {
        sidebar.classList.contains('-translate-x-full') ? openSidebar() : closeSidebarFn();
    }
</script><?php /**PATH C:\xampp\htdocs\sistemaIglesia\sistemaIglesia\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>