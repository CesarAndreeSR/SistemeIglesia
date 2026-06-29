<?php $__env->startSection('title', 'Ajustes - Iglesia San Marteen'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6 animate-fade-in">
    <!-- Header -->
    <div class="flex items-center gap-4">
        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#C8A26E] to-[#A97142] flex items-center justify-center">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
        </div>
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-[#1F2937]">Ajustes</h1>
            <p class="text-gray-500 text-sm md:text-base">Configura tus preferencias y opciones del sistema</p>
        </div>
    </div>

    <!-- Settings Cards Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Install App Card -->
        <div class="bg-white rounded-2xl shadow-lg border border-[#E9D8B6] overflow-hidden">
            <div class="p-6 md:p-8">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0">
                        <img src="<?php echo e(asset('images/logo/icon.ico')); ?>" alt="Icono SM" class="w-20 h-20 rounded-2xl shadow-md">
                    </div>
                    <div class="flex-1">
                        <h2 class="text-xl font-bold text-[#1F2937] mb-2">Instalar aplicación</h2>
                        <p class="text-gray-600 mb-4">Instala el sistema como una aplicación en tu dispositivo para un acceso más rápido y una experiencia mejorada.</p>
                        
                        <!-- Install Button -->
                        <div id="install-button-container">
                            <button id="pwa-install-btn" 
                                    class="inline-flex items-center gap-2 bg-gradient-to-r from-[#C8A26E] to-[#A97142] text-white px-6 py-3 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 font-semibold disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none">
                                <span>📲</span>
                                <span>Instalar aplicación</span>
                            </button>
                        </div>
                        
                        <!-- Already Installed Message -->
                        <div id="already-installed-msg" class="hidden">
                            <div class="flex items-center gap-2 text-emerald-600 font-semibold bg-emerald-50 px-4 py-3 rounded-xl border border-emerald-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>✅ La aplicación ya se encuentra instalada en este dispositivo.</span>
                            </div>
                        </div>
                        
                        <!-- Not Supported Message with Manual Guide -->
                        <div id="not-supported-msg" class="hidden">
                            <div class="text-gray-600 bg-gray-50 px-4 py-4 rounded-xl border border-gray-200">
                                <p class="font-semibold text-[#A97142] mb-2">Guía de instalación manual:</p>
                                <div id="android-guide" class="hidden">
                                    <p class="text-sm mb-2"><strong>Android (Chrome):</strong></p>
                                    <ol class="text-sm space-y-1 list-decimal list-inside">
                                        <li>Toca el menú ⋮ en la esquina superior derecha</li>
                                        <li>Selecciona "Instalar aplicación" o "Agregar a la pantalla de inicio"</li>
                                        <li>Sigue las instrucciones en pantalla</li>
                                    </ol>
                                </div>
                                <div id="ios-guide" class="hidden mt-3">
                                    <p class="text-sm mb-2"><strong>iOS (Safari):</strong></p>
                                    <ol class="text-sm space-y-1 list-decimal list-inside">
                                        <li>Toca el botón Compartir □ (cuadrado con flecha hacia arriba)</li>
                                        <li>Desplázate y selecciona "Agregar a la pantalla de inicio"</li>
                                        <li>Toca "Agregar" en la esquina superior derecha</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Benefits Section -->
            <div class="bg-[#FAF8F5] px-6 md:px-8 py-6 border-t border-[#E9D8B6]">
                <h3 class="text-sm font-semibold text-[#A97142] mb-3">Beneficios de instalar la app</h3>
                <ul class="space-y-2 text-sm text-gray-700">
                    <li class="flex items-start gap-2">
                        <span class="text-[#C8A26E] mt-0.5">✔</span>
                        <span>Acceso rápido desde la pantalla de inicio.</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-[#C8A26E] mt-0.5">✔</span>
                        <span>Se abre como una aplicación.</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-[#C8A26E] mt-0.5">✔</span>
                        <span>No necesita abrir el navegador.</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-[#C8A26E] mt-0.5">✔</span>
                        <span>Mejor experiencia en dispositivos móviles.</span>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Settings Options -->
        <div class="space-y-6">
            <!-- Mi Perfil -->
            <div class="bg-white rounded-2xl shadow-lg border border-[#E9D8B6] p-6 hover:shadow-xl hover:border-[#C8A26E] transition-all duration-300">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#C8A26E] to-[#A97142] flex items-center justify-center">
                        <span class="text-2xl">👤</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-[#1F2937]">Mi perfil</h3>
                        <p class="text-gray-500 text-sm">Gestiona tu información personal</p>
                    </div>
                </div>
                <div class="flex gap-3">
                    <a href="<?php echo e(route('settings.show')); ?>" class="flex-1 bg-[#FAF8F5] border border-[#E9D8B6] text-[#A97142] px-4 py-2.5 rounded-xl hover:bg-[#E9D8B6] transition-all duration-200 font-semibold text-center">
                        Ver perfil
                    </a>
                    <a href="<?php echo e(route('settings.profile')); ?>" class="flex-1 bg-gradient-to-r from-[#C8A26E] to-[#A97142] text-white px-4 py-2.5 rounded-xl hover:shadow-lg transition-all duration-200 font-semibold text-center">
                        Editar perfil
                    </a>
                </div>
            </div>
            
            <!-- Cambiar Contraseña -->
            <a href="<?php echo e(route('settings.password')); ?>" class="block bg-white rounded-2xl shadow-lg border border-[#E9D8B6] p-6 hover:shadow-xl hover:border-[#C8A26E] transition-all duration-300">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#C8A26E] to-[#A97142] flex items-center justify-center">
                        <span class="text-2xl">🔐</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-[#1F2937]">Cambiar contraseña</h3>
                        <p class="text-gray-500 text-sm">Actualiza tu contraseña de acceso</p>
                    </div>
                    <svg class="w-5 h-5 text-[#C8A26E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </div>
            </a>
            
            <!-- Tema Placeholder -->
            <div class="bg-white rounded-2xl shadow-lg border border-[#E9D8B6] p-6 opacity-70 cursor-not-allowed">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                        <span class="text-2xl">🎨</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-[#1F2937]">Tema claro / oscuro</h3>
                        <p class="text-gray-500 text-sm">Próximamente</p>
                    </div>
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </div>
            </div>
            
            <!-- Idioma Placeholder -->
            <div class="bg-white rounded-2xl shadow-lg border border-[#E9D8B6] p-6 opacity-70 cursor-not-allowed">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                        <span class="text-2xl">🌐</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-[#1F2937]">Idioma</h3>
                        <p class="text-gray-500 text-sm">Próximamente</p>
                    </div>
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
// PWA Installation Logic for Settings Page
let deferredPrompt;
const installButtonContainer = document.getElementById('install-button-container');
const installButton = document.getElementById('pwa-install-btn');
const alreadyInstalledMsg = document.getElementById('already-installed-msg');
const notSupportedMsg = document.getElementById('not-supported-msg');
const androidGuide = document.getElementById('android-guide');
const iosGuide = document.getElementById('ios-guide');

// Detect device type
const isAndroid = () => /Android/i.test(navigator.userAgent);
const isIOS = () => /iPhone|iPad|iPod/i.test(navigator.userAgent);

// Check if PWA is already installed
const isPWAInstalled = () => {
    return window.matchMedia('(display-mode: standalone)').matches || 
           window.matchMedia('(display-mode: fullscreen)').matches ||
           (window.navigator.standalone === true);
};

// Initialize PWA UI
const initializePWAUI = () => {
    console.log('Initializing PWA UI...');
    
    if (isPWAInstalled()) {
        console.log('PWA is already installed');
        installButtonContainer.classList.add('hidden');
        alreadyInstalledMsg.classList.remove('hidden');
        notSupportedMsg.classList.add('hidden');
        return;
    }
    
    // Show device-specific guide
    if (isAndroid()) {
        androidGuide.classList.remove('hidden');
        iosGuide.classList.add('hidden');
    } else if (isIOS()) {
        iosGuide.classList.remove('hidden');
        androidGuide.classList.add('hidden');
    } else {
        // Show both guides for desktop
        androidGuide.classList.remove('hidden');
        iosGuide.classList.remove('hidden');
    }
    
    // Check if browser supports PWA install prompt
    if ('serviceWorker' in navigator) {
        console.log('Service Worker is supported');
    }
    
    // Listen for beforeinstallprompt event (only fires on certain browsers)
    window.addEventListener('beforeinstallprompt', (e) => {
        console.log('beforeinstallprompt event fired');
        e.preventDefault();
        deferredPrompt = e;
        installButtonContainer.classList.remove('hidden');
        alreadyInstalledMsg.classList.add('hidden');
        notSupportedMsg.classList.add('hidden');
    });
    
    // Listen for app installed event
    window.addEventListener('appinstalled', (e) => {
        console.log('PWA was installed');
        installButtonContainer.classList.add('hidden');
        alreadyInstalledMsg.classList.remove('hidden');
        notSupportedMsg.classList.add('hidden');
        deferredPrompt = null;
        showToast('¡Aplicación instalada exitosamente! 🎉', 'success');
    });
    
    // If we don't get the beforeinstallprompt within 2 seconds, show manual guide
    setTimeout(() => {
        if (!deferredPrompt) {
            console.log('No beforeinstallprompt event, showing manual guide');
            installButtonContainer.classList.add('hidden');
            alreadyInstalledMsg.classList.add('hidden');
            notSupportedMsg.classList.remove('hidden');
        }
    }, 2000);
};

// Handle install button click
if (installButton) {
    installButton.addEventListener('click', async () => {
        if (!deferredPrompt) {
            console.log('No deferred prompt available');
            return;
        }
        
        deferredPrompt.prompt();
        
        const { outcome } = await deferredPrompt.userChoice;
        
        if (outcome === 'accepted') {
            console.log('User accepted the install prompt');
            installButtonContainer.classList.add('hidden');
            alreadyInstalledMsg.classList.remove('hidden');
            showToast('¡Aplicación instalada exitosamente! 🎉', 'success');
        } else {
            console.log('User dismissed the install prompt');
        }
        
        deferredPrompt = null;
    });
}

// Run initialization
document.addEventListener('DOMContentLoaded', initializePWAUI);
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistemaIglesia\sistemaIglesia\resources\views/settings/index.blade.php ENDPATH**/ ?>