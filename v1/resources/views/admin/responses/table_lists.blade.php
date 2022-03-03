
		
		<div class="table-responsive">
		<table  id="default-datatable" class="nowrap display table Config::get('constants.tablestriped')">
		<thead class="thead-dark">
		<tr>
		<th>S.No</th>
		<th>Customer</th>      
		<!-- <th>Gender</th> -->
		<th>Ticket Number</th>
		<th>Score</th>
		<th>Feedback Date</th>
		<th>Last Updated</th>
		<th>Status</th>
		<th>Actions</th>
		</tr>
		</thead>
		<tbody>

			
                  
                      @foreach ($Data as $response)  
                          <tr>
                              <td>{{$loop->iteration}}</td>

                              <td><b>{{Str::title($response->firstname??'')}}</b><br>{{$response->email??''}}<br>{{$response->mobile??''}}<br>Gender: {{Str::title($response->gender??'')}}<br>UHID: {{Str::title($response->uhid??'')}}</td>
                              <td>
							  @if(Auth::user()->role==2)         
							  <a href="{{url(Config::get('constants.admin').'/responses/view/'.Crypt::encryptString($response->id))}}" class="text-primary mr-2" title="Edit" >{{Str::title($response->ticker_final_number??'')}}</a><br><small>{{$response->survey_title??''}}<br>BED NO.: {{Str::title($response->bed_name??'')}}<br>Discharge Date: {{Str::title($response->discharge_date??'')}}</small>
                               
                                @elseif(Auth::user()->role==3)
								 <a href="{{url(Config::get('constants.hod').'/responses/view/'.Crypt::encryptString($response->id))}}" class="text-primary mr-2" title="Edit" >{{Str::title($response->ticker_final_number??'')}}</a><br><small>{{$response->survey_title??''}}<br>BED NO.: {{Str::title($response->bed_name??'')}}<br>Discharge Date: {{Str::title($response->discharge_date??'')}}</small>
                                
                                @elseif(Auth::user()->role==4)
                                <a href="{{url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))}}" class="text-primary mr-2" title="Edit" >{{Str::title($response->ticker_final_number??'')}}</a><br><small>{{$response->survey_title??''}}<br>BED NO.: {{Str::title($response->bed_name??'')}}<br>Discharge Date: {{Str::title($response->discharge_date??'')}}</small>
                               
                                @else

                                @endif
							  
							  
							  
							  </td>
                              <td>{{$response->rating??0}}</td>
                              <td>{{date('d M, Y', strtotime($response->created_at??''))}}</td>
							   <td>{{date('d M, Y', strtotime($response->last_action_date??''))}}</td>                     
							  
							  <td>
							  <p class="font-15 mb-0">
							  
									@if($response->ticket_status=="opened")
									<span class="badge badge-danger">Opened</span>
									@elseif($response->ticket_status== "phone_ringing_no_response")
									<span class="badge badge-primary">Phone Ringing - No Response</span>
									@elseif($response->ticket_status=="connected_refused_to_talk")
									<span class="badge badge-primary">Connected - Refused to talk</span>@elseif($response->ticket_status=="connected_asked_for_call_back")
									<span class="badge badge-primary">Connected - Asked for call back</span>@elseif($response->ticket_status=="closed_satisfied")
									<span class="badge badge-success">Closed - Satisfied</span>
									@elseif($response->ticket_status=="closed_unsatisfied")
									<span class="badge badge-success">Closed - Unsatisfied</span>
									@else
									@endif
							  
							  </p>
							  
							  
							  </td>
							  
                              <td>    
                              @if(Auth::user()->role==2)         
							  <a href="{{url(Config::get('constants.admin').'/responses/view/'.Crypt::encryptString($response->id))}}" class="text-primary mr-2" title="Edit" ><i class="feather icon-eye"></i></a>
                                <a href="{{url(Config::get('constants.admin').'/responses/delete/'.Crypt::encryptString($response->id))}}" class="delete text-danger" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="feather icon-trash"></i></a>
                                @elseif(Auth::user()->role==3)
								<a href="{{url(Config::get('constants.hod').'/responses/view/'.Crypt::encryptString($response->id))}}" class="text-primary mr-2" title="Edit" ><i class="feather icon-eye"></i></a>
                                <a href="{{url(Config::get('constants.hod').'/responses/delete/'.Crypt::encryptString($response->id))}}" class="delete text-danger" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="feather icon-trash"></i></a>
                                @elseif(Auth::user()->role==4)
                                <a href="{{url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))}}" class="text-primary mr-2" title="Edit" ><i class="feather icon-eye"></i></a>
                                <a href="{{url(Config::get('constants.user').'/responses/delete/'.Crypt::encryptString($response->id))}}" class="delete text-danger" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="feather icon-trash"></i></a>
                                @else

                                @endif
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                      
            </table>
			
			
			
			
			
			
			</div>


