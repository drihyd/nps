@php
if(isset($ticket_status) && !empty($ticket_status)){
	$ticket_status=$ticket_status;
}
else{
	$ticket_status="";
}

@endphp
<div class="form-group mb-2">
<select id='ticketing_status' name="ticketing_status" class="form-control form-control-sm">
<option value="">--Status--</option>
<option value="opened" @if($ticket_status == "opened") selected @else @endif >Open</option>
<option value="phone_ringing_no_response" @if($ticket_status == "phone_ringing_no_response") selected @else @endif>Phone Ringing - No Response</option>
<option value="connected_refused_to_talk" @if($ticket_status == "connected_refused_to_talk") selected @else @endif>Connected - Refused to talk</option>
<option value="connected_asked_for_call_back" @if($ticket_status == "connected_asked_for_call_back") selected @else @endif>Connected - Asked for call back</option>
<option value="closed_satisfied" @if($ticket_status == "closed_satisfied") selected @else @endif>Closed - Satisfied</option>
<option value="closed_unsatisfied" @if($ticket_status == "closed_unsatisfied") selected @else @endif>Closed - Unsatisfied</option>
<option value="patient_level_closure" @if($ticket_status == "patient_level_closure") selected @else @endif>Patient level Closure</option>
<option value="process_closure_req" @if($ticket_status == "process_closure_req") selected @else @endif>Process level closure</option>
</select>
</div>
