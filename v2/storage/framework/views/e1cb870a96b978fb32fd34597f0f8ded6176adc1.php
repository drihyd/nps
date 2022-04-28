
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12 col-xl-12">
        <!-- Start row -->
        <?php if(Auth::user()->role==1): ?>
    

<?php echo $__env->make('admin.dashboard.superadmin_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif(Auth::user()->role==2): ?>


<?php echo $__env->make('admin.dashboard.admin_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(Auth::user()->role==3): ?>

<?php echo $__env->make('admin.dashboard.user_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(Auth::user()->role==4): ?>
<?php echo $__env->make('admin.dashboard.user_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>

<?php endif; ?>
        <!-- End row -->                        
    </div>
    <!-- End col -->                    
    <!-- Start col -->
    
    <!-- End col -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/deepredink/public_html/demos/nps/v1/resources/views/admin/dashboard/show.blade.php ENDPATH**/ ?>