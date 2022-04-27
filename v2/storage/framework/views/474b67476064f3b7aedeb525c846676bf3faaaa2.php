
<?php $__env->startSection('title', 'Survey Step-1'); ?>
<?php $__env->startSection('content'); ?>




	
	
       
			
			
<div class="justify-content-center">




<?php echo $__env->make('frontend.common_pages.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	


<div class="formify_box formify_box_checkbox background-white">
<?php echo $__env->make('frontend.common_pages.survey_description', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<br>
<div class="tab-content" id="myTabContent">



<?php if($Surveys->count()>0): ?>





<?php echo csrf_field(); ?>
 
<div class="box_info">


<div class="container">
<div class="row">
<div class="col-xs-12">

<div class="">


<div class="background-white">
                    
    <div class="button-list">
        <a href="<?php echo e(URL('user/takesurvey/'.Crypt::encryptString($Surveys[0]->id))); ?>">
		<button type="button" class="btn btn-rounded btn-outline-danger">Manual Survey</button>
		</a>
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

<!-- <ul class="nav nav-tabs form_tab" id="myTab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="One-tab" data-toggle="tab" href="#One" role="tab"
aria-controls="One" aria-selected="true"></a>
</li>
<li class="nav-item">
<a class="nav-link" id="Two-tab" data-toggle="tab" href="#Two" role="tab"
aria-controls="Two" aria-selected="false"></a>
</li>
<li class="nav-item">
<a class="nav-link" id="Three-tab" data-toggle="tab" href="#Three" role="tab"
aria-controls="Three" aria-selected="false"></a>
</li>
</ul> -->

</div>
    
   


<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/frontend/survey/survey_method.blade.php ENDPATH**/ ?>