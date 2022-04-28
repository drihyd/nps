
<?php $__env->startSection('title', 'Responses'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
<div class="col-lg-12">
<div class="card m-b-30">
<div class="card-body">
<?php echo $__env->make('admin.responses.responses_list_common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/responses/responses_list.blade.php ENDPATH**/ ?>