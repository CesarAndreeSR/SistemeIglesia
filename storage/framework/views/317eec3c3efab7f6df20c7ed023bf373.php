<?php $__env->startSection('title', 'Mi Perfil - Iglesia San Marteen'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6 animate-fade-in">
    <!-- Header -->
    <div class="flex items-center gap-4">
        <a href="<?php echo e(route('settings.index')); ?>" class="p-2 rounded-xl hover:bg-[#E9D8B6] transition-all">
            <svg class="w-6 h-6 text-[#1F2937]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#C8A26E] to-[#A97142] flex items-center justify-center">
                <span class="text-2xl">👤</span>
            </div>
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-[#1F2937]">Mi Perfil</h1>
                <p class="text-gray-500 text-sm md:text-base">Actualiza tu información personal</p>
            </div>
        </div>
    </div>

    <!-- Profile Card -->
    <div class="bg-white rounded-2xl shadow-lg border border-[#E9D8B6] p-6 md:p-8">
        <form id="profile-form" method="POST" action="<?php echo e(route('settings.profile.update')); ?>">
            <?php echo csrf_field(); ?>
            
            <div class="space-y-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-[#1F2937] mb-2">Nombre completo</label>
                    <input type="text" id="name" name="name" value="<?php echo e(old('name', $user->name)); ?>" required
                        class="w-full px-4 py-3.5 rounded-xl border-2 border-[#E9D8B6] focus:border-[#C8A26E] focus:ring-4 focus:ring-[#E9D8B6] transition-all text-base text-[#1F2937] placeholder-gray-400">
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Username -->
                <div>
                    <label for="username" class="block text-sm font-semibold text-[#1F2937] mb-2">Nombre de usuario</label>
                    <input type="text" id="username" name="username" value="<?php echo e(old('username', $user->username)); ?>" required
                        class="w-full px-4 py-3.5 rounded-xl border-2 border-[#E9D8B6] focus:border-[#C8A26E] focus:ring-4 focus:ring-[#E9D8B6] transition-all text-base text-[#1F2937] placeholder-gray-400">
                    <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-[#1F2937] mb-2">Correo electrónico</label>
                    <input type="email" id="email" name="email" value="<?php echo e(old('email', $user->email)); ?>"
                        class="w-full px-4 py-3.5 rounded-xl border-2 border-[#E9D8B6] focus:border-[#C8A26E] focus:ring-4 focus:ring-[#E9D8B6] transition-all text-base text-[#1F2937] placeholder-gray-400">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Teléfono -->
                <div>
                    <label for="telefono" class="block text-sm font-semibold text-[#1F2937] mb-2">Teléfono</label>
                    <input type="text" id="telefono" name="telefono" value="<?php echo e(old('telefono', $user->telefono)); ?>" maxlength="9" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 9)"
                        class="w-full px-4 py-3.5 rounded-xl border-2 border-[#E9D8B6] focus:border-[#C8A26E] focus:ring-4 focus:ring-[#E9D8B6] transition-all text-base text-[#1F2937] placeholder-gray-400" placeholder="9 dígitos (ej: 912345678)">
                    <?php $__errorArgs = ['telefono'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" id="submit-btn"
                        class="w-full bg-gradient-to-r from-[#C8A26E] to-[#A97142] text-white px-6 py-3.5 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-300 font-semibold flex items-center justify-center gap-2">
                        <span id="btn-text">Guardar cambios</span>
                        <svg id="btn-spinner" class="w-5 h-5 animate-spin hidden" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.getElementById('profile-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const form = this;
    const submitBtn = document.getElementById('submit-btn');
    const btnText = document.getElementById('btn-text');
    const btnSpinner = document.getElementById('btn-spinner');
    
    submitBtn.disabled = true;
    btnText.textContent = 'Guardando...';
    btnSpinner.classList.remove('hidden');
    
    try {
        const response = await fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: new FormData(form)
        });
        
        const result = await response.json();
        
        if (result.success) {
            showToast('¡Perfil actualizado con éxito! 🎉', 'success');
        } else if (result.errors) {
            Object.values(result.errors).forEach(error => {
                showToast(error[0], 'error');
            });
        }
    } catch (error) {
        // If AJAX fails, submit normally
        form.submit();
        return;
    } finally {
        submitBtn.disabled = false;
        btnText.textContent = 'Guardar cambios';
        btnSpinner.classList.add('hidden');
    }
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistemaIglesia\sistemaIglesia\resources\views/settings/profile.blade.php ENDPATH**/ ?>