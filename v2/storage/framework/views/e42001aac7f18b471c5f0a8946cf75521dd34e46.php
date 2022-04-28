
<?php if(isset($surveys_data->id)): ?>
<?php $__env->startSection('title', 'Edit Questionnaire'); ?>
<?php else: ?>
<?php $__env->startSection('title', 'Add Questionnaire'); ?>
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
                  <?php if(isset($surveys_data->id)): ?>

          
<form id="crudTable" action="<?php echo e(url(Config::get('constants.admin').'/questionnaire/update')); ?> " method="POST"  enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo e($surveys_data->id); ?>">
<?php else: ?>
<form id="crudTable" action="<?php echo e(url(Config::get('constants.admin').'/questionnaire/store')); ?>" method="POST"  enctype="multipart/form-data">
<?php endif; ?>  
      <?php echo csrf_field(); ?>
      <div class="row">
        <div class="col-md-5">
          <input type="hidden" name="organization_id" value="<?php echo e(auth()->user()->organization_id??''); ?>">
          <input type="hidden" name="admin_user_id" value="<?php echo e(auth()->user()->id??''); ?>">
          <div class="form-group">
            <label><b>Title</b><span style="color: red;">*</span></label>
            <input type="text" class="form-control" name="title" value="<?php echo e(old('title',$surveys_data->title??'')); ?>" required="required" data-parsley-pattern="/^[a-z\d\-_\s]+$/i" />
          </div>
          <div class="form-group">
            <label><b>Descripton</b><span style="color: red;">*</span></label>
            <textarea class="form-control" name="description" required="required" maxlength="250" rows="3"><?php echo e(old('description',$surveys_data->description??'')); ?></textarea>
          </div>
          
      <div class="form-group">
	  
	  <label><b>Is Active?</b><span style="color: red;">*</span></label>&nbsp;&nbsp;
        <input type="radio" class="rdbtn"  name="isopen" value="yes" <?php echo e(old('isopen',$surveys_data->isopen??'') == 'yes'?'checked':'checked'); ?>/>
        <label>Yes</label>
		&nbsp;&nbsp;
        <input type="radio" class="rdbtn" name="isopen" value="no" required="required"    <?php echo e(old('isopen',$surveys_data->isopen??'') == 'no'?'checked':''); ?>/>
        <label>No</label>
      </div>
      <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <a href="<?php echo e(url(Config::get('constants.admin').'/questionnaire')); ?>" class="btn btn-danger btn-sm">Back</a>

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
 
<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/deepredink/public_html/demos/nps/v1/resources/views/admin/surveys/add_edit_surveys.blade.php ENDPATH**/ ?>