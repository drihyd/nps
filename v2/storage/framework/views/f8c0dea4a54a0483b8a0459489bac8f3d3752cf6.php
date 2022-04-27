
<?php if(isset($process_data->id)): ?>
<?php $__env->startSection('title', 'Edit'); ?>
<?php else: ?>
<?php $__env->startSection('title', 'Add'); ?>
<?php endif; ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title"><?php echo $__env->yieldContent('title'); ?></h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12">
                  <?php if(isset($process_data->id)): ?>
          
<form id="crudTable" action="<?php echo e(url(Config::get('constants.admin').'/process/update')); ?> " method="POST"  enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo e($process_data->id); ?>">
<?php else: ?>
<form id="crudTable" action="<?php echo e(url(Config::get('constants.admin').'/process/store')); ?>" method="POST"  enctype="multipart/form-data">
<?php endif; ?>  
      <?php echo csrf_field(); ?>
      <div class="row">
        <div class="col-md-5">
          <input type="hidden" name="organization_id" value="<?php echo e(auth()->user()->organization_id??''); ?>">
          <div class="form-group">
            <label><b>Name</b><span style="color: red;">*</span></label>
            <input type="text" class="form-control nameForSlug" name="name" value="<?php echo e(old('name',$process_data->name??'')); ?>" required="required" data-parsley-pattern="/^[a-z\d\-_\s]+$/i"/>
          </div>
          <div class="form-group">
            <label><b>Slug</b><span style="color: red;">*</span></label>
            <input type="text" class="form-control slugForName" name="slug" value="<?php echo e(old('slug',$process_data->slug??'')); ?>" required="required" />
          </div>
      <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <a href="<?php echo e(url(Config::get('constants.admin').'/process')); ?>" class="btn btn-default btn-sm">Back</a>

        </div>
        <div class="col-md-5">
          
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

<?php $__env->startPush('scripts'); ?>
<script>
   $("#crudTable").validate({
  rules: {
  name: {
      required: true,
    },
    role_id: {
      required: true,
      
    },
    is_active_status:{
      required: true,
    },
    
    password:
      {
         required:false,
         minlength:6,
      },
      mobile:
      {
         required:true,
         minlength:10,
         maxlength:10,
      },

     confirmpassword:
      {
         required:false,
         minlength:6,
         equalTo: "#password",
      
      },
    max_admissions: {
      required: true,
      number:true,
      minlength:1,
      maxlength:100
    },course_fee: {
      required: true,
      number:true,
      minlength:2,
      maxlength:100
    },
    institute_id: {
      required: true
    }
  }
});
 </script> 
 <?php $__env->stopPush(); ?>
 
<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/process/add_edit_process.blade.php ENDPATH**/ ?>