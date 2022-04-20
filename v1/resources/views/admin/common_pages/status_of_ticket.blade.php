@if($ticket_status=="opened")
<span class="badge badge-danger">Opened</span>
@elseif($ticket_status== "phone_ringing_no_response")
<span class="badge badge-primary">Phone Ringing - No Response</span>
@elseif($ticket_status=="connected_refused_to_talk")
<span class="badge badge-primary">Connected - Refused to talk</span>
@elseif($ticket_status=="connected_asked_for_call_back")
<span class="badge badge-primary">Connected - Asked for call back</span>
@elseif($ticket_status=="closed_satisfied")
<span class="badge badge-success">Closed - Satisfied</span>
@elseif($ticket_status=="closed_unsatisfied")
<span class="badge badge-success">Closed - Unsatisfied</span>
@elseif($ticket_status=="patient_level_closure")
<span class="badge badge-success">Patient level Closure</span>
@elseif($ticket_status=="process_level_closure")
<span class="badge badge-success">Process level closure</span>
@elseif($ticket_status=="assigned")
<span class="badge badge-success">Assigned - {{$assigned_user??''}}</span>
@elseif($ticket_status=="transferred")
<span class="badge badge-success">Transferred</span>
@else
@endif