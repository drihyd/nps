@extends('frontend.template_v1')
@section('title', 'Survey Step-1')
@section('content')



	
       
			
	@if(auth()->user())		
<div class="justify-content-center" style="width:100%">
@else
	<div class="justify-content-center" style="width:100%">
@endif

@if(auth()->user())
@include('frontend.common_pages.nav')
@else
@endif


<div class="formify_box formify_box_checkbox background-white">


 
<div class="box_info ml-3 mt-3">

<div class="row">
<div class="col-md-12 text-center">
	<h4 class="text text-success">Thank you for completing our survey!</h4>
	
@if(auth()->user())
@if(auth()->user()->role==2)		
<a href="{{url(Config::get('constants.admin').'/dashboard')}}" class="btn btn-outline-danger  mt-3">Back to home</a>	
@elseif(auth()->user()->role==3)		
<a href="{{url(Config::get('constants.hod').'/dashboard')}}" class="btn btn-outline-danger  mt-3">Back to home</a>
@elseif(auth()->user()->role==5)		
<a href="{{url(Config::get('constants.operantionalhead').'/dashboard')}}" class="btn btn-outline-danger  mt-3">Back to home</a>
@else		
<a href="{{url(Config::get('constants.user').'/dashboard')}}" class="btn btn-outline-danger  mt-3">Back to home</a>	
@endif

@else

@endif
	
	
	</div>
</div>


</div>
</div>
    
   


@endsection

@push('scripts')






@endpush