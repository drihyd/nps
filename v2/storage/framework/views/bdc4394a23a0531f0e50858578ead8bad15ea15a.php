
<?php $__env->startSection('title', 'Login'); ?>
<?php $__env->startSection('content'); ?>			
<div class="formify_right_fullwidth d-flex align-items-center justify-content-center">
<div class="formify_box formify_box_checkbox background-white" style="width:600px;">
<div class="formify_header">
<h4 class="form_title"><?php echo $__env->yieldContent('title'); ?></h4>
<div class="border ml-0"></div>
</div>
<form action="<?php echo e(route('adminlogin.verification')); ?>" class="signup_form" method="post">
<?php echo csrf_field(); ?> 
<div class="box_info">
<div class="container">
<div class="row">
<div class="col-sm-12 p-0 m-0">
<div class="form-group">
<input type="email" name="email" class="form-control" id="username" placeholder="Enter Email" required data-parsley-type="email">
</div>
<div class="form-group">
<input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" required>
</div>
</div>
<button type="submit" class="btn thm_btn next_tab text-transform-inherit mt-4">Next</button>
</div>
</form>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/deepredink/public_html/demos/nps/v1/resources/views/frontend/survey/login.blade.php ENDPATH**/ ?>