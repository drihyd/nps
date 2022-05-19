<div class="col-md-12 col-lg-12 col-xl-12 p-0">
<form class="table-filter mb-4 form-inline" action="{{route('filter.responses')}}" method="post">
@csrf




<div class="form-group mb-2">
<select class="form-control form-control-sm" name="select_period" id="select_period" onchange = "select_period_dates(this.value)">
<option value="thismonth" {{ $request->select_period == "thismonth" ? 'selected':''}}>This Month</option>
<option value="lastthreemonth" {{ $request->select_period == "lastthreemonth" ? 'selected':''}}>Latest three Months</option>
<option value="selectaperiod" {{ $request->select_period== "selectaperiod" ? 'selected':''}}>Select a period</option>
</select>
</div>



<div class="hide_selectaperiod" style="display:none;">
<div class="col-lg-6">
<div class="form-group mb-2" >
Period from
@if(isset($from_date) && !empty($from_date))
<input type="date" class="form-control form-control-sm" id="from_date"  name="from_date" value="" >
@else 
<input type="date" class="form-control form-control-sm" id="from_date"  name="from_date" value="">	
@endif
</div>
</div>
<div class="col-lg-6">
<div class="form-group mb-2">
Period to
@if(isset($to_date) && !empty($to_date))
<input type="date" class="form-control form-control-sm" id="to_date"  name="to_date" value="">
@else 
	<input type="date" class="form-control form-control-sm" id="to_date"  name="to_date" value="">
@endif
</div>
</div>
</div>

&nbsp;&nbsp;



@include('admin.common_pages.teams',['pickteam'=>$pickteam??''])
&nbsp;
@if(auth()->user()->role!=7)
&nbsp;
@include('admin.common_pages.surveys',['quetion'=>$quetion??''])
@endif
&nbsp;
@include('admin.common_pages.action_button')
&nbsp;

<!--
<div class="text-sm-right mt-2" style="width: 100%;">
<div class="mb-2">
@if(auth()->user())
@if(auth()->user()->role==2)
<a href="{{url(Config::get('constants.admin').'/responses')}}" class="btn btn-warning btn-sm mb-2">Reset</a>
@elseif(auth()->user()->role==3)
<a href="{{url(Config::get('constants.hod').'/responses')}}" class="btn btn-warning btn-sm mb-2">Reset</a>
@else
<a href="{{url(Config::get('constants.user').'/responses')}}" class="btn btn-warning btn-sm mb-2">Reset</a>
@endif
@else
<a href="#">
@endif

</div>
</div>
-->

</form>


<div class="card">
<div class="card-body p-0">
							
			<!--<p class="text text-danger">Default current month data fetched on this page.</p>-->
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
		@include('admin.responses.table_lists',['Data'=>$Detractors,'is_action_enabled'=>'yes'])									
		</div>
		<div class="tab-pane fade" id="profile-line" role="tabpanel" aria-labelledby="profile-tab-line">

		@include('admin.responses.table_lists',['Data'=>$Passives,'is_action_enabled'=>'no'])

		</div>
		<div class="tab-pane fade" id="contact-line" role="tabpanel" aria-labelledby="contact-tab-line">

		@include('admin.responses.table_lists',['Data'=>$Promoters,'is_action_enabled'=>'no'])

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
                        <th>Gender</th>
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
                              <td>{{$response->gender??''}}</td>
                             <td>{{$response->answer??0}}</td>
                              <td>{{date('F j, Y', strtotime($response->created_at??''))}}</td>
                              <td>    
                              @if(Auth::user()->role==2)         
							  <a href="{{url(Config::get('constants.admin').'/responses/view/'.Crypt::encryptString($response->id))}}" class="edit mr-2" title="Edit" ><i class="fa fa-eye"></i></a>
                                <a href="{{url(Config::get('constants.admin').'/responses/delete/'.Crypt::encryptString($response->id))}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fa fa-trash"></i></a>
                                @elseif(Auth::user()->role==3)
								                  <a href="{{url(Config::get('constants.hod').'/responses/view/'.Crypt::encryptString($response->id))}}" class="edit mr-2" title="Edit" ><i class="fa fa-eye"></i></a>
                                <a href="{{url(Config::get('constants.hod').'/responses/delete/'.Crypt::encryptString($response->id))}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fa fa-trash"></i></a>
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
                        <th>Gender</th>
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
                              <td>{{$response->gender??''}}</td>
                             <td>{{$response->answer??0}}</td>
                              <td>{{date('F j, Y', strtotime($response->created_at??''))}}</td>
                              <td>    
                              @if(Auth::user()->role==2)         
							  <a href="{{url(Config::get('constants.admin').'/responses/view/'.Crypt::encryptString($response->id))}}" class="edit mr-2" title="Edit" ><i class="fa fa-eye"></i></a>
                                <a href="{{url(Config::get('constants.admin').'/responses/delete/'.Crypt::encryptString($response->id))}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fa fa-trash"></i></a>
                                @elseif(Auth::user()->role==3)
								                  <a href="{{url(Config::get('constants.hod').'/responses/view/'.Crypt::encryptString($response->id))}}" class="edit mr-2" title="Edit" ><i class="fa fa-eye"></i></a>
                                <a href="{{url(Config::get('constants.hod').'/responses/delete/'.Crypt::encryptString($response->id))}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fa fa-trash"></i></a>
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






















		



