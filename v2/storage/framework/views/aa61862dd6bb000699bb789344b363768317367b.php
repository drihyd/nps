<div class="col-md-12 col-lg-12 col-xl-12 p-0">
<form class="table-filter mb-4 form-inline" action="<?php echo e(route('filter.responses')); ?>" method="post">
<?php echo csrf_field(); ?>

<?php echo $__env->make('admin.common_pages.dates_input', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.common_pages.teams',['pickteam'=>$pickteam??''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
&nbsp;
<?php if(auth()->user()->role!=7): ?>
&nbsp;
<?php echo $__env->make('admin.common_pages.surveys',['quetion'=>$quetion??''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
&nbsp;
<?php echo $__env->make('admin.common_pages.action_button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
&nbsp;

<!--
<div class="text-sm-right mt-2" style="width: 100%;">
<div class="mb-2">
<?php if(auth()->user()): ?>
<?php if(auth()->user()->role==2): ?>
<a href="<?php echo e(url(Config::get('constants.admin').'/responses')); ?>" class="btn btn-warning btn-sm mb-2">Reset</a>
<?php elseif(auth()->user()->role==3): ?>
<a href="<?php echo e(url(Config::get('constants.hod').'/responses')); ?>" class="btn btn-warning btn-sm mb-2">Reset</a>
<?php else: ?>
<a href="<?php echo e(url(Config::get('constants.user').'/responses')); ?>" class="btn btn-warning btn-sm mb-2">Reset</a>
<?php endif; ?>
<?php else: ?>
<a href="#">
<?php endif; ?>

</div>
</div>
-->

</form>


<div class="card">
<div class="card-body p-0">
							
			<!--<p class="text text-danger">Default current month data fetched on this page.</p>-->
		<ul class="nav nav-tabs custom-tab-line mb-3" id="defaultTabLine" role="tablist">
		<li class="nav-item">
		<a class="nav-link active" id="home-tab-line" data-toggle="tab" href="#home-line" role="tab" aria-controls="home-line" aria-selected="true"><i class="feather icon-user mr-2"></i>Detractors</a>
		</li>
		<li class="nav-item">
		<a class="nav-link" id="profile-tab-line" data-toggle="tab" href="#profile-line" role="tab" aria-controls="profile-line" aria-selected="false"><i class="feather icon-user mr-2"></i>Passives</a>
		</li>
		<li class="nav-item">
		<a class="nav-link" id="contact-tab-line" data-toggle="tab" href="#contact-line" role="tab" aria-controls="contact-line" aria-selected="false"><i class="feather icon-user mr-2"></i>Promoters</a>
		</li>
		</ul>
								
								
		<div class="tab-content" id="defaultTabContentLine">
		
		
		<div class="tab-pane fade active show" id="home-line" role="tabpanel" aria-labelledby="home-tab-line">
		<?php echo $__env->make('admin.responses.table_lists',['Data'=>$Detractors,'is_action_enabled'=>'yes'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>									
		</div>
		<div class="tab-pane fade" id="profile-line" role="tabpanel" aria-labelledby="profile-tab-line">

		<?php echo $__env->make('admin.responses.table_lists',['Data'=>$Passives,'is_action_enabled'=>'no'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		</div>
		<div class="tab-pane fade" id="contact-line" role="tabpanel" aria-labelledby="contact-tab-line">

		<?php echo $__env->make('admin.responses.table_lists',['Data'=>$Promoters,'is_action_enabled'=>'no'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		</div>
		</div>

							
							
                        
								
                                <div class="tab-content" id="pills-tab-justifiedContent">
							
									
                                    <div class="tab-pane fade" id="pills-profile-justified" role="tabpanel" aria-labelledby="pills-profile-tab-justified">
                                       

									   <div class="table-responsive">
        
          <table id="default-datatable" class="display table Config::get('constants.tablestriped')">
                <thead class="thead-dark">
                    <tr>
                        <!-- <th>S.No</th> -->
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Score</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
				
			
                  
                      <?php $__currentLoopData = $Passives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                          <tr>
                              <td><?php echo e(Str::title($response->firstname??'')); ?></td>
                              <td><?php echo e($response->email??''); ?></td>
                              <td><?php echo e($response->mobile??''); ?></td>
                              <td><?php echo e($response->gender??''); ?></td>
                             <td><?php echo e($response->answer??0); ?></td>
                              <td><?php echo e(date('F j, Y', strtotime($response->created_at??''))); ?></td>
                              <td>    
                              <?php if(Auth::user()->role==2): ?>         
							  <a href="<?php echo e(url(Config::get('constants.admin').'/responses/view/'.Crypt::encryptString($response->id))); ?>" class="edit mr-2" title="Edit" ><i class="fa fa-eye"></i></a>
                                <a href="<?php echo e(url(Config::get('constants.admin').'/responses/delete/'.Crypt::encryptString($response->id))); ?>" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fa fa-trash"></i></a>
                                <?php elseif(Auth::user()->role==3): ?>
								                  <a href="<?php echo e(url(Config::get('constants.hod').'/responses/view/'.Crypt::encryptString($response->id))); ?>" class="edit mr-2" title="Edit" ><i class="fa fa-eye"></i></a>
                                <a href="<?php echo e(url(Config::get('constants.hod').'/responses/delete/'.Crypt::encryptString($response->id))); ?>" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fa fa-trash"></i></a>
                                <?php elseif(Auth::user()->role==4): ?>
                                <a href="<?php echo e(url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))); ?>" class="edit mr-2" title="Edit" ><i class="fa fa-eye"></i></a>
                                <a href="<?php echo e(url(Config::get('constants.user').'/responses/delete/'.Crypt::encryptString($response->id))); ?>" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fa fa-trash"></i></a>
                                <?php else: ?>

                                <?php endif; ?>
                              </td>
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                      
            </table>
			
			</div>
                                   

								   </div>
									
                                    <div class="tab-pane fade" id="pills-contact-justified" role="tabpanel" aria-labelledby="pills-contact-tab-justified">
                                        
										
										
										
										<div class="table-responsive">
        
          <table id="default-datatable" class="display table Config::get('constants.tablestriped')">
                <thead class="thead-dark">
                    <tr>
                        <!-- <th>S.No</th> -->
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Score</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  
                      <?php $__currentLoopData = $Promoters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                          <tr>
                              <td><?php echo e(Str::title($response->firstname??'')); ?></td>
                              <td><?php echo e($response->email??''); ?></td>
                              <td><?php echo e($response->mobile??''); ?></td>
                              <td><?php echo e($response->gender??''); ?></td>
                             <td><?php echo e($response->answer??0); ?></td>
                              <td><?php echo e(date('F j, Y', strtotime($response->created_at??''))); ?></td>
                              <td>    
                              <?php if(Auth::user()->role==2): ?>         
							  <a href="<?php echo e(url(Config::get('constants.admin').'/responses/view/'.Crypt::encryptString($response->id))); ?>" class="edit mr-2" title="Edit" ><i class="fa fa-eye"></i></a>
                                <a href="<?php echo e(url(Config::get('constants.admin').'/responses/delete/'.Crypt::encryptString($response->id))); ?>" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fa fa-trash"></i></a>
                                <?php elseif(Auth::user()->role==3): ?>
								                  <a href="<?php echo e(url(Config::get('constants.hod').'/responses/view/'.Crypt::encryptString($response->id))); ?>" class="edit mr-2" title="Edit" ><i class="fa fa-eye"></i></a>
                                <a href="<?php echo e(url(Config::get('constants.hod').'/responses/delete/'.Crypt::encryptString($response->id))); ?>" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fa fa-trash"></i></a>
                                <?php elseif(Auth::user()->role==4): ?>
                                <a href="<?php echo e(url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))); ?>" class="edit mr-2" title="Edit" ><i class="fa fa-eye"></i></a>
                                <a href="<?php echo e(url(Config::get('constants.user').'/responses/delete/'.Crypt::encryptString($response->id))); ?>" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fa fa-trash"></i></a>
                                <?php else: ?>

                                <?php endif; ?>
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
                    </div> 






















		



<?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/responses/responses_list_common.blade.php ENDPATH**/ ?>