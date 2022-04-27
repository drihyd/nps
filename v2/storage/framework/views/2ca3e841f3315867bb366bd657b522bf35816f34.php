<div class="table-responsive">
									   
									   
									   
        
          <table  id="default-datatable" class="nowrap display table Config::get('constants.tablestriped')">
		  
		  
                <thead class="thead-dark">
                    <tr>
                         <th>S.No</th>
                        <th>Customer</th>      
                        <!-- <th>Gender</th> -->
                        <th>Ticket Number</th>
                        <th>Score</th>
                        <th>Feedback Date</th>
                        <th>Last Updated Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
				
			
                  
                      <?php $__currentLoopData = $Data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                          <tr>
                              <td><?php echo e($loop->iteration); ?></td>

                              <td><b><?php echo e(Str::title($response->firstname??'')); ?></b><br><?php echo e($response->email??''); ?><br><?php echo e($response->mobile??''); ?><br>Gender: <?php echo e(Str::title($response->gender??'')); ?></td>
                              <td>
							  <?php if(Auth::user()->role==2): ?>         
							  <a href="<?php echo e(url(Config::get('constants.admin').'/responses/view/'.Crypt::encryptString($response->id))); ?>" class="text-primary mr-2" title="Edit" ><?php echo e(Str::title($response->ticker_final_number??'')); ?></a><br><small><?php echo e($response->survey_title??''); ?></small>
                               
                                <?php elseif(Auth::user()->role==3): ?>
								 <a href="<?php echo e(url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))); ?>" class="text-primary mr-2" title="Edit" ><?php echo e(Str::title($response->ticker_final_number??'')); ?></a><br><small><?php echo e($response->survey_title??''); ?></small>
                                
                                <?php elseif(Auth::user()->role==4): ?>
                                <a href="<?php echo e(url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))); ?>" class="text-primary mr-2" title="Edit" ><?php echo e(Str::title($response->ticker_final_number??'')); ?></a><br><small><?php echo e($response->survey_title??''); ?></small>
                               
                                <?php else: ?>

                                <?php endif; ?>
							  
							  
							  
							  </td>
                              <td><?php echo e($response->answer??0); ?></td>
                              <td><?php echo e(date('F j, Y', strtotime($response->created_at??''))); ?></td>
                              <td><?php echo e(date('F j, Y', strtotime($response->last_action_date??''))); ?></td>
							  
							  <td>
							  <p class="font-15 mb-0">
							  
									<?php if($response->ticket_status=="opened"): ?>
									<span class="badge badge-danger">Opened</span>
									<?php elseif($response->ticket_status== "phone_ringing_no_response"): ?>
									<span class="badge badge-primary">Phone Ringing - No Response</span>
									<?php elseif($response->ticket_status=="connected_refused_to_talk"): ?>
									<span class="badge badge-primary">Connected - Refused to talk</span><?php elseif($response->ticket_status=="connected_asked_for_call_back"): ?>
									<span class="badge badge-primary">Connected - Asked for call back</span><?php elseif($response->ticket_status=="closed_satisfied"): ?>
									<span class="badge badge-success">Closed - Satisfied</span>
									<?php elseif($response->ticket_status=="closed_unsatisfied"): ?>
									<span class="badge badge-success">Closed - Unsatisfied</span>
									<?php else: ?>
									<?php endif; ?>
							  
							  </p>
							  
							  
							  </td>
							  
                              <td>    
                              <?php if(Auth::user()->role==2): ?>         
							  <a href="<?php echo e(url(Config::get('constants.admin').'/responses/view/'.Crypt::encryptString($response->id))); ?>" class="text-primary mr-2" title="Edit" ><i class="feather icon-eye"></i></a>
                                <a href="<?php echo e(url(Config::get('constants.admin').'/responses/delete/'.Crypt::encryptString($response->id))); ?>" class="delete text-danger" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="feather icon-trash"></i></a>
                                <?php elseif(Auth::user()->role==3): ?>
								                  <a href="<?php echo e(url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))); ?>" class="text-primary mr-2" title="Edit" ><i class="feather icon-eye"></i></a>
                                <a href="<?php echo e(url(Config::get('constants.user').'/responses/delete/'.Crypt::encryptString($response->id))); ?>" class="delete text-danger" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="feather icon-trash"></i></a>
                                <?php elseif(Auth::user()->role==4): ?>
                                <a href="<?php echo e(url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))); ?>" class="text-primary mr-2" title="Edit" ><i class="feather icon-eye"></i></a>
                                <a href="<?php echo e(url(Config::get('constants.user').'/responses/delete/'.Crypt::encryptString($response->id))); ?>" class="delete text-danger" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="feather icon-trash"></i></a>
                                <?php else: ?>

                                <?php endif; ?>
                              </td>
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                      
            </table>
			
			
			
			
			
			
			</div>


<?php /**PATH /home/deepredink/public_html/demos/nps/v1/resources/views/admin/responses/table_lists.blade.php ENDPATH**/ ?>