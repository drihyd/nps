<div class="form-group mb-2">
<select name="ticket_status" id="ticket_status" class="form-control form-control-sm mx-sm-1" @if($is_required=="yes") required="required" @else @endif>
<option value="">--Status--</option>
<option value="opened">Opened</option>
<option value="phone_ringing_no_response">Phone Ringing - No Response</option>
<option value="connected_refused_to_talk">Connected - Refused to talk</option>
<option value="connected_asked_for_call_back">Connected - Asked for call back</option>
<option value="closed_satisfied">Closed - Satisfied</option>
<option value="closed_unsatisfied">Closed - Unsatisfied</option>
<option value="patient_level_closure">Patient level Closure</option>
<option value="process_level_closure">Process level closure</option>
</select>
</div>