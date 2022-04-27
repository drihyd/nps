<div class="table-responsive">
									   
									   
									   
        
          <table id="default-datatable" class="display table Config::get('constants.tablestriped')">
		  
		  
                <thead class="thead-dark">
                    <tr>
                         <th>S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Score</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  
                      <?php $__currentLoopData = $Data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                          <tr>
                              <td><?php echo e($loop->iteration); ?></td>
                              <td><?php echo e(Str::title($response->firstname??'')); ?></td>
                              <td><?php echo e($response->email??''); ?></td>
                              <td><?php echo e($response->mobile??''); ?></td>
                              <td><?php echo e($response->gender??''); ?></td>
                              <td><?php echo e($response->answer??0); ?></td>
                              <td><?php echo e(date('F j, Y', strtotime($response->created_at??''))); ?></td>
							  
							  <td>
							  <p class="font-15 mb-0">
							  
									<?php if($response->ticket_status=="opened"): ?>
									<span class="badge badge-danger"><?php echo e($response->ticket_status??''); ?></span>
									<?php elseif($response->ticket_status=="completed"): ?>
									<span class="badge badge-success"><?php echo e($response->ticket_status??''); ?></span>
									<?php else: ?>
									<span class="badge badge-primary"><?php echo e($response->ticket_status??''); ?></span>
									<?php endif; ?>
							  
							  </p>
							  
							  
							  </td>
							  
                              <td>    
                              <?php if(Auth::user()->role==2): ?>         
							  <a href="<?php echo e(url(Config::get('constants.admin').'/responses/view/'.Crypt::encryptString($response->id))); ?>" class="text-primary mr-2" title="Edit" ><i class="feather icon-edit-2"></i></a>
                                <a href="<?php echo e(url(Config::get('constants.admin').'/responses/delete/'.Crypt::encryptString($response->id))); ?>" class="delete text-danger" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="feather icon-trash"></i></a>
                                <?php elseif(Auth::user()->role==3): ?>
								                  <a href="<?php echo e(url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))); ?>" class="text-primary mr-2" title="Edit" ><i class="feather icon-edit-2"></i></a>
                                <a href="<?php echo e(url(Config::get('constants.user').'/responses/delete/'.Crypt::encryptString($response->id))); ?>" class="delete text-danger" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="feather icon-trash"></i></a>
                                <?php elseif(Auth::user()->role==4): ?>
                                <a href="<?php echo e(url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))); ?>" class="text-primary mr-2" title="Edit" ><i class="feather icon-edit-2"></i></a>
                                <a href="<?php echo e(url(Config::get('constants.user').'/responses/delete/'.Crypt::encryptString($response->id))); ?>" class="delete text-danger" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="feather icon-trash"></i></a>
                                <?php else: ?>

                                <?php endif; ?>
                              </td>
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                      
            </table>
			
			
			
			
			
			
			</div>


<?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/responses/table_lists.blade.php ENDPATH**/ ?>