
<?php $__env->startSection('title', 'Survey users'); ?>
<?php $__env->startSection('content'); ?>




	
	
       
			
			
<div class="" style="">

<!-- <a href="<?php echo e(route('session.logout')); ?>" class="pull-right" style="margin-left:20px;">
<img src="<?php echo e(URL::to('assets/images/svg-icon/logout.svg')); ?>" class="img-fluid" alt="apps"><span>Logout</span><i class="feather "></i>
</a> -->




<?php echo $__env->make('frontend.common_pages.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	

	
	


<div class="formify_box formify_box_checkbox background-white" style="max-width:620px;">
<div class="formify_header">
<h4 class="form_title"><?php echo $__env->yieldContent('title'); ?></h4>
<div class="border ml-0"></div>
</div>
<div class="tab-content" id="myTabContent">


 
<div class="box_info">


<div class="container">
<div class="row">
<div class="col-xs-12">
	
          <div class="table-responsive">
        
          <table id="default-datatable" class="display table Config::get('constants.tablestriped')">
                <thead class="" style="background:#ffeff9;">
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  
                      <?php $__currentLoopData = $responses_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                          <tr>
                              
                              <td><?php echo e($loop->iteration); ?></td>
                              <td><?php echo e(Str::title($response->firstname??'')); ?></td>
                              <td><?php echo e($response->email??''); ?></td>
                              <td><?php echo e($response->mobile??''); ?></td>
                              <td>             
							  <a href="<?php echo e(url('user/responses/view/'.Crypt::encryptString($response->id))); ?>" class="edit mr-2" title="Edit" ><i class="fa fa-eye"></i></a>
                                <a href="<?php echo e(url('user/responses/delete/'.Crypt::encryptString($response->id))); ?>" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fa fa-trash"></i></a>
								
                              </td>
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                      
            </table>
            <a href="<?php echo e(url('user/survey')); ?>" class="btn thm_btn next_tab text-transform-inherit mt-3">Back to Start Survey</a>
			
			</div>





</div>




</div>


</div>

</div>

</div>
    
   


<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/frontend/responses/responses_list.blade.php ENDPATH**/ ?>