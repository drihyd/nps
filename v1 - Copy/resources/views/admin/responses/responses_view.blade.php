@extends('admin.template_v1')
@section('title', Str::title($person_data->firstname??''))
@section('content')
<div class="row">
    <!-- End col -->
    <div class="col-lg-7">
        @include('admin.responses.responses_view_common')
    </div>
    <div class="col-lg-5">
	

	
        @include('admin.responses.responses_updatestatus_common')
        @include('admin.responses.responses_status_activities_common')
		
	
		

    </div>  
    <!-- End col -->
    <!-- Start col -->
    
    <!-- End col -->
    <!-- Start col -->
    <!-- <div class="col-lg-12 col-xl-6">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Combodate (datetime)</h5>
            </div>
            <div class="card-body">                                
                <a href="#" id="xeditable-event" class="editable editable-click editable-empty"></a>
            </div>
        </div>
    </div>  --> 
    <!-- End col -->
</div>
<div class=" pb-5">
@if(Auth::user()->role==2) 
<a href="{{url(Config::get('constants.admin').'/responses')}}" class="btn btn-danger btn-sm">Back</a>
    @elseif(Auth::user()->role==3)
<a href="{{url(Config::get('constants.user').'/responses')}}" class="btn btn-danger btn-sm">Back</a>
@elseif(Auth::user()->role==4)
<a href="{{url(Config::get('constants.user').'/responses')}}" class="btn btn-danger btn-sm">Back</a>
@else
@endif
</div>
@endsection