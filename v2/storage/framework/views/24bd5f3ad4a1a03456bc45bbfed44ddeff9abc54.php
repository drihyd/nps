
<?php $__env->startSection('title', 'Performitor Reports'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
<div class="col-lg-12">
<div class="card m-b-30">
<div class="card-header">
<h5 class="card-title"><?php echo $__env->yieldContent('title'); ?></h5>
</div>
<div class="card-body">

<form class="table-filter mb-4 form-inline" action="<?php echo e(route('filter.performitor_reports')); ?>" method="post">
<?php echo csrf_field(); ?>
<?php echo $__env->make('admin.common_pages.dates_input', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
&nbsp;
<?php echo $__env->make('admin.common_pages.action_button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
&nbsp;
<a class="btn btn-warning btn-sm mb-2" href="<?php echo e(route('performitor.export')); ?>">Export Data</a>
&nbsp;
</form>




<?php echo $__env->make('admin.reports.table_performitors',["responses_data"=>$responses_data], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/reports/performitor_reports_list.blade.php ENDPATH**/ ?>