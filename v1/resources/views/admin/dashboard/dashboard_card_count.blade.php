<div class="col-lg-4 col-xl-4">


@if(auth()->user())
	@if(auth()->user()->role==2 || auth()->user()->role==1)
		<a href="{{url(Config::get('constants.admin').'/departments')}}">
		<div class="card m-b-30">
		<div class="card-body">
		<div class="media">
		<span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i class="feather icon-folder"></i></span>
		<div class="media-body">
		<p class="mb-0">Total number of teams</p>
		<h5 class="mb-0">{{$all_admin_departments??''}}</h5>                      
		</div>
		</div>
		</div>
		</div>
		</a>
		@elseif(auth()->user()->role==3)		
		<a href="#">
		<div class="card m-b-30">
		<div class="card-body">
		<div class="media">
		<span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i class="fa fa-bar-chart"></i></span>
		<div class="media-body">
		<p class="mb-0">NPS Score</p>
		<h5 class="mb-0">{{$final_score->NPS??0}}</h5>                      
		</div>
		</div>
		</div>
		</div>
		</a>
	@else		
		<a href="#">
		<div class="card m-b-30">
		<div class="card-body">
		<div class="media">
		<span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i class="fa fa-bar-chart"></i></span>
		<div class="media-body">
		<p class="mb-0">NPS Score</p>
		<h5 class="mb-0">{{$final_score->NPS??0}}</h5>                      
		</div>
		</div>
		</div>
		</div>
		</a>
	@endif
@else	
@endif
</div>

			
<div class="col-lg-4 col-xl-4">

@if(auth()->user())
	@if(auth()->user()->role==2 || auth()->user()->role==1)
	<a href="{{url(Config::get('constants.admin').'/responses')}}">
	@elseif(auth()->user()->role==3)
	<a href="{{url(Config::get('constants.hod').'/responses')}}">
	@elseif(auth()->user()->role==7)
	<a href="{{url(Config::get('constants.support').'/responses')}}">
	@else
	<a href="{{url(Config::get('constants.user').'/responses')}}">
	@endif
@else
	<a href="#">
@endif


<div class="card m-b-30">
<div class="card-body">
<div class="media">
<span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i class="fa fa-sticky-note-o"></i></span>
<div class="media-body">
<p class="mb-0">Total number of feedback</p>
<h5 class="mb-0">{{$final_score->total_feedbacks??0}}</h5>                      
</div>
</div>
</div>
</div>
</a>
</div>
			
			

<div class="col-lg-4 col-xl-4">
@if(auth()->user())
@if(auth()->user()->role==2 || auth()->user()->role==1)
<a href="{{url(Config::get('constants.admin').'/responses')}}">
@elseif(auth()->user()->role==3)
<a href="{{url(Config::get('constants.hod').'/responses')}}">
@elseif(auth()->user()->role==7)
<a href="{{url(Config::get('constants.support').'/responses')}}">
@else
<a href="{{url(Config::get('constants.user').'/responses')}}">
@endif
@else
<a href="#">
@endif
			
			
		
			<div class="card m-b-30">
			<div class="card-body">
			<div class="media">
			<span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i class="fa fa-sticky-note-o"></i></span>
			<div class="media-body">
			<p class="mb-0">Customer feedback in last 7 days</p>
			<h5 class="mb-0">{{$final_score->lastoneweek??0}}</h5>                      
			</div>
			</div>
			</div>
			</div>
			</a>
			</div>
	
