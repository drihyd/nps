        <div class="card m-b-30" style="min-height: 372px;">
            <div class="card-body">
			
			
			    <div class="row">				
				 <div class="col-12 mb-3">
				 
				<div class="kanban-tag">
                                                        <span class="badge badge-primary-inverse font-16"><h4>Ticket Number <?php echo e($person_data->ticker_final_number??''); ?></h4></span>
                                                    </div>
				 
                        
                    </div>
					</div>
					
					
                <div class="row">		
				
                    <div class="col-3">
                        <p class="nps-score-div"><span class="nps-score"><?php echo e($person_responses_data[0]->option_value??''); ?></span><br> NPS Score</p>
                    </div>
                    <div class="col-9 nps-score-details">
                        <p><strong><?php echo e(Str::title($person_data->firstname??'')); ?></strong></p>
                        <p><?php echo e($person_data->email??''); ?></p>
                        <p><?php echo e($person_data->mobile??''); ?></p>
                        <p class="mt-3">Feedback Date: <?php echo e(date('F j, Y', strtotime($person_data->created_at??''))); ?></p>
                    </div>
                </div>
                
                <div class="mt-4">
                    <h4><span class="badge badge-danger-inverse font-14">Areas of Improvement</span></h4>
                    <table class="responses-table  " style="width:100%">
                        <tbody>
                            <?php $__currentLoopData = $person_responses_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person_response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
							<?php if($person_response->answeredby_person== '' && $person_response->department_activities == ''): ?>
                        							
							<?php else: ?>							
							 <tr>
                                <td><b><?php echo e($person_response->option_value??''); ?></b></td>
                                <td><?php echo e(Str::title($person_response->department_activities??'')); ?></td>
                                <td><?php echo e(Str::title($person_response->answeredby_person??'')); ?></td>
                            </tr>					
                            <?php endif; ?>
							
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

<?php /**PATH /home/deepredink/public_html/demos/nps/v1/resources/views/admin/responses/responses_view_common.blade.php ENDPATH**/ ?>