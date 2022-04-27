
<?php $__env->startSection('title', $pageTitle); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            
        
            <div class="card-body">
      <form class="table-filter mb-4 form-inline" action="<?php echo e(route('filter.responses_reports')); ?>?ticket_status=<?php echo e($status??'all'); ?>" method="post">
<?php echo csrf_field(); ?>

<?php echo $__env->make('admin.common_pages.dates_input', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

&nbsp;

<?php if(isset(auth()->user()->role) && auth()->user()->role==3): ?>

<!--<?php echo $__env->make('admin.common_pages.ticket_status', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>-->
<?php else: ?>
<?php echo $__env->make('admin.common_pages.teams',['pickteam'=>$pickteam??''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.common_pages.surveys',['quetion'=>$quetion??''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>



&nbsp;
<?php echo $__env->make('admin.common_pages.action_button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
&nbsp;



<a class="btn btn-warning btn-sm mb-2" href="<?php echo e(route('data.export')); ?>?ticket_status=<?php echo e($status??'all'); ?>">Export Data</a>



<input type="hidden" name="ticket_status" value="<?php echo e($status??'all'); ?>"/>
</form>
<?php echo $__env->make('admin.reports.table_lists',['Data'=>$Detractors,'is_action_enabled'=>'yes'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



        </div>
      </div>
</div>
</div>
        <?php $__env->stopSection(); ?>




<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/reports/responses_list_common.blade.php ENDPATH**/ ?>