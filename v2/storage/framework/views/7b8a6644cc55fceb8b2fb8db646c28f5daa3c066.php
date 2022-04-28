
<?php $__env->startSection('title', 'Reset Password'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;

<div class="row">
            <div class="col-lg-12">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title"> <?php echo $__env->yieldContent('title'); ?></h5>
                            </div>
                            <div class="card-body">
<form id="crudTable" action="<?php echo e(route('verifying.password')); ?>" method="post">
						<?php echo csrf_field(); ?>
						 <div class="border-top pt-2">
						 <!--
						<div class="row">
							<div class="col-sm-8">
								<div class="form-group">
								<div class="row">
									<div class="col-sm-4">
									<label>Old Password<span style="color: red;">*</span></label>
									</div>
									<div class="col-sm-5">
									<input type="password" class="form-control form-control-sm" name="current_password" id="current_password" value="" required />
									</div>
								</div>
								</div>
							</div>
						</div>
						-->
						<div class="row">	
							<div class="col-sm-8">
								<div class="form-group">
								<div class="row">
									<div class="col-sm-4">
									<label>New Password<span style="color: red;">*</span></label>
									</div>
									<div class="col-sm-5">
									<input type="password" class="form-control form-control-sm" name="password" id="password" value="" required />
									</div>
								</div>
								</div>
							</div>
						</div>
						<div class="row">	
							<div class="col-sm-8">
								<div class="form-group">
								<div class="row">
									<div class="col-sm-4">
									<label>Confirm New Password<span style="color: red;">*</span></label>
									</div>
									<div class="col-sm-5">
									<input type="password" class="form-control form-control-sm" name="password_confirmation" id="password" value="" required />
									<br>

									<button type="submit" class="btn btn-primary btn-sm">Change</button>
									</div>
								</div>
								</div>

								 
							</div>
						</div>

						
					</div>
					
					</form>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
   $("#crudTable").validate({
  rules: {
new_password:{
		required:false,
		minlength:8,
		},
		password_confirmation:
		{
		required:false,
		minlength:8,
		equalTo: "#new_password",

		}
  }
});
 </script> 
 <?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/deepredink/public_html/demos/nps/v1/resources/views/admin/changePassword/change_password.blade.php ENDPATH**/ ?>