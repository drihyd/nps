
<?php $__env->startSection('title', Str::title($person_data->firstname??'')); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <!-- End col -->
    <div class="col-lg-7">
        <?php echo $__env->make('admin.responses.responses_view_common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="col-lg-5">
	

	
        <?php echo $__env->make('admin.responses.responses_updatestatus_common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.responses.responses_status_activities_common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		
	
		

    </div>  
    <!-- End col -->
    <!-- Start col -->
    
    <!-- End col -->
    <!-- Start col -->
    <!-- <div class="col-lg-12 col-xl-6">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Combodate (datetime)</h5>
            </div>
            <div class="card-body">                                
                <a href="#" id="xeditable-event" class="editable editable-click editable-empty"></a>
            </div>
        </div>
    </div>  --> 
    <!-- End col -->
</div>
<div class=" pb-5">
<?php if(Auth::user()->role==2): ?> 
<a href="<?php echo e(url(Config::get('constants.admin').'/responses')); ?>" class="btn btn-danger btn-sm">Back</a>
    <?php elseif(Auth::user()->role==3): ?>
<a href="<?php echo e(url(Config::get('constants.user').'/responses')); ?>" class="btn btn-danger btn-sm">Back</a>
<?php elseif(Auth::user()->role==4): ?>
<a href="<?php echo e(url(Config::get('constants.user').'/responses')); ?>" class="btn btn-danger btn-sm">Back</a>
<?php else: ?>
<?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/deepredink/public_html/demos/nps/v1/resources/views/admin/responses/responses_view.blade.php ENDPATH**/ ?>