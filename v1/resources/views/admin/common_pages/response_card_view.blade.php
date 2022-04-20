<div class="row">


@if(isset($Data) && $Data->count()>0)

<div class="col-md-12">

	
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
			
			<h1>
			{{$response->rating??0}}
			
			
			</h1>
@if(Auth::user()->role==2) 


<a href="{{url(Config::get('constants.admin').'/responses/view/'.Crypt::encryptString($response->id))}}" class="btn btn-primary btn-sm" title="Edit" >{{Str::title($response->ticker_final_number??'')}}

@elseif(Auth::user()->role==3)

<a href="{{url(Config::get('constants.hod').'/responses/view/'.Crypt::encryptString($response->id))}}" class="btn btn-primary btn-sm" title="Edit" >{{Str::title($response->ticker_final_number??'')}}

@elseif(Auth::user()->role==4)

<a href="{{url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))}}" class="btn btn-primary btn-sm" title="Edit" >{{Str::title($response->ticker_final_number??'')}}
@elseif(Auth::user()->role==1)
<a href="{{url(Config::get('constants.admin').'/responses/view/'.Crypt::encryptString($response->id))}}" class="btn btn-primary btn-sm" title="Edit" >{{Str::title($response->ticker_final_number??'')}}
@elseif(Auth::user()->role==7)
<a href="{{url(Config::get('constants.support').'/responses/view/'.Crypt::encryptString($response->id))}}" class="btn btn-primary btn-sm" title="Edit" >{{Str::title($response->ticker_final_number??'')}}
@else
	
<a href="{{url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))}}" class="btn btn-primary btn-sm" title="Edit" >#
@endif
		
			
			
			
			</a>
		
			</div>
					
					
					
				</div>
				<div class="col-sm col-12 bg-omni-blue-light">
					<div class="cus-info">	



@if(Auth::user()->role==2) 


<a href="{{url(Config::get('constants.admin').'/responses/view/'.Crypt::encryptString($response->id))}}" title="Edit" >

@elseif(Auth::user()->role==3)

<a href="{{url(Config::get('constants.hod').'/responses/view/'.Crypt::encryptString($response->id))}}" title="Edit" >

@elseif(Auth::user()->role==4)

<a href="{{url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))}}" title="Edit" >
@elseif(Auth::user()->role==1)

<a href="{{url(Config::get('constants.admin').'/responses/view/'.Crypt::encryptString($response->id))}}" title="Edit" >
@elseif(Auth::user()->role==7)
<a href="{{url(Config::get('constants.support').'/responses/view/'.Crypt::encryptString($response->id))}}" title="Edit" >

@else
	
<a href="{{url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))}}" title="Edit" >#
@endif
					
						<span>
						
						<b>{{Str::title($response->firstname??'')}}</b>
						
						
						
						</span>
						
						</a>
						
						<br>
						<span>UHID No: {{Str::title($response->uhid??'')}}</span><br>
						<span>Bed No: {{Str::title($response->bed_name??'')}}</span><br>
						<span><a href="mailto:{{$response->email??''}}" title="{{$response->email??''}}"><i class="fa fa-envelope "></i></a></span>
						<span><a href="telto:{{$response->mobile??''}}" title="{{$response->mobile??''}}"><i class="fa fa-phone-square"></i></a> </span>
					</div>
				</div>
				<div class="col-sm col-12 bg-omni-green-light">
					<div class="cus-status">
	@if(Auth::user()->role==2)         
	<a href="{{url(Config::get('constants.admin').'/responses/view/'.Crypt::encryptString($response->id))}}" class="text-primary mr-2" title="Edit" >@include('admin.common_pages.status_of_ticket',['ticket_status'=>$response->ticket_status??'','assigned_user'=>$response->assigned_user??''])</a>
	@elseif(Auth::user()->role==3)
	<a href="{{url(Config::get('constants.hod').'/responses/view/'.Crypt::encryptString($response->id))}}" class="text-primary mr-2" title="Edit" >@include('admin.common_pages.status_of_ticket',['ticket_status'=>$response->ticket_status??'','assigned_user'=>$response->assigned_user??''])</a>
	@elseif(Auth::user()->role==4)
	<a href="{{url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))}}" class="text-primary mr-2" title="Edit" >@include('admin.common_pages.status_of_ticket',['ticket_status'=>$response->ticket_status??'','assigned_user'=>$response->assigned_user??''])</a>
	@elseif(Auth::user()->role==1)
	<a href="{{url(Config::get('constants.admin').'/responses/view/'.Crypt::encryptString($response->id))}}" class="text-primary mr-2" title="Edit" >@include('admin.common_pages.status_of_ticket',['ticket_status'=>$response->ticket_status??'','assigned_user'=>$response->assigned_user??''])</a>
	@elseif(Auth::user()->role==7)
	<a href="{{url(Config::get('constants.support').'/responses/view/'.Crypt::encryptString($response->id))}}" class="text-primary mr-2" title="Edit" >@include('admin.common_pages.status_of_ticket',['ticket_status'=>$response->ticket_status??'','assigned_user'=>$response->assigned_user??''])</a>
	@else
	@endif
<p class='mb-0 mt-0'><small>Updated on: {{date('d M, Y', strtotime($response->last_action_date??''))}}</small></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
	
	
	
	@else
		<div class="col-md-10">
		<h5>No Data found.</h5>
		</div>
	@endif

</div>
</div>


