
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title"><?php echo e($pageTitle??''); ?></h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12">
                 <?php if(isset($users_data->id)): ?>
<form id="crudTable" action="<?php echo e(url('administrator/profile/update')); ?> " method="POST"  enctype="multipart/form-data">

<?php else: ?>
<?php endif; ?>  
      <?php echo csrf_field(); ?>
      <div class="row">
        <div class="col-md-5">
          
          <div class="form-group">
            <label><b>Full Name</b><span style="color: red;">*</span></label>
            <input type="text" class="form-control" name="firstname" value="<?php echo e(old('firstname',$users_data->firstname??'')); ?>" required="required" />
          </div>
          <div class="form-group">
            <label><b>Email</b><span style="color: red;">*</span></label>
            <input type="email" name="email" class="form-control" required="required" value="<?php echo e(old('email',$users_data->email??'')); ?>">
          </div>
          <div class="form-group">
                <label><b>Mobile</b><span style="color: red;">*</span></label>
                <input type="number" name="phone" id="title" class="form-control" value="<?php echo e(old('phone',$users_data->phone??'')); ?>" required="required" data-parsley-minlength="10" data-parsley-maxlength="10">
          </div>
		  
		  
		          <div class="form-group">
        <label>Profile<span style="color: red">*</span></label>       
        <input type="file"  name="profile" class="file-input" <?php if(isset($users_data->profile)): ?> <?php else: ?> required <?php endif; ?>  />
      </div>
      <div class="form-group">
        <?php if(isset($users_data->profile) && !empty($users_data->profile)): ?>
        <img src="<?php echo e(asset('assets/uploads/' . $users_data->profile)); ?>" width="100"   />
        <?php else: ?>
        <?php endif; ?>
      </div>
          
      
      <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <a href="<?php echo e(url('admin/users')); ?>" class="btn btn-danger btn-sm">Back</a>

        </div>
        <div class="col-md-5">
  
	  <!--
	  
          <div class="form-group">
        <label><b>Password</b><span style="color: red;">*</span></label>
        <input name="password" type="password" class="form-control"  id="password" <?php if(isset($users_data->password)): ?> <?php else: ?> required <?php endif; ?>>
      </div>
	  

      <div class="form-group">
        <label><b>Confirm Password</b><span style="color: red;">*</span></label>
        <input name="cpassword" type="password" class="form-control" data-parsley-equalto="#password"  <?php if(isset($users_data->password)): ?> <?php else: ?> required <?php endif; ?>>
      </div>
	  -->
      
        </div>
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
    <!-- flot charts scripts-->    
<script type="text/javascript">
  $(document).ready(function() {
    $("form").validate({
      rules:{
        firstname:{
          required:true,
        },copyright:{
          required:true,
          
        },
        twitter_url:{
          required:true,
          url:true
        },linkedin_url:{
          required:true,
          url:true
        },facebook_url:{
          required:true,
          url:true
        },
      },
      
     });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/auth/edit_profile.blade.php ENDPATH**/ ?>