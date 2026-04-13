<?php $__env->startSection('content'); ?>
<div class="body-wrapper-inner" style="height: 100%;">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h3 class="mb-1"><?php echo e($page['title']); ?></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e($page['title']); ?></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="container col-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-end">
                            <i class="ti ti-tag text-dark table-icon me-3 mb-1"></i>
                            <div>
                                <h4 class="card-title mb-0">Fill all Information</h4>
                                <small>Please fill all information below</small>
                            </div>
                        </div>
                        <hr class="mb-3">
                        <form action="<?php echo e(route('alert_configuration.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="form-group col-12 mb-3">
                                    <label class="form-label">Select Before Day Left <span class="text-danger">*</span></label>
                                    <select name="day_left" class="form-select" required>
                                        <option value="">Select Day Left</option>
                                        <?php $__currentLoopData = $listDayLeft; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($day['value']); ?>" <?php echo e(old('day_left') == $day['value'] ? 'selected' : ''); ?>>
                                                <?php echo e($day['label']); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['day_left'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-12 mb-3">
                                    <label class="form-label">Select Email <span class="text-danger">*</span></label>
                                    <select name="user_id" class="form-select" required>
                                        <option value="">Select Email</option>
                                        <?php $__currentLoopData = $listEmail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($email->id); ?>" <?php echo e(old('user_id') == $email->id ? 'selected' : ''); ?>>
                                                <?php echo e($email->email); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['user_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-end my-3">
                                <a
                                href="<?php echo e(route('alert_configuration.index')); ?>"
                                class="btn btn-danger me-2">
                                <div class="d-flex align-items-center">
                                        <i class="ti ti-arrow-left me-1"></i>
                                        Back
                                    </div>
                                </a>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\cartoonnurefahud3\OneDrive\Desktop\expi-stock\resources\views/alert_configuration/create.blade.php ENDPATH**/ ?>