<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Gestión de Actividades')</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo/favicon.ico') }}" type="image/x-icon">
    
    <!-- PWA Manifest -->
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    
    <!-- iOS Meta Tags -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="San Marteen">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/pwa/icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="96x96" href="{{ asset('images/pwa/icon-96x96.png') }}">
    <link rel="apple-touch-icon" sizes="128x128" href="{{ asset('images/pwa/icon-128x128.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/pwa/icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/pwa/icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="192x192" href="{{ asset('images/pwa/icon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="384x384" href="{{ asset('images/pwa/icon-384x384.png') }}">
    <link rel="apple-touch-icon" sizes="512x512" href="{{ asset('images/pwa/icon-512x512.png') }}">
    
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

<!-- Toast Notification Container - Global -->
<div id="toast-container" class="fixed top-4 right-4 z-[9999] space-y-3"></div>

<div class="flex h-screen overflow-hidden">
    @include('layouts.sidebar')

    <div class="flex-1 flex flex-col overflow-hidden w-full">
        @include('layouts.header')

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-[#FAF8F5] p-4 md:p-6 relative z-10 animate-fade-in">
            @yield('content')
        </main>
    </div>
</div>

@stack('scripts')

<!-- Global Toast Notification System -->
<script>
function showToast(message, type = 'success') {
    const container = document.getElementById('toast-container');
    
    // Create toast element
    const toast = document.createElement('div');
    const bgColor = type === 'success' ? 'bg-gradient-to-r from-[#C8A26E] to-[#A97142]' : 'bg-red-500';
    
    toast.className = `${bgColor} text-white px-6 py-4 rounded-xl shadow-2xl transform translate-x-full transition-all duration-500 flex items-center gap-3 max-w-md`;
    
    const icon = type === 'success' 
        ? '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>'
        : '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
    
    toast.innerHTML = `
        ${icon}
        <span class="font-semibold">${message}</span>
    `;
    
    container.appendChild(toast);
    
    // Animate in
    setTimeout(() => toast.classList.remove('translate-x-full'), 10);
    
    // Animate out after 5 seconds
    setTimeout(() => {
        toast.classList.add('translate-x-full', 'opacity-0');
        setTimeout(() => toast.remove(), 500);
    }, 5000);
}

// Show toast if there's a session success message
@if(session('success'))
    setTimeout(() => {
        showToast('{{ session('success') }}', 'success');
    }, 100);
@endif

// Show toasts for validation errors
@if($errors->any())
    setTimeout(() => {
        @foreach($errors->all() as $error)
            showToast('{{ $error }}', 'error');
        @endforeach
    }, 100);
@endif
</script>

<script>
@if(auth()->check())
    console.log('Usuario autenticado: {{ auth()->user()->username }}');
@endif

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
