<?php $__env->startSection('content'); ?>
<div class="col-md-8 col-lg-6 col-xxl-4">
    <div class=" mb-0">
        <div class="card-body">
            <a href="javascript:void(0)" class="text-nowrap logo-img d-block mb-4 w-100">
                <h3 class="mb-0 text-primary" style="font-weight: 700;">Reset Password</h3>
                <small class="text-center text-muted">Enter your email address to receive a password reset link.</small>
            </a>
            <form action="<?php echo e(route('forgot_password.send')); ?>" method="POST">
            <?php echo csrf_field(); ?> 
                <div class="mb-3">
                    <label class="form-label">Email Address <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                            placeholder="your.email@example.com" value="<?php echo e(old('email')); ?>" required>
                    
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <button type="submit" class="btn btn-primary w-100 fs-4 mb-2 rounded-2">Send Reset Link</button>
                <a href="<?php echo e(route('login')); ?>" class="btn btn-danger w-100 fs-4 mb-4 rounded-2">Back</a>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.front-app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\cartoonnurefahud3\OneDrive\Desktop\expi-stock\resources\views/forgot-password.blade.php ENDPATH**/ ?>