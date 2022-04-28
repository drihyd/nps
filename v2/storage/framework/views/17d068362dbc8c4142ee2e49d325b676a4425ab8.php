
<?php $__env->startSection('title', Str::title($person_data->firstname??'')." Feedback"); ?>
<?php $__env->startSection('content'); ?>




	
	
       
			
			
<div class="" >

<!-- <a href="<?php echo e(route('session.logout')); ?>" class="pull-right" style="margin-left:20px;">
<img src="<?php echo e(URL::to('assets/images/svg-icon/logout.svg')); ?>" class="img-fluid" alt="apps"><span>Logout</span><i class="feather "></i>
</a> -->




<?php echo $__env->make('frontend.common_pages.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



	
	


<div class="formify_box formify_box_checkbox background-white">
<div class="formify_header">
<h4 class="form_title"><?php echo $__env->yieldContent('title'); ?></h4>
<div class="border ml-0"></div>
</div>
<div class="tab-content" id="myTabContent">


 
<div class="box_info">


<div class="container">
<div class="row">
<div class="col-xs-12">
	
        <div class="card m-b-30">
            <div class="card-header">
                <h6>Feedback from <?php echo e(Str::title($person_data->firstname??'')); ?> on <?php echo e(date('F j, Y', strtotime($person_data->created_at??''))); ?></h6>
               
            </div>
            <div class="card-body">
                <?php $__currentLoopData = $person_responses_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person_response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <b><?php echo e($loop->iteration); ?>) <?php echo e(Str::replace('*teamname*', $person_response->option_value??'', $person_response->question_label??'')); ?></b>&ensp;&nbsp;
                <?php if($person_response->answeredby_person == ''): ?>
                <p>A) <?php echo e($person_response->option_value??''); ?></p>
                <?php else: ?>
                    <p>A) <?php echo e($person_response->answeredby_person??''); ?></p>
                <?php endif; ?>
                <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
				<a href="<?php echo e(url('user/responses')); ?>" class="btn btn-success  mt-3">Go to Survey users</a>

</div>




</div>


</div>

</div>

</div>
    
   


<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/frontend/responses/responses_view.blade.php ENDPATH**/ ?>