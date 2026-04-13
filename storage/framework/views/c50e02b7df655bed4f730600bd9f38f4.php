


<?php if(session('error')): ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const errorMessage = "<?php echo e(session('error')); ?>"; 

        Swal.fire({
            icon: "error",
            title: "Failed!",
            text: errorMessage,
            confirmButtonText: "Okay"
        });
    });
</script>
<?php endif; ?>

<?php if(session('success')): ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const errorMessage = "<?php echo e(session('success')); ?>"; 

        Swal.fire({
            icon: "success",
            title: "Success!",
            text: errorMessage,
            confirmButtonText: "Okay"
        });
    });
</script>
<?php endif; ?><?php /**PATH C:\Users\cartoonnurefahud3\OneDrive\Desktop\expi-stock\resources\views/layout/components/message.blade.php ENDPATH**/ ?>