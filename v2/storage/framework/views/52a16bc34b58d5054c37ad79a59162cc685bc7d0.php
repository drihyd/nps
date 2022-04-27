
<?php $__env->startSection('title', 'Activities'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            
             <div class="card-header">
                <h5 class="card-title"><?php echo $__env->yieldContent('title'); ?></h5>
            </div>
            <div class="card-body">
                 <form class="table-filter form-inline mb-4" action="<?php echo e(route('filter.teams')); ?>" method="post">
<?php echo csrf_field(); ?>
<?php echo $__env->make('admin.common_pages.departments',['team'=>$team??''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
&nbsp;
<?php echo $__env->make('admin.common_pages.action_button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
&nbsp;
<div class="form-group mb-2">
<?php if(auth()->user()): ?>
<?php if(auth()->user()->role==2): ?>
<a href="<?php echo e(url(Config::get('constants.admin').'/activities')); ?>">Clear filter</a>
<?php else: ?>
<a href="<?php echo e(url(Config::get('constants.user').'/activities')); ?>">Clear filter</a>
<?php endif; ?>
<?php else: ?>
<a href="#">
<?php endif; ?>

</div>




</form>
			
          <div class="table-responsive">
        
          <table id="default-datatable" class="display table Config::get('constants.tablestriped')">
                <thead class="thead-dark">
                    <tr>
                        <th>S.No</th>
                        <th>Activity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  
                      <?php $__currentLoopData = $activities_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                          <tr>
                              
                              <td><?php echo e($loop->iteration); ?></td>
                              <td><?php echo e(Str::title($activity->activity_name??'')); ?></td>
                              
                           
                              
                              <td>
							  
							  <a href="<?php echo e(url(Config::get('constants.admin').'/activities/edit/'.Crypt::encryptString($activity->id))); ?>" class="edit mr-2" title="Edit" ><i class="feather icon-edit-2"></i></a>
                                <a href="<?php echo e(url(Config::get('constants.admin').'/activities/delete/'.Crypt::encryptString($activity->id))); ?>" class="delete text-danger" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="feather icon-trash"></i></a>
								
                              </td>
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                      
            </table>
			
			</div>
        </div>
      </div>
</div>
</div>
        <?php $__env->stopSection(); ?>




<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/activities/activities_list.blade.php ENDPATH**/ ?>