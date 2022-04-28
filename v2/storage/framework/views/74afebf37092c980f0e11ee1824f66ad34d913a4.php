
<?php $__env->startSection('title', $Pagetitle); ?>
<?php $__env->startSection('content'); ?>

<div class="formify_right_fullwidth align-items-center justify-content-center">




<?php echo $__env->make('frontend.common_pages.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="formify_box_checkbox background-white">
<?php echo $__env->make('frontend.common_pages.survey_description', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="tab-content" id="myTabContent">








 
<div class="box_info">




    <h3><?php echo e($Pagetitle); ?></h3>   
  
    <div id="controls">
  	 <button id="recordButton" class="btn btn-outline-danger  mt-3">Start Record</button>
  	 <button id="pauseButton" disabled class="btn btn-outline-danger  mt-3">Pause</button>
  	 <button id="stopButton" disabled class="btn btn-outline-danger  mt-3">Stop</button>
    </div>
    <div id="formats">Format: start recording to see sample rate</div>
  	<p><strong>Recordings:</strong></p>
  	<ol id="recordingsList"></ol>
   
 
 
 
<div class="row">
<div class="col-md-12 text-center">
<h5 class="text text-success">Please click here to redirect your dashboard after complete voice record.</h5>

<?php if(auth()->user()): ?>
	<?php if(auth()->user()->role==2): ?>		
	<a href="<?php echo e(url(Config::get('constants.admin').'/dashboard')); ?>" class="btn btn-outline-danger  mt-3">Back to home</a>	
	<?php elseif(auth()->user()->role==3): ?>		
	<a href="<?php echo e(url(Config::get('constants.hod').'/dashboard')); ?>" class="btn btn-outline-danger  mt-3">Back to home</a>
	<?php else: ?>		
	<a href="<?php echo e(url(Config::get('constants.user').'/dashboard')); ?>" class="btn btn-outline-danger  mt-3">Back to home</a>	
	<?php endif; ?>

<?php else: ?>

<?php endif; ?>


</div>
</div>
 
 
		  
      
</div>

</div>

</form>


</div>


</div> 
 

   


<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>


<script>


var person_id_="<?php echo e(Session::get('person_id')); ?>";
var posturl_voicefile="<?php echo e(route('post.voice.message.file')); ?>";
</script>


<script src="<?php echo e(URL::to('assets/js/voice_js/recorder.js')); ?>"></script>
<script src="<?php echo e(URL::to('assets/js/voice_js/app.js')); ?>"></script>






<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/frontend/survey/voice_message.blade.php ENDPATH**/ ?>