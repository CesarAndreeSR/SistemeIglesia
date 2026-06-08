<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Sistema de Gestión de Actividades'); ?></title>

    <script src="https://cdn.tailwindcss.com"></script>

     <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in { animation: fadeIn 0.3s ease-out; }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        .animate-slide-in { animation: slideIn 0.3s ease-out; }
    </style>
</head>

<body class="bg-gray-100">

<div class="flex h-screen overflow-hidden">
    <?php echo $__env->make('layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="flex-1 flex flex-col overflow-hidden w-full">
        <?php echo $__env->make('layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-4 md:p-6 relative z-10 animate-fade-in">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</div>

<?php echo $__env->yieldPushContent('scripts'); ?>

<script>
<?php if(auth()->check()): ?>
    console.log('Usuario autenticado: <?php echo e(auth()->user()->username); ?>');
<?php endif; ?>

function toggleDropdown(dropdownId) {
    document.querySelectorAll('[id^="dropdown-"]').forEach(dropdown => {
        if (dropdown.id !== dropdownId) {
            dropdown.classList.add('hidden');
        }
    });

    const dropdown = document.getElementById(dropdownId);
    dropdown.classList.toggle('hidden');
}

document.addEventListener('click', function(event) {
    if (!event.target.closest('.relative.inline-block')) {
        document.querySelectorAll('[id^="dropdown-"]').forEach(dropdown => {
            dropdown.classList.add('hidden');
        });
    }
});
</script>


</body>
</html><?php /**PATH C:\xampp\htdocs\sistemaIglesia\sistemaIglesia\resources\views/layouts/app.blade.php ENDPATH**/ ?>