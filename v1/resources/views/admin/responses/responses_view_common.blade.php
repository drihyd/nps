        <div class="card m-b-30" style="min-height: 372px;">
            <div class="card-body">
			
			
			    <div class="row">				
				 <div class="col-12 mb-3">
                        <h4>Ticket Number {{$person_data->ticker_final_number??''}}</h4>
                    </div>
					</div>
					
					
                <div class="row">		
				
                    <div class="col-3">
                        <p class="nps-score-div"><span class="nps-score">{{$person_responses_data[0]->option_value??''}}</span><br> NPS Score</p>
                    </div>
                    <div class="col-9 nps-score-details">
                        <p><strong>{{Str::title($person_data->firstname??'')}}</strong></p>
                        <p>{{$person_data->email??''}}</p>
                        <p>{{$person_data->mobile??''}}</p>
                        <p class="mt-3">Feedback Date: {{date('F j, Y', strtotime($person_data->created_at??''));}}</p>
                    </div>
                </div>
                
                <div class="mt-4">
                    <h4>Areas of Improvement</h4>
                    <table class="responses-table">
                        <tbody>
                            @foreach($person_responses_data as $person_response)
                            @if($person_response->answeredby_person != '')
                            <tr>
                                <td><b>{{$person_response->option_value??''}}</b></td>
                                <td>{{Str::title($person_response->department_activities??'')}}</td>
                                <td>{{Str::title($person_response->answeredby_person??'')}}</td>
                            </tr>
                            @endif
                             @endforeach
                            <!-- <tr>
                                <td><b>House Keeping</b></td>
                                <td>Room Cleanliness</td>
                                <td></td>
                            </tr> -->
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

