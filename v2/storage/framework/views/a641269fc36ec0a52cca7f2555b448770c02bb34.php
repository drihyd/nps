
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <!-- End col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Onboard a new Organization</h5>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-xl-6">
                        <form  action="<?php echo e(url('organizations/update_admin')); ?>" method="post">
                        	<?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value="<?php echo e($comapany_id); ?>">
                            <div>
                                <h3>Admin Details</h3>
								<small>Login credentials will send to entered email id.</small>
                                                <section>
                                                    <div class="form-group">
                                                        <label for="username">Name<span class="text-danger">*</span></label>
                                                        <input type="text" name="admin_name" class="form-control" id="username" required="required" data-parsley-pattern="/^[a-z\d\-_\s]+$/i" value="<?php echo e(old('admin_name',$organizations_data->admin_name??'')); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="username">Email<span class="text-danger">*</span></label>
                                                        <input type="email" name="admin_email" class="form-control" id="email" required data-parsley-type="email" value="<?php echo e(old('admin_email',$organizations_data->admin_email??'')); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="mobile">Mobile<span class="text-danger">*</span></label>
                                                        <input type="number" name="admin_mobile" class="form-control" id="mobile" data-parsley-maxlength="10" required="required" value="<?php echo e(old('admin_mobile',$organizations_data->admin_mobile??'')); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="altmobile">Alternate Mobile</label>
                                                        <input type="number" name="admin_alter_mobile" class="form-control" id="altmobile" data-parsley-maxlength="10" value="<?php echo e(old('admin_alter_mobile',$organizations_data->admin_alter_mobile??'')); ?>">
                                                    </div>
                                    <a href="<?php echo e(url('organizations/add-gst-details/'.Crypt::encryptString($comapany_id))); ?>" class="btn btn-danger btn-sm">Back</a>
                                    <button type="submit" class="btn btn-primary btn-sm">Save & Continue</button>
                                </section>
                            </div>
                        </form>  
                    </div>  
                </div>                             
            </div>
        </div>
    </div>  
    <!-- End col -->
   
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/organizations/add_admin_details.blade.php ENDPATH**/ ?>