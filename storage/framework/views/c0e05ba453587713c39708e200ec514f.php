<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Sistema de Gestión de Actividades'); ?></title>
    
    <!-- Favicon -->
    <link rel="icon" href="<?php echo e(asset('images/logo/favicon.ico')); ?>" type="image/x-icon">
    
    <!-- PWA Manifest -->
    <link rel="manifest" href="<?php echo e(asset('manifest.json')); ?>">
    
    <!-- iOS Meta Tags -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="San Marteen">
    <link rel="apple-touch-icon" href="<?php echo e(asset('images/pwa/icon-192x192.png')); ?>">
    
    <!-- PWA Theme Color -->
    <meta name="theme-color" content="#C8A26E">
    
    <!-- Poppins Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
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
        
        /* Custom color classes */
        .bg-primary { background-color: #C8A26E; }
        .bg-primary-dark { background-color: #A97142; }
        .bg-secondary { background-color: #E9D8B6; }
        .bg-background { background-color: #FAF8F5; }
        .text-primary { color: #C8A26E; }
        .text-primary-dark { color: #A97142; }
        .text-secondary { color: #E9D8B6; }
        .border-primary { border-color: #C8A26E; }
        .hover\:bg-primary:hover { background-color: #C8A26E; }
        .hover\:bg-primary-dark:hover { background-color: #A97142; }
        .hover\:bg-secondary:hover { background-color: #E9D8B6; }
    </style>
</head>

<body class="bg-[#FAF8F5] font-['Poppins']">

<div class="flex h-screen overflow-hidden">
    <?php echo $__env->make('layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="flex-1 flex flex-col overflow-hidden w-full">
        <?php echo $__env->make('layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-[#FAF8F5] p-4 md:p-6 relative z-10 animate-fade-in">
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

// Register Service Worker
if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('/sw.js')
            .then((registration) => {
                console.log('Service Worker registered with scope:', registration.scope);
            })
            .catch((error) => {
                console.error('Service Worker registration failed:', error);
            });
    });
}
</script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\sistemaIglesia\sistemaIglesia\resources\views/layouts/app.blade.php ENDPATH**/ ?>