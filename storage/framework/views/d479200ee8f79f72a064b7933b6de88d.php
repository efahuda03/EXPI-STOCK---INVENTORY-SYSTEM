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
                                <h4 class="card-title mb-0">Audit Logs Information</h4>
                                <small>Audit Log information <b><?php echo e($audit->created_at->format('d-m-Y h:i A')); ?></b></small>
                            </div>
                        </div>
                        <hr class="mb-3">
                            <div class="row">
                                <div class="form-group col-12 mb-3">
                                    <label class="form-label">Date Record</label>
                                    <input type="text" class="form-control" value="<?php echo e($audit->created_at->format('d-m-Y h:i A')); ?>" disabled>
                                </div>
                                <div class="form-group col-12 mb-3">
                                    <label class="form-label">Action</label>
                                    <input type="text" class="form-control" value="<?php echo e($audit->action); ?>" disabled>
                                </div>
                                <div class="form-group col-12 mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" rows="5" disabled><?php echo e($audit->description); ?></textarea>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-end my-3">
                                <a href="<?php echo e(route('audit_log.index')); ?>" class="btn btn-danger me-2">
                                    <div class="d-flex align-items-center">
                                        <i class="ti ti-arrow-left me-1"></i>
                                        Back
                                    </div>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\cartoonnurefahud3\OneDrive\Desktop\expi-stock\resources\views/audit_log/show.blade.php ENDPATH**/ ?>