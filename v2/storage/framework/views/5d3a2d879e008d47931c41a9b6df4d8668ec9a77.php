<?php
use App\Models\User;
?>

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
                    <form class="table-filter mb-4 form-inline" action="<?php echo e(route('filter.roles')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo $__env->make('admin.common_pages.roles',['role'=>$role??''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        &nbsp;
                        <?php echo $__env->make('admin.common_pages.action_button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        &nbsp;
                        <div class="form-group mb-2">
                        <?php if(auth()->user()): ?>
                        <?php if(auth()->user()->role==2): ?>
                        <a href="<?php echo e(url(Config::get('constants.admin').'/users')); ?>">Clear filter</a>
                        <?php else: ?>
                        <a href="<?php echo e(url(Config::get('constants.user').'/users')); ?>">Clear filter</a>
                        <?php endif; ?>
                        <?php else: ?>
                        <a href="#">
                        <?php endif; ?>
                        </div>
                    </form>

			
          <div class="table-responsive">
        
          <table id="default-datatable" class="display nowrap table Config::get('constants.tablestriped')" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th>S.No</th>
                        <th>User Details</th>
                        <!-- <th>Email/Username</th> -->
                        <th>Decrypt Password</th>
                        <!-- <th>Phone</th> -->
                        <th>Designation</th>
                        <th>Team</th>
                        <th>Reporting To</th>
                        <th>Is Active</th>
                      
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>			
		
                  
                      <?php $__currentLoopData = $users_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                          <tr>
                              
                              <td><?php echo e($loop->iteration); ?></td>
                              <td><b><?php echo e(Str::title($user->firstname??'')); ?> <?php echo e(Str::title($user->lastname??'')); ?></b><br><?php echo e($user->email??''); ?><br><?php echo e($user->phone??''); ?></td>
                              <!-- <td></td> -->
                              <td><?php echo e($user->decrypt_password??''); ?></td>
                              <!-- <td></td> -->
                              <td><?php echo e($user->ut_name??''); ?></td>
                              <td><?php echo e($user->dname??''); ?></td>
                              <?php
                              $Report_person=User::select('departments.department_name as dname','users.id as uid','users.email as uemail','users.firstname as uname')
                                ->leftJoin('departments','departments.id', '=', 'users.department')
                                ->where("users.organization_id",Auth::user()->organization_id)
                                ->where("users.id",$user->reportingto)
                                ->get()->first();

                              ?>

                              <td><?php echo e(ucwords($Report_person->uname??'')); ?>-<?php echo e(ucwords($Report_person->uemail??'')); ?>-<?php echo e(ucwords($Report_person->dname??'')); ?></td>
                              <?php if($user->is_active_status??'' == 1): ?>
                           <td>Yes</td>
                           <?php else: ?>
                            <td>No</td>
                           <?php endif; ?>
                              
                              <td>

							  
							  <a href="<?php echo e(url(Config::get('constants.admin').'/user/edit/'.Crypt::encryptString($user->id))); ?>" class="edit mr-2" title="Edit" ><i class="feather icon-edit-2"></i></a>
                                <a href="<?php echo e(url(Config::get('constants.admin').'/user/delete/'.Crypt::encryptString($user->id))); ?>" class="delete text-danger" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="feather icon-trash"></i></a>
								
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




<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/deepredink/public_html/demos/nps/v1/resources/views/admin/department_users/users_list.blade.php ENDPATH**/ ?>