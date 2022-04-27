
<?php $__env->startSection('title', $pageTitle??''); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
<!-- Start col -->
<div class="col-lg-12 col-xl-12">
<!-- Start row -->
<?php echo $__env->make('admin.dashboard.admin_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- End row -->                        
</div>
<!-- End col -->                    

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/dashboard/company_dashboard.blade.php ENDPATH**/ ?>