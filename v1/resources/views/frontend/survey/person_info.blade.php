@extends('frontend.template_v1')
@section('title', 'Survey Step-1')
@section('content')
			
<div class="formify_right_fullwidth align-items-center justify-content-center">

<!-- <a href="{{route('session.logout')}}" class="pull-right" style="margin-left:20px;">
<img src="{{URL::to('assets/images/svg-icon/logout.svg')}}" class="img-fluid" alt="apps"><span>Logout</span><i class="feather "></i>
</a> -->




@include('frontend.common_pages.nav')


<div class="formify_box_checkbox background-white">
@include('frontend.common_pages.survey_description')

<div class="tab-content" id="myTabContent">

@if($Surveys->count()>0)





@csrf
 
<div class="box_info">


<div class="container">
<div>
<div>




<div class="background-white">
@if(auth()->user()->role==2)

<form action="{{ route('post.survey.personinfo.'.Config::get('constants.admin')) }}" class="" method="post">
@else
	<form action="{{ route('post.survey.personinfo.'.Config::get('constants.user')) }}" class="" method="post">
@endif
@csrf
<div class="row">
        <div class="col-md-12 pl-sm-0">
          
          <div class="form-group">
            <label><b>Full Name</b><span style="color: red;">*</span></label>
            <input type="text" class="form-control" name="firstname" value="{{old('firstname',$users_data->firstname??'')}}" required="required" />
          </div>
          <div class="form-group">
            <label><b>Email</b><span style="color: red;">*</span></label>
            <input type="email" name="email" class="form-control" required="required" value="{{old('email',$users_data->email??'')}}">
          </div>
          <div class="form-group">
                <label><b>Mobile</b><span style="color: red;">*</span></label>
                <input type="number" name="phone" id="title" class="form-control" value="{{old('phone',$users_data->phone??'')}}" required="required" data-parsley-minlength="10" data-parsley-maxlength="10" required="required">
          </div>
		  
		  
		  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input form-control" id="exampleCheck1" name="sendlink_email">
    <label class="form-check-label" for="exampleCheck1">Send feedback link to Email</label>
  </div>
		  

	 
		
		   
		  <button type="submit" class="btn btn-success mt-4">Next</button>
	
		  
		 
		  
      
</div>

</div>
<input type="hidden" name="survey_id" value="{{$Surveys[0]->id??0}}"/>
<input type="hidden" name="organization_id" value="{{$Surveys[0]->organization_id??0}}"/>
</form>


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