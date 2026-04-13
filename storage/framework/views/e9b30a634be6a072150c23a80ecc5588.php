<?php $__env->startSection('content'); ?>
<div class="col-md-8 col-lg-6 col-xxl-4 my-5">
    <div class=" mb-0">
        <div class="card-body">
            <a href="javascript:void(0)" class="text-nowrap logo-img text-center d-block mb-4 w-100">
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <img src="<?php echo e(asset('assets/img/logo.jpeg')); ?>" height="80" width="100" class="me-3 rounded">
                </div>
                <h3 class="mb-0 text-primary" style="font-weight: 700;">EXPI-STOCK</h3>
                <small class="text-center text-muted">Please login to start your session.</small>
            </a>
            <form action="<?php echo e(route('login.check')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="role" id="selected_role" value="admin">

                <label class="form-label">Select Role</label>
                <div class="row mb-3">
                    <div class="col-6">
                        <div id="role_admin" class="role-option p-2 text-center shadow-sm rounded border bg-secondary-subtle text-secondary" style="cursor: pointer;">
                            <i class="ti ti-school" style="font-size:20px;"></i>
                            <p class="mb-0">Admin</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div id="role_staff" class="role-option p-2 text-center shadow-sm rounded border" style="cursor: pointer;">
                            <i class="ti ti-user" style="font-size:20px;"></i>
                            <p class="mb-0">Staff</p>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" value="admin" class="form-control" placeholder="Enter username">
                </div>
                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control mb-1" value="password123" placeholder="Enter password">
                    <a href="<?php echo e(route('forgot_password')); ?>" class="text-primary fw-bold"><small>Forgot Password?</small></a>
                </div>
                
                <div id="access_code_container" class="mb-4">
                    <p class="text-center my-2">-- OR --</p>
                    <label class="form-label">Admin Access Code</label>
                    <input type="text" name="access_code" class="form-control mb-1" placeholder="Enter access code">
                </div>

                <button type="submit" class="btn btn-primary w-100 fs-4 mb-4 rounded-2">LOGIN</button>
            </form>
        </div>
    </div>
</div>

<script>
    const adminBtn = document.getElementById('role_admin');
    const staffBtn = document.getElementById('role_staff');
    const accessCodeDiv = document.getElementById('access_code_container');
    const roleInput = document.getElementById('selected_role');

    function setRole(role) {
        roleInput.value = role;

        if (role === 'admin') {
            // Update Visual
            adminBtn.classList.add('bg-secondary-subtle', 'text-secondary');
            staffBtn.classList.remove('bg-secondary-subtle', 'text-secondary');
            // Show Access Code
            accessCodeDiv.style.display = 'block';
        } else {
            // Update Visual
            staffBtn.classList.add('bg-secondary-subtle', 'text-secondary');
            adminBtn.classList.remove('bg-secondary-subtle', 'text-secondary');
            // Hide Access Code
            accessCodeDiv.style.display = 'none';
        }
    }

    adminBtn.addEventListener('click', () => setRole('admin'));
    staffBtn.addEventListener('click', () => setRole('staff'));
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.front-app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\cartoonnurefahud3\OneDrive\Desktop\expi-stock\resources\views/login.blade.php ENDPATH**/ ?>