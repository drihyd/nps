<div class="table-responsive">
									   
									   
									   
        
          <table id="default-datatable" class="display table Config::get('constants.tablestriped')">
		  
		  
                <thead class="thead-dark">
                    <tr>
                         <th>S.No</th>
                        <th>Customer</th>      
                        <th>Gender</th>
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
                              <td>{{Str::title($response->firstname??'')}}<br>{{$response->email??''}}<br>{{$response->mobile??''}}</td>
                              <td>{{Str::title($response->gender??'')}}</td>
                              <td>{{$response->answer??0}}</td>
                              <td>{{date('F j, Y', strtotime($response->created_at??''))}}</td>
							  
							  <td>
							  <p class="font-15 mb-0">
							  
									@if($response->ticket_status=="opened")
									<span class="badge badge-danger">{{$response->ticket_status??''}}</span>
									@elseif($response->ticket_status=="closed_satisfied" || $response->ticket_status=="closed_unsatisfied" )
									<span class="badge badge-success">{{$response->ticket_status??''}}</span>
									@else
									<span class="badge badge-primary">{{$response->ticket_status??''}}</span>
									@endif
							  
							  </p>
							  
							  
							  </td>
							  
                              <td>    
                              @if(Auth::user()->role==2)         
							  <a href="{{url(Config::get('constants.admin').'/responses/view/'.Crypt::encryptString($response->id))}}" class="text-primary mr-2" title="Edit" ><i class="feather icon-edit-2"></i></a>
                                <a href="{{url(Config::get('constants.admin').'/responses/delete/'.Crypt::encryptString($response->id))}}" class="delete text-danger" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="feather icon-trash"></i></a>
                                @elseif(Auth::user()->role==3)
								                  <a href="{{url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))}}" class="text-primary mr-2" title="Edit" ><i class="feather icon-edit-2"></i></a>
                                <a href="{{url(Config::get('constants.user').'/responses/delete/'.Crypt::encryptString($response->id))}}" class="delete text-danger" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="feather icon-trash"></i></a>
                                @elseif(Auth::user()->role==4)
                                <a href="{{url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))}}" class="text-primary mr-2" title="Edit" ><i class="feather icon-edit-2"></i></a>
                                <a href="{{url(Config::get('constants.user').'/responses/delete/'.Crypt::encryptString($response->id))}}" class="delete text-danger" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="feather icon-trash"></i></a>
                                @else

                                @endif
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                      
            </table>
			
			
			
			
			
			
			</div>


