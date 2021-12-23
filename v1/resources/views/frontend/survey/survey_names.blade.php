@extends('frontend.template_v1')
@section('title', 'Survey Step-1')
@section('content')




	
	
       
			
			
<div class="formify_right_fullwidth align-items-center justify-content-center">

<!-- <a href="{{route('session.logout')}}" class="pull-right" style="margin-left:20px;">
<img src="{{URL::to('assets/images/svg-icon/logout.svg')}}" class="img-fluid" alt="apps"><span>Logout</span><i class="feather "></i>
</a> -->




@include('frontend.common_pages.nav')


<div class="mt-5 ml-5">

<div class="tab-content" id="myTabContent">

@if($Surveys->count()>0)




@csrf
 
<div class="box_info">


<div class="container">
<div class="row-fluid">
<div class="col-xs-12 mt-5">

<h5>Please select questionnaire to proceed feedback</h5>

	<div class="mt-5">
		<div class="background-white">           
		    <div class="button-list">
			@foreach($Surveys as $key=>$value)
			
		@if(auth()->user()->role==2)
		<a href="{{URL(Config::get('constants.admin').'/survey/start/'.Crypt::encryptString($value->id))}}">
		<button type="button" class="btn btn-rounded btn-outline-danger mb-2 mr-2">{{$value->title}}</button>
		</a>
		@else
		<a href="{{URL(Config::get('constants.admin').'/survey/start/'.Crypt::encryptString($value->id))}}">
		<button type="button" class="btn btn-rounded btn-outline-danger mb-2 mr-2">{{$value->title}}</button>
		</a>
		@endif
	
	
				
			@endforeach
		    </div>

	  </div> 
	</div>
</div>




</div>



@else
	<p>Please create survey.</p>
@endif

</div>

</div>


</div>
    
   


@endsection

@push('scripts')


@endpush