
<?php $__env->startSection('title', 'Levels'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            
             <div class="card-header">
                <h5 class="card-title"><?php echo $__env->yieldContent('title'); ?></h5>
            </div>
            <div class="card-body">
			
          <div class="table-responsive">
        
          <table id="default-datatable" class="display table Config::get('constants.tablestriped')">
                <thead class="thead-dark">
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Level Code</th>
                        <th>SLA Minutes</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  
                      <?php $__currentLoopData = $group_level_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group_level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                          <tr>
                              
                              <td><?php echo e($loop->iteration); ?></td>
                              <td><?php echo e(Str::title($group_level->name??'')); ?></td>
                              <td><?php echo e(Str::title($group_level->alias??'')); ?></td>
                              <td><?php echo e(Str::title($group_level->esc_minitues??'')); ?></td>
                              <td>
							  
							  <a href="<?php echo e(url(Config::get('constants.admin').'/designations/edit/'.Crypt::encryptString($group_level->id))); ?>" class="edit mr-2" title="Edit" ><i class="feather icon-edit-2"></i></a>
                                <a href="<?php echo e(url(Config::get('constants.admin').'/designations/delete/'.Crypt::encryptString($group_level->id))); ?>" class="delete text-danger" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="feather icon-trash"></i></a>
								
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




<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/deepredink/public_html/demos/nps/v1/resources/views/admin/designationsgroup/grouplevel_list.blade.php ENDPATH**/ ?>