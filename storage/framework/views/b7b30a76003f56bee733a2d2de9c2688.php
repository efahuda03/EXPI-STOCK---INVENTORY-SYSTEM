<!DOCTYPE html>
<html>
<head>
    <title>Inventory Report</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .header { text-align: center; margin-bottom: 30px; }
    </style>
</head>
<body>
    <div class="header">
        <h2><?php echo e($title); ?></h2>
        <p>Generated at: <?php echo e($date); ?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Product</th>
                <th>Category</th>
                <th>Total Batches</th>
                <th>Total Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $listProductBatch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($key + 1); ?></td>
                <td><?php echo e($product->product_name); ?></td>
                <td><?php echo e($product->category_name); ?></td>
                <td><?php echo e($product->total_batches); ?></td>
                <td><?php echo e($product->total_quantity); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html><?php /**PATH C:\Users\cartoonnurefahud3\OneDrive\Desktop\expi-stock\resources\views/report/pdf_inventory.blade.php ENDPATH**/ ?>