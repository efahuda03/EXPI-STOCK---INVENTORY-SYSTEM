<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Expiry Status Report</title>
    <style>
        body { font-family: sans-serif; font-size: 10px; color: #333; margin: 0; padding: 0; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #333; padding-bottom: 10px; }
        .header h2 { margin: 0; text-transform: uppercase; color: #000; }
        
        table { width: 100%; border-collapse: collapse; margin-top: 10px; table-layout: fixed; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; word-wrap: break-word; }
        th { background-color: #f2f2f2; font-weight: bold; text-transform: uppercase; font-size: 9px; }
        
        .text-center { text-align: center; }
        .fw-bold { font-weight: bold; }
        
        .bg-expired { background-color: #000000 !important; color: #ffffff !important; font-weight: bold; }
        .bg-critical { background-color: #dc3545 !important; color: #ffffff !important; font-weight: bold; }
        .bg-warning { background-color: #ffc107 !important; color: #000000 !important; font-weight: bold; }
        
        .earliest-date { color: #d9534f; font-weight: bold; }
        
        footer { position: fixed; bottom: -20px; left: 0; right: 0; height: 20px; text-align: right; font-size: 8px; color: #666; }
    </style>
</head>
<body>

    <div class="header">
        <h2><?php echo e($title); ?></h2>
        <p style="margin: 5px 0;">Generated Date: <?php echo e($date); ?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="30px" class="text-center">No</th>
                <th>Product Name</th>
                <th>Category</th>
                <th width="60px" class="text-center">Total Batches</th>
                <th width="50px" class="text-center">Expired</th>
                <th width="50px" class="text-center">Critical</th>
                <th width="50px" class="text-center">Warning</th>
                <th width="80px" class="text-center">Earliest Expiry</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $listProductBatch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td class="text-center"><?php echo e($key + 1); ?></td>
                <td><span class="fw-bold"><?php echo e($product->product_name); ?></span></td>
                <td><?php echo e($product->category_name); ?></td>
                <td class="text-center"><?php echo e($product->total_batches); ?></td>
                
                <td class="text-center <?php echo e($product->expired > 0 ? 'bg-expired' : ''); ?>">
                    <?php echo e($product->expired); ?>

                </td>
                
                <td class="text-center <?php echo e($product->critical > 0 ? 'bg-critical' : ''); ?>">
                    <?php echo e($product->critical); ?>

                </td>
                
                <td class="text-center <?php echo e($product->warning > 0 ? 'bg-warning' : ''); ?>">
                    <?php echo e($product->warning); ?>

                </td>
                
                <td class="text-center earliest-date">
                    <?php echo e(\Carbon\Carbon::parse($product->earliest_date)->format('d/m/Y')); ?>

                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="8" class="text-center">No inventory data available for reporting.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <footer>
        EXPI-STOCK System - Printed on: <?php echo e(date('d/m/Y H:i:s')); ?>

    </footer>

</body>
</html><?php /**PATH C:\Users\cartoonnurefahud3\OneDrive\Desktop\expi-stock\resources\views/report/pdf_expiry.blade.php ENDPATH**/ ?>