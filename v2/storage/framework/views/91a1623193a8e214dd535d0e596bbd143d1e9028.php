
<?php $__env->startSection('title', 'Survey Step-1'); ?>
<?php $__env->startSection('content'); ?>

<div class="formify_right_fullwidth align-items-center justify-content-center">

<!-- <a href="<?php echo e(route('session.logout')); ?>" class="pull-right" style="margin-left:20px;">
<img src="<?php echo e(URL::to('assets/images/svg-icon/logout.svg')); ?>" class="img-fluid" alt="apps"><span>Logout</span><i class="feather "></i>
</a> -->




<?php echo $__env->make('frontend.common_pages.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="formify_box_checkbox background-white">
<?php echo $__env->make('frontend.common_pages.survey_description', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="tab-content" id="myTabContent">

<?php if($Surveys->count()>0): ?>





<?php echo csrf_field(); ?>
 
<div class="box_info">


<div class="container">
<div>
<div>




<div class="background-white">
<?php if(auth()->user()->role==2): ?>
<form action="<?php echo e(route('post.survey.personinfo.'.Config::get('constants.admin'))); ?>" class="" method="post">
<?php elseif(auth()->user()->role==4): ?>
<form action="<?php echo e(route('post.survey.personinfo.'.Config::get('constants.hod'))); ?>" class="" method="post">
<?php elseif(auth()->user()->role==5): ?>
<form action="<?php echo e(route('post.survey.personinfo.'.Config::get('constants.operantionalhead'))); ?>" class="" method="post">
<?php else: ?>
	<form action="<?php echo e(route('post.survey.personinfo.'.Config::get('constants.user'))); ?>" class="" method="post">
<?php endif; ?>
<?php echo csrf_field(); ?>
<div class="row">
        <div class="col-md-12 pl-sm-0">
          
		  	<div class="form-group">
                <label><b>Feedback Date</b><span class="text text-danger">*</span></label>
				<input type="date" class="form-control" id="feedback_date"  name="feedback_date" value="<?php echo e(old('feedback_date',$users_data->feedback_date??date('Y-m-d'))); ?>" required="required">
		     </div>
		  
		  
          <div class="form-group">
            <label><b>Full Name</b><span class="text text-danger">*</span></label>
            <input type="text" class="form-control" name="firstname" value="<?php echo e(old('firstname',$users_data->firstname??'')); ?>" required="required" />
          </div>
          <div class="form-group">
            <label><b>Email</b><span class="text text-danger">*</span></label>
            <input type="email" name="email" class="form-control" required="required" value="<?php echo e(old('email',$users_data->email??'')); ?>">
          </div>
          <div class="form-group">
                <label><b>Mobile</b><span class="text text-danger">*</span></label>
                <input type="number" name="phone" id="title" class="form-control" value="<?php echo e(old('phone',$users_data->phone??'')); ?>" required="required" data-parsley-minlength="10" data-parsley-maxlength="10" required="required">
          </div>  
		  
		  <div class="form-group">
                <label><b>Bed Number</b></label>
                <input type="text" name="bed_name" id="bed_name" class="form-control" value="<?php echo e(old('bed_name',$users_data->bed_name??'')); ?>" >
          </div>  
          
           <?php echo $__env->make('masters.wards',['is_required'=>"is_required"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          
		  <div class="form-group">
                <label><b>UHID Number</b><span class="text text-danger">*</span></label>
                <input type="text" name="uhid" id="uhid" class="form-control" value="<?php echo e(old('uhid',$users_data->uhid??'')); ?>" required>
          </div>		 

		  <div class="form-group">
                <label><b>IP #</b></label>
                <input type="text" name="inpatient_id" id="inpatient_id" class="form-control" value="<?php echo e(old('inpatient_id',$users_data->inpatient_id??'')); ?>">
          </div>
		  
		  <div class="form-group">
                <label><b>Discharge Date</b></label>
				<input type="date" class="form-control" id="discharge_date"  name="discharge_date" value="<?php echo e(old('discharge_date',$users_data->discharge_date??date('Y-m-d'))); ?>">
		     </div>
			 
			 
			 <?php echo $__env->make('masters.doctors',['is_required'=>"is_required"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			 
			
			 
			 
        
          	<div class="form-group">            
              

 <?php $__currentLoopData = $custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $custom_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          	<?php if($custom_field->input_type == 'radio'): ?>

<div>
  <table>
    <tbody>
      <tr>
        <td><strong><?php echo e(Str::title($custom_field->label??'')); ?><span class="text text-danger">*</span></strong></td>
        <td width="5"></td>
		<td><input type="<?php echo e($custom_field->input_type??''); ?>" class="form-control" style="width: 11px;height: 11px;" name="<?php echo e($custom_field->input_name??''); ?>" id="<?php echo e($custom_field->input_name??''); ?>" value="male" required></td>
        <td>Male</td>
		<td width="10"></td>
        <td><input type="<?php echo e($custom_field->input_type??''); ?>" class="form-control" style="width: 11px;height: 11px;" name="<?php echo e($custom_field->input_name??''); ?>" id="<?php echo e($custom_field->input_name??''); ?>" value="female" required></td>
        <td>Female</td>

      </tr>
    </tbody>
  </table>
</div>

</div>



 <?php echo $__env->make('masters.feedbackby',['is_required'=>"required"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 

 
 
 
 
<div class="hide_patient_attender" style="display:none;">

<div class="form-group">
<label for="patient_attender_name"><b>Patient Attender Name</b>
</label>
<input type="text" name="patient_attender_name" id="patient_attender_name" class="form-control process_level_closure">
</div>

</div>
 
 

 
 <?php echo $__env->make('masters.howtoknoworg',['is_required'=>"required"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php else: ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  
		  
		  <div class="form-group form-check">
		  
		   <input type="hidden" class="form-control" id="sendlink_email" name="sendlink_email">
    
  </div>
		  

	 
		
		   
		  <button type="submit" class="btn btn-outline-danger mt-4" id="manulsurvey">Start Survey</button>
		  
		   <button type="submit" class="btn btn-default mt-4" id="notmanulsurvey">Send survey link</button>
	
		  
		 
		  
      
</div>

</div>
<input type="hidden" name="survey_id" value="<?php echo e($Surveys[0]->id??0); ?>"/>
<input type="hidden" name="organization_id" value="<?php echo e($Surveys[0]->organization_id??0); ?>"/>
</form>


</div>


</div> 
 

 

</div>




</div>



<?php else: ?>
	<p>Please create survey.</p>
<?php endif; ?>

</div>

</div>



</div>
    
   


<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<script>
$('#manulsurvey').click(function(){
    $('#sendlink_email').val(0);
});

$('#notmanulsurvey').click(function(){
    $('#sendlink_email').val(1);
});
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/frontend/survey/person_info.blade.php ENDPATH**/ ?>