<?php
$user_role = Illuminate\Support\Facades\Auth::user()->roles->first()->name;
?>
<aside class="left-sidebar">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="./index.html" class="text-nowrap logo-img">
                <div class="d-flex align-items-center">
                    <img src="<?php echo e(asset('assets/img/logo.jpeg')); ?>" class="me-2 rounded" width="45" height="40" />
                    <div>
                        <h5 class="mb-0 text-primary" style="font-weight:700">EXPI-STOCK</h5>
                        <small class="text-muted">version 1.0.0</small>
                    </div>
                </div>
                
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-6"></i>
            </div>
        </div>
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">

                <!-- home -->
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">Home</span>
                </li>

                <li class="sidebar-item">
                    <a 
                    class="sidebar-link <?= ($page['menu'] == 'dashboard') ? 'active': '' ?>" 
                    href="<?php echo e(route('dashboard')); ?>" aria-expanded="false">
                        <i class="ti ti-chart-pie"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <!-- management -->
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">Management</span>
                </li>

                <li class="sidebar-item">
                    <a 
                    class="sidebar-link <?= ($page['menu'] == 'batch') ? 'active': '' ?>" 
                    href="<?php echo e(route('batch.index')); ?>" aria-expanded="false">
                        <i class="ti ti-package"></i>
                        <span class="hide-menu">Batch</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a 
                    class="sidebar-link <?= ($page['menu'] == 'report') ? 'active': '' ?>" 
                    href="<?php echo e(route('report.index')); ?>" aria-expanded="false">
                        <i class="ti ti-printer"></i>
                        <span class="hide-menu">Report</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a 
                    class="sidebar-link <?= ($page['menu'] == 'notification') ? 'active': '' ?>" 
                    href="<?php echo e(route('notification.index')); ?>" aria-expanded="false">
                        <i class="ti ti-notification"></i>
                        <span class="hide-menu">Notification</span>
                    </a>
                </li>

                <?php if($user_role == 'admin'): ?>
                <li class="sidebar-item">
                    <a 
                    class="sidebar-link <?= ($page['menu'] == 'audit_log') ? 'active': '' ?>" 
                    href="<?php echo e(route('audit_log.index')); ?>" aria-expanded="false">
                        <i class="ti ti-lock"></i>
                        <span class="hide-menu">Audit Logs</span>
                    </a>
                </li>
                <?php endif; ?>

                <!-- master data -->
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">Master Data</span>
                </li>

                <?php if($user_role == 'admin'): ?>
                <li class="sidebar-item">
                    <a 
                    class="sidebar-link <?= ($page['menu'] == 'category') ? 'active': '' ?>" 
                    href="<?php echo e(route('category.index')); ?>" aria-expanded="false">
                        <i class="ti ti-tag"></i>
                        <span class="hide-menu">Category</span>
                    </a>
                </li>
                <?php endif; ?>
                
                <li class="sidebar-item">
                    <a 
                    class="sidebar-link <?= ($page['menu'] == 'product') ? 'active': '' ?>" 
                    href="<?php echo e(route('product.index')); ?>" aria-expanded="false">
                        <i class="ti ti-basket"></i>
                        <span class="hide-menu">Product</span>
                    </a>
                </li>

                <?php if($user_role == 'admin'): ?>
                <!-- account -->
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">Account</span>
                </li>

                <li class="sidebar-item">
                    <a 
                    class="sidebar-link <?= ($page['menu'] == 'access_code') ? 'active': '' ?>" 
                    href="<?php echo e(route('access_code.index')); ?>" aria-expanded="false">
                        <i class="ti ti-lock"></i>
                        <span class="hide-menu">Access Code</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a 
                    class="sidebar-link <?= ($page['menu'] == 'user') ? 'active': '' ?>" 
                    href="<?php echo e(route('user.index')); ?>" aria-expanded="false">
                        <i class="ti ti-users"></i>
                        <span class="hide-menu">User</span>
                    </a>
                </li>
                <?php endif; ?>

                <!-- setting -->
                <?php if($user_role == 'admin'): ?>
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">Setting</span>
                </li>

                <li class="sidebar-item">
                    <a 
                    class="sidebar-link <?= ($page['menu'] == 'alert_configuration') ? 'active': '' ?>" 
                    href="<?php echo e(route('alert_configuration.index')); ?>" aria-expanded="false">
                        <i class="ti ti-bell"></i>
                        <span class="hide-menu">Alert Configuration</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a 
                    class="sidebar-link <?= ($page['menu'] == 'expiry_status') ? 'active': '' ?>" 
                    href="<?php echo e(route('expiry_status.index')); ?>" aria-expanded="false">
                        <i class="ti ti-calendar-time"></i>
                        <span class="hide-menu">Expiry Status</span>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
    </aside><?php /**PATH C:\Users\cartoonnurefahud3\OneDrive\Desktop\expi-stock\resources\views/layout/components/sidebar.blade.php ENDPATH**/ ?>