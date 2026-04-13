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

        <!--  widget -->
        <div class="row">
            <div class="col-12">
                <div class="card" style="min-height: 400px;">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="ti ti-notification text-dark table-icon me-3 mb-1" style="font-size: 1.5rem;"></i>
                            <div>
                                <h4 class="card-title mb-0">Notification & Expiry Alert.</h4>
                                <small class="text-muted">View all system notification and expiry alert.</small>
                            </div>
                        </div>
                        <hr>

                        <div class="mt-3">
                            <table class="table table-hover align-middle" id="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Status</th>
                                        <th>Description</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $listNotification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $accessCode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($index + 1); ?></td>
                                        <td><?php echo e($accessCode->status ?? '-'); ?></td>
                                        <td><?php echo e($accessCode->description ?? '-'); ?></td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <a href="<?php echo e(route('notification.mark-as-read', $accessCode->uuid)); ?>" 
                                                class="btn btn-sm btn-secondary me-2 text-white">
                                                    <div class="d-flex align-items-center">
                                                        <i class="ti ti-tick me-1"></i>
                                                        <span>Mark as Read</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\cartoonnurefahud3\OneDrive\Desktop\expi-stock\resources\views/notification/index.blade.php ENDPATH**/ ?>