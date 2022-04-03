@extends('admin.template_v1')
@section('title', Str::title($person_data->firstname??''))
@section('content')
<div class="row">
    <!-- End col -->
    <div class="col-lg-7">
        @include('admin.responses.responses_view_common')
    </div>
    <div class="col-lg-5">
	

	@if(Auth::user()->role==2) 
	@include('admin.responses.responses_updatestatus_common')
	@include('admin.responses.responses_status_activities_common')
	@elseif(Auth::user()->role==3)
	@include('admin.responses.responses_updatestatus_common')
	@include('admin.responses.responses_status_activities_common')
	@elseif(Auth::user()->role==4)

	@else
	@endif

		
	
		

    </div>  

</div>
<div class=" pb-5">
@if(Auth::user()->role==2) 
<a href="{{url(Config::get('constants.admin').'/responses')}}" class="btn btn-danger btn-sm">Back</a>
    @elseif(Auth::user()->role==3)
<a href="{{url(Config::get('constants.hod').'/responses')}}" class="btn btn-danger btn-sm">Back</a>
@elseif(Auth::user()->role==4)
<a href="{{url(Config::get('constants.user').'/responses')}}" class="btn btn-danger btn-sm">Back</a>
@else
@endif
</div>
@endsection
