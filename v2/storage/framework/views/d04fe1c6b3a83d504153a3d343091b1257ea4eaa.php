
<?php $__env->startSection('title', 'Users'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            
             <div class="card-header">
                <h5 class="card-title">List of all users</h5>
            </div>
            <div class="card-body">
			
          <div class="table-responsive">
        
          <table id="default-datatable" class="display table Config::get('constants.tablestriped')">
                <thead class="thead-dark">
                    <tr>
                        <th>S.No</th>
                        <th>Organization</th>
                        <th>Name</th>
                        <th>Email/Username</th>
                       <th>Password</th>
                        <th>Phone</th>
                        <th>Role</th>
                      
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  
                      <?php $__currentLoopData = $users_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                          <tr>
                              
                              <td><?php echo e($loop->iteration); ?></td>
                              <td><?php echo e(Str::title($user->org_short_name??'')); ?></td>
                              <td><?php echo e(Str::title($user->firstname??'')); ?> <?php echo e(Str::title($user->lastname??'')); ?></td>
                              <td><?php echo e($user->email??''); ?></td>
                             <td><?php echo e($user->decrypt_password??''); ?></td>
                              <td><?php echo e($user->phone??''); ?></td>
                              <td><?php echo e($user->ut_name??''); ?></td>
                              
                           
                              
                              <td>
							  
							  <a href="<?php echo e(url(Config::get('constants.superadmin').'/organizations/edit/'.Crypt::encryptString($user->organization_id))); ?>" class="edit mr-2" title="Edit" ><i class="fa fa-edit"></i></a>
								
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




<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/users/users_list.blade.php ENDPATH**/ ?>