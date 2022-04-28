
		
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
							  <a href="{{url(Config::get('constants.admin').'/responses/view/'.Crypt::encryptString($response->id))}}" class="text-primary mr-2" title="Edit" >{{Str::title($response->ticker_final_number??'')}}</a><br>{{$response->survey_title??''}}<br>BED NO.: {{Str::title($response->bed_name??'')}}<br>Discharge Date: {{Str::title($response->discharge_date??'')}}
                               
                                @elseif(Auth::user()->role==3)
								 <a href="{{url(Config::get('constants.hod').'/responses/view/'.Crypt::encryptString($response->id))}}" class="text-primary mr-2" title="Edit" >{{Str::title($response->ticker_final_number??'')}}</a><br>{{$response->survey_title??''}}<br>BED NO.: {{Str::title($response->bed_name??'')}}<br>Discharge Date: {{Str::title($response->discharge_date??'')}}
                                
                                @elseif(Auth::user()->role==4)
                                <a href="{{url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))}}" class="text-primary mr-2" title="Edit" >{{Str::title($response->ticker_final_number??'')}}</a><br>{{$response->survey_title??''}}<br>BED NO.: {{Str::title($response->bed_name??'')}}<br>Discharge Date: {{Str::title($response->discharge_date??'')}}
                               
                                @else

                                @endif
							  
							  
							  
							  </td>
                              <td>{{$response->rating??0}}</td>
                              <td>
							  
							  {{date('d M, Y', strtotime($response->created_at??''))}}
							  
							  
							  @if($response->last_action_date)
								  <br>
							<p>Last Actity Date: {{date('d M, Y', strtotime($response->last_action_date??''))}}</p>
							
							@endif
							
							
							</td>                     
							  
							  <td>
							  <p class="font-15 mb-0">
							  
									 @include('admin.common_pages.status_of_ticket',['ticket_status'=>$response->ticket_status])
							  
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


