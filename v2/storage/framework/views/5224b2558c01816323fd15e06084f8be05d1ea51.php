<div class="card m-b-30" style="min-height: 372px;">
<div class="card-body">


<div class="row">				
<div class="col-12 mb-3">

<div class="kanban-tag">

<?php if($person_responses_data[0]->rating<=6): ?>
<span class="badge badge-primary-inverse font-20"><h4>Ticket Number <?php echo e($person_data->ticker_final_number??''); ?></h4></span>
<?php elseif($person_responses_data[0]->rating>6 && $person_responses_data[0]->rating<=8): ?>
<span class="badge badge-primary-inverse font-20"><h4>Ticket Number <?php echo e($person_data->ticker_final_number??''); ?></h4></span>
<?php else: ?>
<span class="badge badge-primary-inverse font-20"><h4>Feedback</h4></span>
<?php endif; ?>


</div>


</div>
</div>


<div class="row">		

<div class="col-3">
<p class="nps-score-div"><span class="nps-score"><?php echo e($person_responses_data[0]->rating??''); ?></span><br> NPS Score</p>
</div>
<div class="col-9 nps-score-details">
<p><strong><?php echo e(Str::title($person_data->firstname??'')); ?></strong></p>
<p><?php echo e($person_data->email??''); ?></p>
<p><?php echo e($person_data->mobile??''); ?></p>
<p class="mt-3">Feedback Date: <?php echo e(date('F j, Y', strtotime($person_data->created_at??''))); ?></p>
</div>
</div>

<div class="mt-4">




<?php if($person_responses_data[0]->rating<=6): ?>
<h4><span class="badge badge-danger-inverse font-14">Areas of Improvement</span></h4>
<?php elseif($person_responses_data[0]->rating>6 && $person_responses_data[0]->rating<=8): ?>
<h4><span class="badge badge-danger-inverse font-14">Areas of Improvement</span></h4>
<?php else: ?>
<h4><span class="badge badge-success-inverse font-14">Doing Well</span></h4>
<?php endif; ?>








<table class="responses-table  " style="width:100%">
<tbody>
<?php $__currentLoopData = $person_responses_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person_response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<?php if($person_response->answeredby_person== '' && $person_response->department_activities == ''): ?>

<?php else: ?>							
<tr>
<td><b><?php echo e($person_response->option_value??''); ?></b></td>
<td><?php echo e(Str::title($person_response->department_activities??'')); ?></td>
<td><?php echo e(Str::title($person_response->answeredby_person??'')); ?></td>
<td>

<?php if($person_response->department_status): ?>

<small class="text text-success">HOD taken action: <?php echo e(Str::title(Str::replace("_"," ",$person_response->department_status??''))); ?></small>
<?php endif; ?>
</td>
</tr>					
<?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


</tbody>
</table>
</div>
</div>
</div>





<!-- Start col -->


<?php if(isset($voice_message) && $voice_message->count()>0): ?>
<div class="card m-b-30" style="min-height: 372px;">
<div class="card-body">


    <div class="col-lg-6">
        <div class="card m-b-30">
            <div class="card-header">
                <h4 class="card-title">Listen to Audio Records</h4>
            </div>
            <div class="card-body">
                
                
                <?php $__currentLoopData = $voice_message; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voice_file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="audio-record-wrapper">





  <figure>
    <figcaption>Audio track <?php echo e($loop->iteration); ?></figcaption>
    <audio
        controls
        src="<?php echo e(url('/public/voice_record_files/'.$voice_file->voice_file)); ?>">
            Your browser does not support the
            <code>audio</code> element.
    </audio>
</figure>
  
  
                        
                    <div class="audio-content">
                        <p class="mb-0"><?php echo e(date('G:i A.', strtotime($voice_file->created_at??''))); ?> - <?php echo e(date('M j, Y', strtotime($voice_file->created_at??''))); ?></p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                

                
                
            </div>
        </div>
    </div>
    </div>
    </div>
    
    <?php endif; ?>
    <!-- End col -->



<?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/responses/responses_view_common.blade.php ENDPATH**/ ?>