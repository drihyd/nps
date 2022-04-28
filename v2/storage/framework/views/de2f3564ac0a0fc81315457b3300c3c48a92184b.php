
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

<?php echo $__env->make('admin.dashboard.hod_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(Auth::user()->role==4): ?>
<?php echo $__env->make('admin.dashboard.user_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif(Auth::user()->role==5): ?>
<?php echo $__env->make('admin.dashboard.otphead_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif(Auth::user()->role==7): ?>
<?php echo $__env->make('admin.dashboard.support_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>

<?php endif; ?>
        <!-- End row -->                        
    </div>
    <!-- End col -->                    
    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/dashboard/show.blade.php ENDPATH**/ ?>