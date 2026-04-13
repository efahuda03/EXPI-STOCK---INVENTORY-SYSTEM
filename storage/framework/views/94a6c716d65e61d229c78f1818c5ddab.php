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
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="ti ti-calendar-time text-dark table-icon me-3 mb-1" style="font-size: 1.5rem;"></i>
                            <div>
                                <h4 class="card-title mb-0">Manage Expiry Status</h4>
                                <small class="text-muted">All expiry status in system</small>
                            </div>
                        </div>
                        <hr>

                        <div class="table-responsive-md mt-3">
                            <table class="table table-hover align-middle" id="table">
                                <thead>
                                    <tr>
                                        <th style="width: 50px;" class="text-center">No.</th>
                                        <th>Status Name</th>
                                        <th class="text-center">Priority</th>
                                        <th>Day Range Coverage</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $listExpiryStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $expiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center text-muted"><?php echo e($index + 1); ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <?php echo $expiry->badge; ?>

                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge rounded-pill bg-light text-dark border">
                                                <i class="ti ti-hash me-1"></i><?php echo e($expiry->priority); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="text-primary fw-bold"><?php echo e($expiry->min_day); ?></span>
                                                <span class="mx-2 text-muted">to</span>
                                                <span class="text-primary fw-bold"><?php echo e($expiry->max_day); ?></span>
                                                <small class="ms-2 text-muted italic">days</small>
                                            </div>
                                            
                                            <div class="small text-muted mt-1" style="font-size: 0.75rem;">
                                                <i class="ti ti-info-circle me-1"></i><?php echo e($expiry->range_display); ?>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <a href="<?php echo e(route('expiry_status.edit', $expiry->uuid)); ?>" 
                                                class="btn btn-sm btn-outline-info d-flex align-items-center shadow-sm" 
                                                title="Edit Configuration">
                                                    <i class="ti ti-edit me-1"></i> Edit
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
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\cartoonnurefahud3\OneDrive\Desktop\expi-stock\resources\views/expiry_status/index.blade.php ENDPATH**/ ?>