
<?php if(isset($questions_data->id)): ?>
<?php $__env->startSection('title', 'Edit a Sub Level'); ?>
<?php else: ?>
<?php $__env->startSection('title', 'Add a Sub Level'); ?>
<?php endif; ?>
<?php $__env->startSection('content'); ?>
  <div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title"><?php echo $__env->yieldContent('title'); ?></h5>
            </div>
            <div class="card-body">
              <?php echo $__env->make('admin.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              <div class="row">

                <div class="col-sm-12">
                  <?php if(isset($group_level_data->id)): ?>

          
<form id="crudTable" action="<?php echo e(url(Config::get('constants.admin').'/designation_levels/update')); ?> " method="POST"  enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo e($group_level_data->id); ?>">
<?php else: ?>
<form id="crudTable" action="<?php echo e(url(Config::get('constants.admin').'/designation_levels/store')); ?>" method="POST"  enctype="multipart/form-data">
<?php endif; ?>  
      <?php echo csrf_field(); ?>
      <div class="row">
        <div class="col-md-5">
          <input type="hidden" name="organization_id" value="<?php echo e(auth()->user()->organization_id??''); ?>">
          <div class="form-group" id="survey_id">
        <label for="survey_id">Level<span class="text-red"style="color: red;">*</span></label>
        <select  class="form-control" name="designation_id" id="designation_id" required="required">
          <option value="">-- Select --</option>
          <?php $__currentLoopData = $designations_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($designation->id); ?>" <?php echo e(old('designation_id',$group_level_data->designation_id??'') == $designation->id ? 'selected':''); ?>><?php echo e($designation->name??''); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
        </select>
      </div>
          
          <div class="form-group">
            <label><b>Sub Level</b><span style="color: red;">*</span><small>(Example: TM1)</small></label>
            <input type="text" class="form-control" name="role_level" value="<?php echo e(old('role_level',$group_level_data->role_level??'')); ?>" required="required" data-parsley-pattern="/^[a-z\d\-_\s]+$/i"/>
          </div>
      <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <a href="<?php echo e(url(Config::get('constants.admin').'/designation_levels')); ?>" class="btn btn-danger btn-sm">Back</a>

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
 
<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/designationsgroup/add_edit_rolelevels.blade.php ENDPATH**/ ?>