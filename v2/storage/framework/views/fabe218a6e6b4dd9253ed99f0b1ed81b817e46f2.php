
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
                        <form  action="<?php echo e(url('organizations/store')); ?>" method="post">
                        	<?php echo csrf_field(); ?>
                            <div>
                                <h3>Basic Info</h3>
                                <section>
                                    <!-- <h4 class="font-22 mb-3">Basic info</h4> -->
                                    <div class="form-group">
                                        <label for="username">Name of the Organization<span class="text-danger">*</span></label>
                                        <input type="text" name="company_name" class="form-control" id="nameoftheorganization">
                                    </div>
									<div class="form-group">
                                        <label for="shortname">Short Name</label>
                                        <input type="text" name="short_name" class="form-control" id="shortname">
                                    </div>
									<br>
                                    <div class="form-group">
                                        <input type="checkbox" name="is_group" class="checkbox primary" value="yes" />
										<label for="groupcompany" class="primary-rgba">Group company<span class="text-danger">*</span></label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
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
<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/organizations/add_organization.blade.php ENDPATH**/ ?>