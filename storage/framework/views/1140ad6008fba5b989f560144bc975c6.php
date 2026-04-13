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

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="ti ti-printer text-dark table-icon me-3 mb-1" style="font-size: 1.5rem;"></i>
                        <div>
                            <h4 class="card-title mb-0">Generate Report</h4>
                            <small class="text-muted">Select report type and select generate comprehensive reports.</small>
                        </div>
                    </div>
                    <hr>

                    <div class="mt-3">
                        <form action="<?php echo e(route('report.index')); ?>" method="GET">
                            <div class="form-group mb-3">
                                <label class="form-label">Select Report Type <span class="text-danger">*</span></label>
                                <select name="report_type" class="form-control" required>
                                    <option value="" selected disabled>Select Report Type</option>

                                    <?php $__currentLoopData = $reportType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($report); ?>" <?php if(request('report_type') == $report): echo 'selected'; endif; ?>>
                                            <?php echo e($report); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            
                            <div class="d-flex align-items-center justify-content-end">
                                <a href="<?php echo e(route('report.index')); ?>" class="btn btn-danger me-2">Reset</a>
                                
                                <button type="submit" class="btn btn-warning text-white">Select</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Inventory -->
        <?php if($report_type == 'Product Inventory'): ?>
        <div class="d-flex aling-items-center justify-content-end">
            <a href="<?php echo e(route('report.export-pdf', ['report_type' => request('report_type')])); ?>" 
            class="btn btn-sm btn-secondary btn-table">
                <div class="d-flex align-items-center">
                    <i class="ti ti-file-description me-1"></i> Export PDF
                </div>
            </a>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <i class="ti ti-file text-dark table-icon me-3 mb-1" style="font-size: 1.5rem;"></i>
                    <div>
                        <h4 class="card-title mb-0">Product Inventory Report</h4>
                        <small class="text-muted">Generate at : <?php echo e(date('d-m-Y h:i A')); ?></small>
                    </div>
                </div>
                <hr>

                
                <div class="mt-3">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Product</td>
                                    <td>Category</td>
                                    <td>Total Badges</td>
                                    <td>Total Quantity</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $listProductBatch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($product->product_name); ?></td>
                                    <td><?php echo e($product->category_name); ?></td>
                                    <td><?php echo e($product->total_batches); ?></td>
                                    <td><?php echo e(number_format($product->total_quantity)); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4" class="text-center">No data available.</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
        <?php endif; ?>

        <?php if($report_type == 'Expiry Status'): ?>
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <i class="ti ti-calendar-x text-danger table-icon me-3 mb-1" style="font-size: 1.5rem;"></i>
                        <div>
                            <h4 class="card-title mb-0">Expiry Status Report</h4>
                            <small class="text-muted">Summary of products by their expiry risk levels.</small>
                        </div>
                    </div>
                    <a href="<?php echo e(route('report.export-pdf', ['report_type' => request('report_type')])); ?>" 
                    class="btn btn-sm btn-outline-secondary">
                        <i class="ti ti-file-description"></i> Export PDF
                    </a>
                </div>
                <hr>

                <div class="table-responsive mt-3">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Product</th>
                                <th>Category</th>
                                <th class="text-center">Total Batches</th>
                                <th class="text-center">Expired</th>
                                <th class="text-center">Critical</th>
                                <th class="text-center">Warning</th>
                                <th>Earliest Expiry</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $listProductBatch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><strong><?php echo e($product->product_name); ?></strong></td>
                                <td><?php echo e($product->category_name); ?></td>
                                <td class="text-center"><?php echo e($product->total_batches); ?></td>
                                <td class="text-center">
                                    <span class="badge <?php echo e($product->expired > 0 ? 'bg-dark' : 'bg-light text-muted'); ?>">
                                        <?php echo e($product->expired); ?>

                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="badge <?php echo e($product->critical > 0 ? 'bg-danger' : 'bg-light text-muted'); ?>">
                                        <?php echo e($product->critical); ?>

                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="badge <?php echo e($product->warning > 0 ? 'bg-warning' : 'bg-light text-muted'); ?>">
                                        <?php echo e($product->warning); ?>

                                    </span>
                                </td>
                                <td>
                                    <small class="text-danger fw-bold">
                                        <?php echo e(\Carbon\Carbon::parse($product->earliest_date)->format('d/m/Y')); ?>

                                    </small>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="7" class="text-center">No expiry data found.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\cartoonnurefahud3\OneDrive\Desktop\expi-stock\resources\views/report/index.blade.php ENDPATH**/ ?>