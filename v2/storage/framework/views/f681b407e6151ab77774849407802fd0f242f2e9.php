
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

          
<form id="crudTable" action="<?php echo e(url(Config::get('constants.admin').'/user/update')); ?> " method="POST"  enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo e($users_data->id); ?>">
<?php else: ?>
<form id="crudTable" action="<?php echo e(url(Config::get('constants.admin').'/user/store')); ?>" method="POST"  enctype="multipart/form-data">
<?php endif; ?>  
      <?php echo csrf_field(); ?>
      <div class="row">
        <div class="col-md-5">
		
		
			<div class="form-group">
			
			<?php echo $__env->make('masters.organisations',['company_id' =>$users_data->organization_id??'','is_required'=>""], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</div>

		
		
          <div class="form-group">
            <input type="hidden" name="organization_id" value="<?php echo e(auth()->user()->organization_id??''); ?>">
            <label><b>Designation</b><span style="color: red;">*</span></label>
            <select class="form-control" name="role" id="role" required="required">
              <option value="">-- Select --</option>
              <?php $__currentLoopData = $user_type_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usertype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <option value="<?php echo e($usertype->id??''); ?>" <?php echo e(old('role',$users_data->role??'') == $usertype->id ? 'selected':''); ?>><?php echo e(ucwords($usertype->name??'')); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <!-- <div class="form-group">
            <input type="hidden" name="organization_id" value="<?php echo e(auth()->user()->organization_id??''); ?>">
            <label><b>Designation</b><span style="color: red;">*</span></label>
            <select class="form-control" name="designation_id" id="role" required="required">
              <option value="">-- Select --</option>
              <?php $__currentLoopData = $group_level_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group_level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <option value="<?php echo e($group_level->id??''); ?>" <?php echo e(old('designation_id',$users_data->designation_id??'') == $group_level->id ? 'selected':''); ?>><?php echo e(ucwords($group_level->name??'')); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div> -->
		  
		  <div class="form-group">
             
			
			<?php echo $__env->make('masters.departments', ['department' =>$users_data->department??'','is_required'=>""], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			
			
			
          </div>
		  
			<div class="form-group">
			<?php echo $__env->make('masters.users', ['existvalue' =>$users_data->reportingto??'','is_required'=>""], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</div>
		  
          <div class="form-group">
            <label><b>Full Name</b><span style="color: red;">*</span></label>
            <input type="text" class="form-control" name="firstname" value="<?php echo e(old('firstname',$users_data->firstname??'')); ?>" required="required" />
          </div>
          <!-- <div class="form-group">
            <label><b>Last Name</b><span style="color: red;">*</span></label>
            <input type="text" class="form-control" name="lastname" value="<?php echo e(old('lastname',$users_data->lastname??'')); ?>" required="required" />
          </div> -->
          <div class="form-group">
            <label><b>Email</b><span style="color: red;">*</span></label>
            <input type="email" name="email" class="form-control" required="required" value="<?php echo e(old('email',$users_data->email??'')); ?>">
          </div>
          
          
      
      <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <a href="<?php echo e(url(Config::get('constants.admin').'/users')); ?>" class="btn btn-default btn-sm">Back</a>

        </div>
        <div class="col-md-5">
          <div class="form-group">
                <label><b>Mobile (Enter 10 digits mobile number)</b><span style="color: red;">*</span></label>
                <input type="text" name="phone" id="title" class="form-control" value="<?php echo e(old('phone',$users_data->phone??'')); ?>" required="required" >
          </div>
         
      <div class="form-group">
        <label><b>Status</b><span style="color: red;">*</span></label>
      </div>
      <div class="form-group">
        <input type="radio" class="rdbtn"  name="is_active_status" value="1" <?php echo e(old('is_active_status',$users_data->is_active_status??'') == '1'?'checked':'checked'); ?>/>
                <label>Active</label>
                <input type="radio" class="rdbtn" name="is_active_status" value="0" required="required"    <?php echo e(old('is_active_status',$users_data->is_active_status??'') == '0'?'checked':''); ?>/>
                  <label>Inactive</label>
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
<script>
   $("#crudTable").validate({
  rules: {
  name: {
      required: true,
      minlength:3,
      maxlength:100
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
 
<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/department_users/add_user.blade.php ENDPATH**/ ?>