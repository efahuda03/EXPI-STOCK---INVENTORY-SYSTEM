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
                <?php if($user_role == 'admin'): ?>
                <div class="d-flex aling-items-center justify-content-end">
                    <a
                    href="<?php echo e(route('product.create')); ?>"
                    class="btn btn-primary btn-table">
                        <div class="d-flex align-items-center">
                            <i class="ti ti-plus me-1"></i>
                            Create Product
                        </div>
                    </a>
                </div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="ti ti-basket text-dark table-icon me-3 mb-1"></i>
                            <div>
                                <h4 class="card-title mb-0">Manage Product</h4>
                                <small>All list product in system</small>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive-md mt-3">
                            <table class="table" id="table" >
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $listProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="align-middle">
                                        <td><?php echo e($index + 1); ?></td>
                                        <td>
                                            <img src="<?php echo e($product->image); ?>" width="50" height="50" class="rounded">
                                        </td>
                                        <td><?php echo e($product->name); ?></td>
                                        <td><?php echo e($product->category->name); ?></td>
                                        <td><?php echo e($product->description); ?></td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <a
                                                href="<?php echo e(route('product.edit', $product->uuid)); ?>"
                                                class="btn btn-sm btn-info me-2">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                                <?php if($user_role == 'admin'): ?>
                                                <a
                                                href="javascript:void(0)" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#modalDelete<?= $product->id ?>" 
                                                class="btn btn-sm btn-danger">
                                                    <i class="ti ti-trash"></i>
                                                </a>
                                                <?php endif; ?>
                                            </div>
                                            <div class="modal fade" id="modalDelete<?php echo e($product->id); ?>" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete Product</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-center py-4">
                                                            <i class="ti ti-alert-triangle text-danger mb-2" style="font-size: 3rem;"></i>
                                                            
                                                            <p class="mb-0">Are you sure you want to delete product:</p>
                                                            <h4 class="mt-2"><?php echo e($product->name); ?></h4>
                                                            <small class="text-muted">This action cannot be undone.</small>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <form action="<?php echo e(route('product.destroy', $product->uuid)); ?>" method="POST">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('DELETE'); ?>
                                                                <button type="submit" class="btn btn-sm btn-danger">Yes, Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\cartoonnurefahud3\OneDrive\Desktop\expi-stock\resources\views/product/index.blade.php ENDPATH**/ ?>