
<?php if($errors->any()): ?>
<div class="paddingleftright pt-2 pb-2" >
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<strong>Error!</strong> 
<ul>
<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li><?php echo e($error); ?></li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
</div>

</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/alerts.blade.php ENDPATH**/ ?>