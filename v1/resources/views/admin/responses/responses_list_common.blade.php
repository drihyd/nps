
<form class="form-inline" action="{{route('filter.responses')}}" method="post">
@csrf

@include('admin.common_pages.dates_input')
@include('admin.common_pages.teams',['pickteam'=>$pickteam??''])
&nbsp;
@include('admin.common_pages.action_button')
&nbsp;
<div class="form-group mb-2">
@if(auth()->user())
@if(auth()->user()->role==2)
<a href="{{url(Config::get('constants.admin').'/responses')}}">Clear filter</a>
@else
<a href="{{url(Config::get('constants.user').'/responses')}}">Clear filter</a>
@endif
@else
<a href="#">
@endif

</div>

</form>







<div class="col-md-12 col-lg-12 col-xl-12">
<div class="card">
<div class="card-body">
							
							
		<ul class="nav nav-tabs custom-tab-line mb-3" id="defaultTabLine" role="tablist">
		<li class="nav-item">
		<a class="nav-link active" id="home-tab-line" data-toggle="tab" href="#home-line" role="tab" aria-controls="home-line" aria-selected="true"><i class="feather icon-user mr-2"></i>Detractors</a>
		</li>
		<li class="nav-item">
		<a class="nav-link" id="profile-tab-line" data-toggle="tab" href="#profile-line" role="tab" aria-controls="profile-line" aria-selected="false"><i class="feather icon-user mr-2"></i>Passives</a>
		</li>
		<li class="nav-item">
		<a class="nav-link" id="contact-tab-line" data-toggle="tab" href="#contact-line" role="tab" aria-controls="contact-line" aria-selected="false"><i class="feather icon-user mr-2"></i>Promoters</a>
		</li>
		</ul>
								
								
		<div class="tab-content" id="defaultTabContentLine">
		
		
		<div class="tab-pane fade active show" id="home-line" role="tabpanel" aria-labelledby="home-tab-line">
		@include('admin.responses.table_lists',['Data'=>$Detractors])									
		</div>
		<div class="tab-pane fade" id="profile-line" role="tabpanel" aria-labelledby="profile-tab-line">

		@include('admin.responses.table_lists',['Data'=>$Passives])

		</div>
		<div class="tab-pane fade" id="contact-line" role="tabpanel" aria-labelledby="contact-tab-line">

		@include('admin.responses.table_lists',['Data'=>$Promoters])

		</div>
		</div>

							
							
                        
								
                                <div class="tab-content" id="pills-tab-justifiedContent">
							
									
                                    <div class="tab-pane fade" id="pills-profile-justified" role="tabpanel" aria-labelledby="pills-profile-tab-justified">
                                       

									   <div class="table-responsive">
        
          <table id="default-datatable" class="display table Config::get('constants.tablestriped')">
                <thead class="thead-dark">
                    <tr>
                        <!-- <th>S.No</th> -->
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Score</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  
                      @foreach ($Passives as $response)  
                          <tr>
                              <td>{{Str::title($response->firstname??'')}}</td>
                              <td>{{$response->email??''}}</td>
                              <td>{{$response->mobile??''}}</td>
                             <td>{{$response->answer??0}}</td>
                              <td>{{date('F j, Y', strtotime($response->created_at??''))}}</td>
                              <td>    
                              @if(Auth::user()->role==2)         
							  <a href="{{url(Config::get('constants.admin').'/responses/view/'.Crypt::encryptString($response->id))}}" class="edit mr-2" title="Edit" ><i class="fa fa-eye"></i></a>
                                <a href="{{url(Config::get('constants.admin').'/responses/delete/'.Crypt::encryptString($response->id))}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fa fa-trash"></i></a>
                                @elseif(Auth::user()->role==3)
								                  <a href="{{url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))}}" class="edit mr-2" title="Edit" ><i class="fa fa-eye"></i></a>
                                <a href="{{url(Config::get('constants.user').'/responses/delete/'.Crypt::encryptString($response->id))}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fa fa-trash"></i></a>
                                @elseif(Auth::user()->role==4)
                                <a href="{{url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))}}" class="edit mr-2" title="Edit" ><i class="fa fa-eye"></i></a>
                                <a href="{{url(Config::get('constants.user').'/responses/delete/'.Crypt::encryptString($response->id))}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fa fa-trash"></i></a>
                                @else

                                @endif
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                      
            </table>
			
			</div>
                                   

								   </div>
									
                                    <div class="tab-pane fade" id="pills-contact-justified" role="tabpanel" aria-labelledby="pills-contact-tab-justified">
                                        
										
										
										
										<div class="table-responsive">
        
          <table id="default-datatable" class="display table Config::get('constants.tablestriped')">
                <thead class="thead-dark">
                    <tr>
                        <!-- <th>S.No</th> -->
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Score</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  
                      @foreach ($Promoters as $response)  
                          <tr>
                              <td>{{Str::title($response->firstname??'')}}</td>
                              <td>{{$response->email??''}}</td>
                              <td>{{$response->mobile??''}}</td>
                             <td>{{$response->answer??0}}</td>
                              <td>{{date('F j, Y', strtotime($response->created_at??''))}}</td>
                              <td>    
                              @if(Auth::user()->role==2)         
							  <a href="{{url(Config::get('constants.admin').'/responses/view/'.Crypt::encryptString($response->id))}}" class="edit mr-2" title="Edit" ><i class="fa fa-eye"></i></a>
                                <a href="{{url(Config::get('constants.admin').'/responses/delete/'.Crypt::encryptString($response->id))}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fa fa-trash"></i></a>
                                @elseif(Auth::user()->role==3)
								                  <a href="{{url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))}}" class="edit mr-2" title="Edit" ><i class="fa fa-eye"></i></a>
                                <a href="{{url(Config::get('constants.user').'/responses/delete/'.Crypt::encryptString($response->id))}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fa fa-trash"></i></a>
                                @elseif(Auth::user()->role==4)
                                <a href="{{url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))}}" class="edit mr-2" title="Edit" ><i class="fa fa-eye"></i></a>
                                <a href="{{url(Config::get('constants.user').'/responses/delete/'.Crypt::encryptString($response->id))}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fa fa-trash"></i></a>
                                @else

                                @endif
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                      
            </table>
			
			</div>
                                    
									
									
									
									</div>
									
									
                                </div>
                            </div>
                        </div>
                    </div> 






















		



