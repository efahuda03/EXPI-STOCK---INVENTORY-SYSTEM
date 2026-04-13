<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EXPI-STOCK | <?php echo e($page['title']); ?></title>
    <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('assets/img/logo.jpeg')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/styles.min.css')); ?>" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- message -->
    <?php echo $__env->make('layout.components.message', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
        class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">

                <!-- content -->
                <?php echo $__env->yieldContent('content'); ?>

                <p class="text-center text-muted">&copy; <?= date('Y') ?> EXPI-STOCK</p>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo e(asset('assets/libs/jquery/dist/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>
</html><?php /**PATH C:\Users\cartoonnurefahud3\OneDrive\Desktop\expi-stock\resources\views/layout/front-app.blade.php ENDPATH**/ ?>