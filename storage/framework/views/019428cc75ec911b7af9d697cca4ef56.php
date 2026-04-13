<?php $__env->startSection('content'); ?>
<div class="body-wrapper-inner" style="height: 100%;">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h3 class="mb-1"><?php echo e($page['title']); ?></h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('expiry_status.index')); ?>">Expiry Status</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Status</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="container col-12 col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="ti ti-calendar-time text-dark table-icon me-3 mb-1"></i>
                            <div>
                                <h4 class="card-title mb-0">Update Expiry Rule</h4>
                                <small>Define the range of days for <strong><?php echo e($expiry_status->name); ?></strong> status</small>
                            </div>
                        </div>
                        <hr class="mb-4">
                        
                        <form action="<?php echo e(route('expiry_status.update', $expiry_status->uuid)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                            <div class="row">
                                
                                <div class="form-group col-12 mb-3">
                                    <label class="form-label font-weight-bold">Status Name</label>
                                    <input type="text" class="form-control bg-light" value="<?php echo e($expiry_status->name); ?>" readonly disabled>
                                </div>

                                
                                <div class="form-group col-12 mb-3">
                                    <label class="form-label">Priority Level <span class="text-danger">*</span></label>
                                    <input type="number" name="priority" class="form-control" value="<?php echo e($expiry_status->priority); ?>" required>
                                    <small class="text-muted">1 is highest priority (e.g. Expired)</small>
                                    <?php $__errorArgs = ['priority'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger d-block"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                
                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label class="form-label">Minimum Day <span class="text-danger">*</span></label>
                                    <input type="number" name="min_day" class="form-control" value="<?php echo e($expiry_status->min_day); ?>" required>
                                    <?php $__errorArgs = ['min_day'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger d-block"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                
                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label class="form-label">Maximum Day <span class="text-danger">*</span></label>
                                    <input type="number" name="max_day" class="form-control" value="<?php echo e($expiry_status->max_day); ?>" required>
                                    <?php $__errorArgs = ['max_day'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger d-block"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="alert alert-info py-2 mt-2">
                                <small><i class="ti ti-info-circle"></i> Tip: Use <strong>-9999</strong> for infinite past and <strong>9999</strong> for infinite future.</small>
                            </div>

                            <div class="d-flex align-items-center justify-content-end mt-4">
                                <a href="<?php echo e(route('expiry_status.index')); ?>" class="btn btn-light border me-2">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="ti ti-device-floppy me-1"></i> Update Status
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\cartoonnurefahud3\OneDrive\Desktop\expi-stock\resources\views/expiry_status/edit.blade.php ENDPATH**/ ?>