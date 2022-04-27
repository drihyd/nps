<?php if(isset($person_responses_data[0]->ticket_status)): ?>
<div class="card m-b-30">
<div class="card-header">
<span class="badge badge-primary-inverse font-20"><h4>Update Ticket <?php echo e($person_responses_data[0]->ticker_final_number); ?> Status <!--to <?php echo e(Str::title($person_data->firstname??'')); ?>--> </span></h4>

</div>
<div class="card-body">
<form id="crudTable" action="<?php echo e(url('responses/update_status')); ?> " method="POST"  enctype="multipart/form-data">
<?php echo csrf_field(); ?>
<input type="hidden" name="id" value="<?php echo e($person_data->id??0); ?>">
<input type="hidden" name="logged_user_id" value="<?php echo e($person_data->logged_user_id); ?>">
<input type="hidden" name="organization_id" value="<?php echo e($person_data->organization_id); ?>">
<input type="hidden" name="survey_id" value="<?php echo e($person_data->survey_id); ?>">

<div class="form-group" id="survey_id">

<label for="survey_id">

<?php if(Auth::user()->role==2): ?>
Remarks 
<?php elseif(Auth::user()->role==3): ?>
Remarks
<?php else: ?>
Remarks 
<?php endif; ?>
 
<span class="text-red"style="color: red;">*</span></label>


<textarea maxlength="250" name="ticket_remarks" id="ticket_remarks" class="form-control tikcet_remark_status_update" required="required" rows="4"><?php echo e(old('ticket_remarks',$person_responses_data[0]->ticket_remarks??'')); ?></textarea>
<span id="rchars">250</span> Character(s) Remaining


</div>


<div class="form-group">
<label for="survey_id">Status<span class="text-red"style="color: red;">*</span></label>
<select name="ticket_status" class="form-control" required="required" onchange = "EnableDisableTextBox(this.value)">


<?php if(Auth::user()->role==2 ||  Auth::user()->role==4 ): ?>
<option value="opened" <?php echo e(old('ticket_status',$person_responses_data[0]->ticket_status??'') == 'opened'? 'selected':''); ?>>Opened</option>

<option value="phone_ringing_no_response" <?php echo e(old('ticket_status',$person_responses_data[0]->ticket_status??'') == 'phone_ringing_no_response'? 'selected':''); ?>>Phone Ringing - No Response</option>
<option value="connected_refused_to_talk" <?php echo e(old('ticket_status',$person_responses_data[0]->ticket_status??'') == 'connected_refused_to_talk'? 'selected':''); ?>>Connected - Refused to talk</option>
<option value="connected_asked_for_call_back" <?php echo e(old('ticket_status',$person_responses_data[0]->ticket_status??'') == 'connected_asked_for_call_back'? 'selected':''); ?>>Connected - Asked for call back</option>
<option value="closed_satisfied" <?php echo e(old('ticket_status',$person_responses_data[0]->ticket_status??'') == 'closed_satisfied'? 'selected':''); ?>> Closed - Satisfied</option>
<option value="closed_unsatisfied" <?php echo e(old('ticket_status',$person_responses_data[0]->ticket_status??'') == 'closed_unsatisfied'? 'selected':''); ?>>Closed - Unsatisfied</option>
<option value="assigned" <?php echo e(old('ticket_status',$person_responses_data[0]->ticket_status??'') == 'assigned'? 'selected':''); ?>>Assign Ticket</option>
<?php elseif(Auth::user()->role==3): ?>
<!--
<option value="">--Pick one--</option>
<option value="patient_level_closure" <?php echo e(old('ticket_status',$person_responses_data[0]->ticket_status??'') == 'patient_level_closure'? 'selected':''); ?>>Patient level Closure</option>
<option value="process_level_closure" <?php echo e(old('ticket_status',$person_responses_data[0]->ticket_status??'') == 'process_level_closure'? 'selected':''); ?>>Process level closure</option>
<option value="assigned" <?php echo e(old('ticket_status',$person_responses_data[0]->ticket_status??'') == 'assigned'? 'selected':''); ?>>Assign Ticket</option>
<option value="transferred" <?php echo e(old('ticket_status',$person_responses_data[0]->ticket_status??'') == 'transferred'? 'selected':''); ?>>Transferred</option>
-->

<option value="">--Pick one--</option>
<option value="patient_level_closure">Patient level Closure</option>
<option value="process_level_closure">Process level closure</option>
<option value="assigned">Assign Ticket</option>
<option value="transferred">Transferred</option>

<?php elseif(Auth::user()->role==7): ?>
<option value="">--Pick one--</option>

<option value="phone_ringing_no_response" <?php echo e(old('ticket_status',$person_responses_data[0]->ticket_status??'') == 'phone_ringing_no_response'? 'selected':''); ?>>Phone Ringing - No Response</option>
<option value="connected_refused_to_talk" <?php echo e(old('ticket_status',$person_responses_data[0]->ticket_status??'') == 'connected_refused_to_talk'? 'selected':''); ?>>Connected - Refused to talk</option>
<option value="connected_asked_for_call_back" <?php echo e(old('ticket_status',$person_responses_data[0]->ticket_status??'') == 'connected_asked_for_call_back'? 'selected':''); ?>>Connected - Asked for call back</option>
<option value="closed_satisfied" <?php echo e(old('ticket_status',$person_responses_data[0]->ticket_status??'') == 'closed_satisfied'? 'selected':''); ?>> Closed - Satisfied</option>
<option value="closed_unsatisfied" <?php echo e(old('ticket_status',$person_responses_data[0]->ticket_status??'') == 'closed_unsatisfied'? 'selected':''); ?>>Closed - Unsatisfied</option>

<?php else: ?>

<?php endif; ?>
</select>
</div>


	
<div class="hide_process_level_option" style="display:none;">

<div class="form-group">
<label for="survey_id">
Process level closure:
<span class="text-red"style="color: red;">*</span></label>
<textarea maxlength="250" name="process_level_closure" id="process_level_closure" class="form-control process_level_closure"  rows="4"><?php echo e(old('process_level_closure',$person_responses_data[0]->process_level_closure??'')); ?></textarea>
<span id="rchars_option">250</span> Character(s) Remaining

</div>

<div class="form-group">
<label for="process_id">
Category of process  [<small>Maximum 15 characters</small>]:
<span class="text-red"style="color: red;">*</span></label>
<?php echo $__env->make('admin.common_pages.category_process_closure', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>
</div>





<div class="hide_assigned_option" <?php if($person_responses_data[0]->ticket_status=="assigned"): ?> style="display:block;" <?php else: ?> style="display:none;" <?php endif; ?>>
<div class="form-group">
<?php echo $__env->make('masters.support_users',['is_required'=>'','assigned_user'=>$person_responses_data[0]->assigned_ticket??0], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
</div>

<div class="hide_transferred_option" style="display:none;">
<div class="form-group">
<?php echo $__env->make('masters.hod_users',['is_required'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
</div>



<button type="submit" class="btn btn-success btn-sm">Submit </button>
</form>
</div>
</div>

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/responses/responses_updatestatus_common.blade.php ENDPATH**/ ?>