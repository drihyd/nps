@if(isset($person_responses_data[0]->ticket_status))
        <div class="card m-b-30">
            <div class="card-header">
                <h4>Update Ticket {{$person_responses_data[0]->ticker_final_number}} Status <!--to {{Str::title($person_data->firstname??'')}}--> </h4>
               
            </div>
            <div class="card-body">
                <form id="crudTable" action="{{url('responses/update_status')}} " method="POST"  enctype="multipart/form-data">
                    @csrf
                <input type="hidden" name="id" value="{{$person_data->id}}">
                <input type="hidden" name="logged_user_id" value="{{$person_data->logged_user_id}}">
                <input type="hidden" name="organization_id" value="{{$person_data->organization_id}}">
                <input type="hidden" name="survey_id" value="{{$person_data->survey_id}}">
                <div class="form-group">
        <label for="survey_id">Status<span class="text-red"style="color: red;">*</span></label>
        <select name="ticket_status" class="form-control" required="required">
      <option value="opened" {{ old('ticket_status',$person_responses_data[0]->ticket_status??'') == 'opened'? 'selected':''}}>Opened</option>

      <option value="phone_ringing_no_response" {{ old('ticket_status',$person_responses_data[0]->ticket_status??'') == 'phone_ringing_no_response'? 'selected':''}}>Phone Ringing - No Response</option>
      <option value="connected_refused_to_talk" {{ old('ticket_status',$person_responses_data[0]->ticket_status??'') == 'connected_refused_to_talk'? 'selected':''}}>Connected - Refused to talk</option>
      <option value="connected_asked_for_call_back" {{ old('ticket_status',$person_responses_data[0]->ticket_status??'') == 'connected_asked_for_call_back'? 'selected':''}}>Connected - Asked for call back</option>
      <option value="closed_satisfied" {{ old('ticket_status',$person_responses_data[0]->ticket_status??'') == 'closed_satisfied'? 'selected':''}}> Closed - Satisfied</option>
      <option value="closed_unsatisfied" {{ old('ticket_status',$person_responses_data[0]->ticket_status??'') == 'closed_unsatisfied'? 'selected':''}}>Closed - Unsatisfied</option>

</select>
      </div>
      <div class="form-group" id="survey_id">
        <label for="survey_id">Remarks <small>[250 characters allowed]</small><span class="text-red"style="color: red;">*</span></label>
        <textarea name="ticket_remarks" id="" class="form-control tikcet_remark_status_update" required="required" rows="4" min=1 max=250>{{old('ticket_remarks',$person_responses_data[0]->ticket_remarks??'')}}</textarea>
    </div>

       <button type="submit" class="btn btn-success btn-sm">Update</button>
  </form>
            </div>
        </div>
		
		@endif
