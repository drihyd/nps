
<?php if(isset($sla_configurations_data->id)): ?>
<?php $__env->startSection('title', 'Edit SLA Configuration'); ?>
<?php else: ?>
<?php $__env->startSection('title', 'Add SLA Configuration'); ?>
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
              <div class="row">
                <div class="col-sm-12">
                  <?php if(isset($sla_configurations_data->id)): ?>

          
<form id="crudTable" action="<?php echo e(url(Config::get('constants.admin').'/sla_configurations/update')); ?> " method="POST"  enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo e($sla_configurations_data->id); ?>">
<?php else: ?>
<form id="crudTable" action="<?php echo e(url(Config::get('constants.admin').'/sla_configurations/store')); ?>" method="POST"  enctype="multipart/form-data">
<?php endif; ?>  
      <?php echo csrf_field(); ?>
      <div class="row">
        <div class="col-md-5">
          <input type="hidden" name="organization_id" value="<?php echo e(auth()->user()->organization_id??''); ?>">
          <div class="form-group" id="survey_id">
        <label for="survey_id">Levels<span class="text-red"style="color: red;">*</span></label>
        <select  class="form-control" name="level_id" id="level_id" required="required">
          <option value="">-- Select --</option>
          <?php $__currentLoopData = $group_levels_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group_level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($group_level->id); ?>" <?php echo e(old('level_id',$sla_configurations_data->level_id??'') == $group_level->id ? 'selected':''); ?>><?php echo e($group_level->alias??''); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
        </select>
      </div>
          <div class="form-group">
            <label><b>X Minutes</b><span style="color: red;">*</span></label>
            <input type="number" class="form-control" name="x_minutes" value="<?php echo e(old('x_minutes',$sla_configurations_data->x_minutes??'')); ?>" required="required" />
          </div>
      <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <a href="<?php echo e(url(Config::get('constants.admin').'/sla_configurations')); ?>" class="btn btn-danger btn-sm">Back</a>

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
 
<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/sla_configurations/add_edit_sla_configurations.blade.php ENDPATH**/ ?>