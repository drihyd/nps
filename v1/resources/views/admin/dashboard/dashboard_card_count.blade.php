<div class="col-lg-4 col-xl-4">


@if(auth()->user())
	@if(auth()->user()->role==2)
	<a href="{{url(Config::get('constants.admin').'/responses')}}">
	@else
	<a href="{{url(Config::get('constants.user').'/responses')}}">
	@endif
@else
	<a href="#">
@endif

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
</div>

			
<div class="col-lg-4 col-xl-4">

@if(auth()->user())
	@if(auth()->user()->role==2)
	<a href="{{url(Config::get('constants.admin').'/responses')}}">
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
<p class="mb-0">Feedback</p>
<h5 class="mb-0">{{$final_score->total_feedbacks??0}}</h5>                      
</div>
</div>
</div>
</div>
</a>
</div>
			
			

<div class="col-lg-4 col-xl-4">
@if(auth()->user())
@if(auth()->user()->role==2)
<a href="{{url(Config::get('constants.admin').'/users')}}">
@else
<a href="#">
@endif
@else
<a href="#">
@endif
			
			
		
			<div class="card m-b-30">
			<div class="card-body">
			<div class="media">
			<span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i class="fa fa-user-plus"></i></span>
			<div class="media-body">
			<p class="mb-0">Customers</p>
			<h5 class="mb-0">{{$all_admin_users??0}}</h5>                      
			</div>
			</div>
			</div>
			</div>
			</a>
			</div>
	
