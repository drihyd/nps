<div class="table-responsive">
									   
									   
									   
        
          <table  id="default-datatable" class="display table Config::get('constants.tablestriped')">
		  
		  
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
                        <!-- <th>Actions</th> -->
                    </tr>
                </thead>
                <tbody>
				
			
                  
                      @foreach ($Data as $response)  
                          <tr>
                              <td>{{$loop->iteration}}</td>

                              <td><b>{{Str::title($response->firstname??'')}}</b><br>{{$response->email??''}}<br>{{$response->mobile??''}}<br><b>Gender:</b> {{Str::title($response->gender??'')}}</td>
                              <td>
							  @if(Auth::user()->role==2)         
							  <a href="{{url(Config::get('constants.admin').'/responses/view/'.Crypt::encryptString($response->id))}}" class="text-primary mr-2" title="Edit" >{{Str::title($response->ticker_final_number??'')}}</a><br><small>{{$response->survey_title??''}}</small>
                               
                                @elseif(Auth::user()->role==3)
								 <a href="{{url(Config::get('constants.hod').'/responses/view/'.Crypt::encryptString($response->id))}}" class="text-primary mr-2" title="Edit" >{{Str::title($response->ticker_final_number??'')}}</a><br><small>{{$response->survey_title??''}}</small>
                                
                                @elseif(Auth::user()->role==4)
                                <a href="{{url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))}}" class="text-primary mr-2" title="Edit" >{{Str::title($response->ticker_final_number??'')}}</a><br><small>{{$response->survey_title??''}}</small>
                               
                                @else

                                @endif
							  
							  
							  
							  </td>
                              <td>{{$response->rating??0}}</td>
                               <td>{{date('d M, Y', strtotime($response->created_at??''))}}</td>
							   <td>{{date('d M, Y', strtotime($response->last_action_date??''))}}</td>   
							  
							  <td>
							  <p class="font-15 mb-0">
							  
								 @include('admin.common_pages.status_of_ticket',['ticket_status'=>$response->ticket_status])
							  
							  </p>
							  
							  
							  </td>
                          </tr>
                          @endforeach
                      </tbody>
                      
            </table>
			
			
			
			
			
			
			</div>


