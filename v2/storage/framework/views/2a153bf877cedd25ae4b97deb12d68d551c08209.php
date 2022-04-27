
<?php $__env->startSection('title', 'Survey Step-1'); ?>
<?php $__env->startSection('content'); ?>




	
	
       
			
			
<div class="formify_right_fullwidth align-items-center justify-content-center">

<!-- <a href="<?php echo e(route('session.logout')); ?>" class="pull-right" style="margin-left:20px;">
<img src="<?php echo e(URL::to('assets/images/svg-icon/logout.svg')); ?>" class="img-fluid" alt="apps"><span>Logout</span><i class="feather "></i>
</a> -->




<?php echo $__env->make('frontend.common_pages.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="mt-5 ml-5">

<div class="tab-content" id="myTabContent">

<?php if($Surveys->count()>0): ?>




<?php echo csrf_field(); ?>
 
<div class="box_info">


<div class="container">
<div class="row-fluid">
<div class="col-xs-12 mt-5">

<h5>Please select questionnaire to proceed feedback</h5>

	<div class="mt-5">
		<div class="background-white">           
		    <div class="button-list">
			<?php $__currentLoopData = $Surveys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			
		<?php if(auth()->user()->role==2): ?>
		<a href="<?php echo e(URL(Config::get('constants.admin').'/survey/start/'.Crypt::encryptString($value->id))); ?>">
		<button type="button" class="btn btn-rounded btn-outline-danger mb-2 mr-2"><?php echo e($value->title); ?></button>
		</a>
		<?php elseif(auth()->user()->role==3): ?>
		<a href="<?php echo e(URL(Config::get('constants.hod').'/survey/start/'.Crypt::encryptString($value->id))); ?>">
		<button type="button" class="btn btn-rounded btn-outline-danger mb-2 mr-2"><?php echo e($value->title); ?></button>
		</a>
		<?php else: ?>
		<a href="<?php echo e(URL(Config::get('constants.user').'/survey/start/'.Crypt::encryptString($value->id))); ?>">
		<button type="button" class="btn btn-rounded btn-outline-danger mb-2 mr-2"><?php echo e($value->title); ?></button>
		</a>
		<?php endif; ?>
	
	
				
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		    </div>

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


<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/frontend/survey/survey_names.blade.php ENDPATH**/ ?>