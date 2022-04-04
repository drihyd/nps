<div class="row">
<div class="col-md-10">
	
	<div class="card">
		<div class="card-body p-0">
			<div class="row no-gutters align-items-top">
				<div class="col-auto bg-omni-black text-center">						
					<span class="cus-head" style="width:100px">Score</span>
				</div>
				<div class="col bg-omni-blue">
					<span class="cus-head">Customer Info</span>
				</div>
				<div class="col bg-omni-green">
					<span class="cus-head">Status</span>
				</div>
			</div>
		</div>
	</div>
 @foreach ($Data as $response)  
	<div class="card info-card bg-white border">
		<div class="card-body p-0">
			<div class="row no-gutters align-items-top">
				<div class="col-sm-auto col-12">
					<div class="cus-score">
						<h1>5</h1>
						@if(Auth::user()->role==2)         
							  <a href="{{url(Config::get('constants.admin').'/responses/view/'.Crypt::encryptString($response->id))}}" class="btn btn-primary btn-sm" title="Edit" >{{Str::title($response->ticker_final_number??'')}}</a>
					  @elseif(Auth::user()->role==3)
						 <a href="{{url(Config::get('constants.hod').'/responses/view/'.Crypt::encryptString($response->id))}}" class="btn btn-primary btn-sm" title="Edit" >{{Str::title($response->ticker_final_number??'')}}</a>
						 @elseif(Auth::user()->role==4)
              <a href="{{url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))}}" class="btn btn-primary btn-sm" title="Edit" >{{Str::title($response->ticker_final_number??'')}}</a>
              @else
              @endif
					</div>
				</div>
				<div class="col-sm col-12 bg-omni-blue-light">
					<div class="cus-info">						
						<span><b>{{Str::title($response->firstname??'')}}</b></span><br>
						<span>UHID No: {{Str::title($response->uhid??'')}}</span><br>
						<span>Bed No: {{Str::title($response->bed_name??'')}}</span><br>
						<span><a href="mailto:{{$response->email??''}}" title="{{$response->email??''}}"><i class="fa fa-envelope"></i></a></span>
						<span><a href="telto:{{$response->mobile??''}}" title="{{$response->mobile??''}}"><i class="fa fa-phone-square"></i></a> </span>
					</div>
				</div>
				<div class="col-sm col-12 bg-omni-green-light">
					<div class="cus-status">
						@if(Auth::user()->role==2)         
							  <a href="{{url(Config::get('constants.admin').'/responses/view/'.Crypt::encryptString($response->id))}}" class="text-primary mr-2" title="Edit" >@include('admin.common_pages.status_of_ticket',['ticket_status'=>$response->ticket_status])</a>
							   @elseif(Auth::user()->role==3)
								<a href="{{url(Config::get('constants.hod').'/responses/view/'.Crypt::encryptString($response->id))}}" class="text-primary mr-2" title="Edit" >@include('admin.common_pages.status_of_ticket',['ticket_status'=>$response->ticket_status])</a>
								@elseif(Auth::user()->role==4)
                                <a href="{{url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))}}" class="text-primary mr-2" title="Edit" >@include('admin.common_pages.status_of_ticket',['ticket_status'=>$response->ticket_status])</a>
                  @else

                  @endif<br>
						<span>Updated on: {{date('d M, Y', strtotime($response->last_action_date??''))}}</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach

</div>
</div>


