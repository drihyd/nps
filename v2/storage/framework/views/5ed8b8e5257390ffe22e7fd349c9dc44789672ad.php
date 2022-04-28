
<?php $__env->startSection('title', 'Survey Step-1'); ?>
<?php $__env->startSection('content'); ?>



	
       
			
	<?php if(auth()->user()): ?>		
<div class="justify-content-center" style="width:100%">
<?php else: ?>
	<div class="justify-content-center" style="width:100%">
<?php endif; ?>

<?php if(auth()->user()): ?>
<?php echo $__env->make('frontend.common_pages.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
<?php endif; ?>


<div class="formify_box formify_box_checkbox background-white">


<?php if(auth()->user()): ?>
<?php echo $__env->make('frontend.common_pages.survey_description', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
	
<?php endif; ?>
<br>
<div class="tab-content" id="myTabContent">

<?php if($Questions->count()>0): ?>

<?php if(auth()->user()): ?>
	<?php if(auth()->user()->role==2): ?>
	<form action="<?php echo e(route('surveyone.post.'.Config::get('constants.admin'))); ?>" class="signup_form" method="post">
	<?php else: ?>
	<form action="<?php echo e(route('surveyone.post.'.Config::get('constants.user'))); ?>" class="signup_form" method="post">
	<?php endif; ?>

<?php else: ?>
	<form action="<?php echo e(route('offline.surveyone.post')); ?>" class="signup_form" method="post">
<?php endif; ?>

<?php
$departments=$departments??'';

?>

<?php if($departments): ?>
<h6><b>



</b></h6>


<?php else: ?>
	
<?php echo e($Questions[0]->qlabel??''); ?>


<?php endif; ?>




<?php echo csrf_field(); ?>
 
<div class="box_info ml-3 mt-3">


<div class="container pl-sm-0">
<div class="">
<div class="">

<p class="page-header"><?php echo e(str_replace("*companyname*",Session::get('comapny_name'),$Questions[0]->qsublabel??'')); ?></p>
<div class="survey-radio-btns-group">


<?php if($Questions[0]->qinput_type=="radio"): ?>
	


<div class="box_info">
<input type="range" list="tickmarks" min="0" max="10" name="first_questin_range">
<input type="hidden"  name="is_pick_slider" value="1">
<datalist id="tickmarks">
<?php $__currentLoopData = $Questions[0]->qoptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($value->qoptionid); ?>" label="<?php echo e($value->qpvalue); ?>"></option>
<!--<input type="radio" name="first_questin_range" class="btn btn-scale btn-scale-asc-2" value="<?php echo e($value->qoptionid); ?>"><?php echo e($value->qpvalue); ?>-->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</datalist>
</div>
 
 
 
<?php elseif($Questions[0]->qinput_type=="checkbox"): ?>

<div class="row">

<?php $__currentLoopData = $Questions[0]->qoptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-md-12">
<input required type="checkbox" name="first_questin_range[]" class="btn btn-scale btn-scale-asc-2" value="<?php echo e($value->qoptionid); ?>"><?php echo e($value->qpvalue); ?>

</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
<input type="hidden"  name="is_pick_slider" value="0">
<?php elseif($Questions[0]->qinput_type=="dropdown"): ?>

	<?php $__currentLoopData = $Questions[0]->qoptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<input required type="radio" name="first_questin_range" class="btn btn-scale btn-scale-asc-2" value="<?php echo e($value->qoptionid); ?>"><?php echo e($value->qpvalue); ?>

	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<input type="hidden"  name="is_pick_slider" value="0">
<?php elseif($Questions[0]->qinput_type=="textarea"): ?>	




<!--- Display Activity -->

<?php

if($departments){
	
	$departments=$departments;
	
}
else{
	$departments=[];
}

?>

	<?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div>
	
	
	<?php if($value->qoptionid==21): ?>		
	<?php echo e($value->qpvalue??''); ?>	(Optional)	
	<?php else: ?>
		<label ><?php echo e(str_replace("*teamname*",$value->qpvalue??'',$Questions[0]->qlabel??'')); ?></label>	
	<?php endif; ?>
		
		

		
		<?php $__currentLoopData = $value->activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $akey=>$avalue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="mt-3">
<input required type="checkbox" name="first_activities[]" class="btn btn-scale btn-scale-asc-2" value="<?php echo e($avalue->activity_name); ?>"><?php echo e($avalue->activity_name); ?>

</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php if(isset($value->activities) && $value->activities->count()>0): ?>
	<div class="mt-3">
<input type="checkbox" id="option_checkboxes" name="first_activities[]" class="btn btn-scale btn-scale-asc-2" value="Any Other">Any Other
</div>	

<?php endif; ?>
		
	
		<input type="hidden" name="first_questin_range"  value="<?php echo e($value->qoptionid); ?>">


	<?php if($value->qoptionid==21): ?>		
	<textarea name="answerdbyperson[<?php echo e($value->qoptionid); ?>]" class="form form-control" id="answerdbyperson_checkboxes"></textarea>	
	<?php else: ?>
		<textarea name="answerdbyperson[<?php echo e($value->qoptionid); ?>]" class="form form-control" id="answerdbyperson_checkboxes" <?php if(isset($value->activities) && $value->activities->count()>0): ?>  <?php else: ?> required <?php endif; ?>></textarea>
	<?php endif; ?>
		
		
	
	
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	
	<!--
		<div class="mt-3">
		<label>Any other (optional)</label><br>
	
		<input type="hidden" name="first_questin_range"  value="21">
		
		<textarea name="answerdbyperson[21]" class="form form-control"></textarea>
	</div>
	-->
	
	
<input type="hidden"  name="is_pick_slider" value="0">
<?php else: ?>		  
<?php endif; ?>	
</div></div>



<button type="submit" class="btn thm_btn next_tab text-transform-inherit mt-5">Next</button>

</div>



<input type="hidden" name="organization_id" value="<?php echo e($Questions[0]->qorgid??0); ?>"/>
<input type="hidden" name="question_id" value="<?php echo e($Questions[0]->qid??0); ?>"/>
<input type="hidden" name="survey_id" value="<?php echo e(Session::get('survey_id')??0,); ?>"/>

</form>
<?php else: ?>
	
<div class="row">
<div class="col-md-12 text-center">
	<h4 class="text text-success">Thank you for completing our survey!</h4>
	
	<?php if(auth()->user()): ?>
	<?php if(auth()->user()->role==2): ?>
		
	<a href="<?php echo e(url(Config::get('constants.admin').'/dashboard')); ?>" class="btn btn-outline-danger  mt-3">Back to home</a>
	
	<?php else: ?>
		
	<a href="<?php echo e(url(Config::get('constants.user').'/dashboard')); ?>" class="btn btn-outline-danger  mt-3">Back to home</a>
	
	<?php endif; ?>

<?php else: ?>
	
<?php endif; ?>
	
	
	</div>
</div>
<?php endif; ?>

</div>

</div>


</div>
    
   


<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>



<script type="text/javascript">




	$(document).ready(function(){
    $('#option_checkboxes').change(function(){
		
		
        if($(this).prop('checked') === true){			
			$('#answerdbyperson_checkboxes').attr('required', true);	

        }else{			
			$('#answerdbyperson_checkboxes').attr('required', false); 			
            
        }
    });
});
	
	


</script>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/deepredink/public_html/demos/nps/v1/resources/views/frontend/survey/first_question.blade.php ENDPATH**/ ?>