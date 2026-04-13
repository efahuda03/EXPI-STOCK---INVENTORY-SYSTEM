<?php $__env->startSection('content'); ?>
<div class="body-wrapper-inner" style="height: 100%;">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h3 class="mb-1"><?php echo e($page['title']); ?></h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e($page['title']); ?></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-end">
                    <a href="<?php echo e(route('user.create')); ?>" class="btn btn-primary btn-table">
                        <div class="d-flex align-items-center">
                            <i class="ti ti-user-plus me-1"></i>
                            Add New User
                        </div>
                    </a>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="ti ti-users text-dark table-icon me-3 mb-1" style="font-size: 1.5rem;"></i>
                            <div>
                                <h4 class="card-title mb-0">Manage Users</h4>
                                <small class="text-muted">System access control and user profiles</small>
                            </div>
                        </div>
                        <hr>

                        <div class="table-responsive-md mt-3">
                            <table class="table table-hover align-middle" id="table">
                                <thead>
                                    <tr>
                                        <th width="60">No.</th>
                                        <th>Name / Username</th>
                                        <th>Email / Phone</th>
                                        <th>Position</th>
                                        <th class="text-center">Role</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center" width="150">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $listUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($index + 1); ?></td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold text-dark"><?php echo e($user->name); ?></span>
                                                <small class="text-muted">@ <?php echo e($user->username); ?></small>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span><?php echo e($user->email); ?></span>
                                                <small class="text-muted"><?php echo e($user->phone_number ?? '-'); ?></small>
                                            </div>
                                        </td>
                                        <td><?php echo e($user->position ?? '-'); ?></td>
                                        <td class="text-center"><?php echo $user->role; ?></td>
                                        <td class="text-center"><?php echo $user->status; ?></td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <a href="<?php echo e(route('user.edit', $user->uuid)); ?>" 
                                                class="btn btn-sm btn-info me-2" 
                                                title="Edit">
                                                    <i class="ti ti-edit"></i>
                                                </a>

                                                <button type="button" 
                                                        class="btn btn-sm btn-danger" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#modalDelete<?php echo e($user->id); ?>">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </div>

                                            <div class="modal fade" id="modalDelete<?php echo e($user->id); ?>" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete User</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-center py-4">
                                                            <i class="ti ti-user-x text-danger mb-2" style="font-size: 3rem;"></i>
                                                            <p class="mb-0">Are you sure you want to delete user:</p>
                                                            <h4 class="mt-2"><?php echo e($user->name); ?></h4>
                                                            <p class="small text-muted">Username: <?php echo e($user->username); ?></p>
                                                            <small class="text-danger">Warning: This user will lose all access to the system.</small>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <form action="<?php echo e(route('user.destroy', $user->uuid)); ?>" method="POST">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('DELETE'); ?>
                                                                <button type="submit" class="btn btn-sm btn-danger">Yes, Delete User</button>
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
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\cartoonnurefahud3\OneDrive\Desktop\expi-stock\resources\views/user/index.blade.php ENDPATH**/ ?>