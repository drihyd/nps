
<?php if(isset($questions_data->id)): ?>
<?php $__env->startSection('title', 'Edit a Designation'); ?>
<?php else: ?>
<?php $__env->startSection('title', 'Add a Designation'); ?>
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

          
<form id="crudTable" action="<?php echo e(url(Config::get('constants.admin').'/designation_roles/update')); ?> " method="POST"  enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo e($group_level_data->id); ?>">
<?php else: ?>
<form id="crudTable" action="<?php echo e(url(Config::get('constants.admin').'/designation_roles/store')); ?>" method="POST"  enctype="multipart/form-data">
<?php endif; ?>  
      <?php echo csrf_field(); ?>
      <div class="row">
        <div class="col-md-5">
          <input type="hidden" name="organization_id" value="<?php echo e(auth()->user()->organization_id??''); ?>">
          <div class="form-group" id="survey_id">
        <label for="survey_id">Parent Level<span class="text-red"style="color: red;">*</span></label>
        <select  class="form-control" name="designation_id" id="designation" required="required">
          <option value="">-- Select --</option>
          <?php $__currentLoopData = $designations_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($designation->id); ?>" <?php echo e(old('designation_id',$group_level_data->designation_id??'') == $designation->id ? 'selected':''); ?>><?php echo e($designation->name??''); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
        </select>
      </div>
      <div class="form-group">
      <label for="designation_level">Sub level:</label>
      <select name="designation_role_id" id="designation_level" class="form-control"></select>
    </div>
          <div class="form-group">
            <label><b>Name</b><span style="color: red;">*</span><small>(Example: Manager)</small></label>
            <input type="text" class="form-control" name="role_name" value="<?php echo e(old('role_name',$group_level_data->role_name??'')); ?>" required="required" data-parsley-pattern="/^[a-z\d\-_\s]+$/i"/>
          </div>
      <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <a href="<?php echo e(url(Config::get('constants.admin').'/designation_roles')); ?>" class="btn btn-danger btn-sm">Back</a>

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
<script type=text/javascript>
  $('#designation').change(function(){
  var designationID = $(this).val(); 
  // alert(designationID);
  if(designationID){
    $.ajax({
      type:"GET",
      url:"<?php echo e(url('admin/getrole_level')); ?>?designation_id="+designationID,
      success:function(res){        
      if(res){
        $("#designation_level").empty();
        $("#designation_level").append('<option>Select Level</option>');
        $.each(res,function(key,value){
          $("#designation_level").append('<option value="'+key+'">'+value+'</option>');
        });
      
      }else{
        $("#designation_level").empty();
      }
      }
    });
  }else{
    $("#designation_level").empty();
  }   
  });
 </script> 
 <?php $__env->stopPush(); ?>
 
<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/deepredink/public_html/demos/nps/v1/resources/views/admin/designationsgroup/add_edit_rolenames.blade.php ENDPATH**/ ?>