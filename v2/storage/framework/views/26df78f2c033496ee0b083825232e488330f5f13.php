
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
            	<div>
                <h5 class="card-title"><?php echo e($pageTitle??''); ?></h5>
                </div>
                <?php if(!isset($theme_options_data->id)): ?>
			<div class="float-right">
			<a href="<?php echo e(url(Config::get('constants.superadmin').'/theme_options/create')); ?>" class="btn btn-primary btn-sm ">+ Add</a>
			</div>
			<?php else: ?>
 <?php endif; ?>
            </div>
            <div class="card-body">
            	<div class="row">
		 	<div class="col-sm-6">
		 		<div class="row form-row">
		 			<h4 class="col-auto">Header Logo</h4>
		 			<div class="col">
		 				<?php if(isset($theme_options_data->header_logo) && !empty($theme_options_data->header_logo)): ?> 
		 				<img src="<?php echo e(asset('assets/uploads/' . $theme_options_data->header_logo??'')); ?>" width="100" />
		 				<?php else: ?>
		 				<?php endif; ?>
		 			</div>
		 		</div><br>
		 		<div class="row form-row">
		 			<h4 class="col-auto">Favicon</h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 			<div class="col">
		 				<?php if(isset($theme_options_data->favicon) && !empty($theme_options_data->favicon)): ?> 
		 				<img src="<?php echo e(asset('assets/uploads/' . $theme_options_data->favicon??'')); ?>" width="50" />
		 				<?php else: ?>
		 				<?php endif; ?>
		 			</div>
		 		</div>						 		
		 	</div>
		 	<div class="col-sm-6">
		 		<div class="row form-row">
		 			<h4 class="col-auto">Copyright</h4>
		 			<div class="col">
		 				<?php echo e($theme_options_data->copyright??''); ?>

		 			</div>
		 		</div>					 		
		 	</div>
		 </div>
                
            </div>
            <div class="card-footer text-right">
        <a href="<?php echo e(url(Config::get('constants.superadmin').'/theme_options/edit/'.$theme_options_data->id)); ?>" class="edit mr-2" title="Edit" ><i class="fa fa-edit"></i></a>
        <a href="<?php echo e(url(Config::get('constants.superadmin').'/theme_options/delete/'.$theme_options_data->id)); ?>" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fa fa-trash"></i></a>
    </div>
        </div>

    </div>
    <!-- End col -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/themeoptions/theme_options_list.blade.php ENDPATH**/ ?>