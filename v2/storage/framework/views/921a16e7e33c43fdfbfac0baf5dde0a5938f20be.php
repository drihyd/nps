<?php if(isset($person_responses_data[0]->ticket_status)): ?>
<div class="card m-b-30">
    <div class="card-header">                                
        <div class="row align-items-center">
            <div class="col-7">
                <h5 class="card-title mb-0">Recent Activity</h5>
            </div>
            <!-- <div class="col-5">
                <button class="btn btn-secondary-rgba float-right font-13">View All</button>
            </div> -->
        </div>
    </div>
    <div class="card-body">
        <div class="activities-history">
            <?php $__currentLoopData = $person_responses_status_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person_responses_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="activities-history-list">
                <div class="activities-history-item">

                    <?php if($person_responses_status->ticket_status=="opened"): ?>
                    <h6 class="badge badge-danger">Opened</h6>
                    <?php elseif($person_responses_status->ticket_status== "phone_ringing_no_response"): ?>
                    <h6 class="badge badge-primary">Phone Ringing - No Response</h6>
                    <p><b>Remarks: </b><?php echo e($person_responses_status->ticket_remarks??''); ?></p>
                    <?php elseif($person_responses_status->ticket_status=="connected_refused_to_talk"): ?>
                    <h6 class="badge badge-primary">Connected - Refused to talk</h6>
                    <p><b>Remarks: </b><?php echo e($person_responses_status->ticket_remarks??''); ?></p>
                    <?php elseif($person_responses_status->ticket_status=="connected_asked_for_call_back"): ?>
                    <h6 class="badge badge-primary">Connected - Asked for call back</h6>
                    <p><b>Remarks: </b><?php echo e($person_responses_status->ticket_remarks??''); ?></p>
                    <?php elseif($person_responses_status->ticket_status=="closed_satisfied"): ?>
                    <h6 class="badge badge-success">Closed - Satisfied</h6>
                    <p><b>Remarks: </b><?php echo e($person_responses_status->ticket_remarks??''); ?></p>
                    <?php elseif($person_responses_status->ticket_status=="closed_unsatisfied"): ?>
                    <h6 class="badge badge-success">Closed - Unsatisfied</h6>
                    <p><b>Remarks: </b><?php echo e($person_responses_status->ticket_remarks??''); ?></p>
                    <?php else: ?>
                    <?php endif; ?>                                          
                    
                    <p class="mb-0"><?php echo e(date('G:i A.', strtotime($person_responses_status->created_at??''))); ?> - <?php echo e(date('M j, Y', strtotime($person_responses_status->created_at??''))); ?></p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="activities-history-list">
                <div class="activities-history-item">
                    <h6 class="badge badge-danger">Opened</h6>
                    <p class="mb-0"><?php echo e(date('G:i A.', strtotime($person_responses_data[0]->created_at??''))); ?> - <?php echo e(date('M j, Y', strtotime($person_responses_data[0]->created_at??''))); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endif; ?><?php /**PATH /home/deepredink/public_html/demos/nps/v1/resources/views/admin/responses/responses_status_activities_common.blade.php ENDPATH**/ ?>