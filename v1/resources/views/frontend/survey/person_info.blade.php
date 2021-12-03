@extends('frontend.template_v1')
@section('title', 'Survey Step-1')
@section('content')
			
<div class="formify_right_fullwidth align-items-center justify-content-center">

<!-- <a href="{{route('session.logout')}}" class="pull-right" style="margin-left:20px;">
<img src="{{URL::to('assets/images/svg-icon/logout.svg')}}" class="img-fluid" alt="apps"><span>Logout</span><i class="feather "></i>
</a> -->


<div class="survey-profilebar">
	<div class="mt-4 ml-5 home-icon">
		<a href="#"><i class="fa fa-home"></i></a>
	</div>
	<div class="dropdown float-right mt-4 mr-5">
	  <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    <img src="{{URL::to('assets/uploads/61a852217e298_1638421025.png')}}" class="img-fluid">
	  </button>
	  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
	  	<div class="dropdown-item">
            <div class="profilename">
              <h5>{{Str::Title(auth()->user()->firstname??'')}} </h5>
            </div>
        </div>
	    <ul class="list-unstyled mb-0">
	        <li class="media dropdown-item">
	            <a href="{{URL('user/survey')}}" class="profile-icon">Home</a>
	        </li>                                                    
	        <li class="media dropdown-item">
	            <a href="{{route('session.logout')}}" class="profile-icon"><img src="{{URL::to('assets/images/svg-icon/logout.svg')}}" class="img-fluid" alt="logout">Logout</a>
	        </li>
	    </ul>
	  </div>
	</div>
</div>

<div class="formify_box formify_box_checkbox background-white">
@include('frontend.common_pages.survey_description')

<div class="tab-content" id="myTabContent">

@if($Surveys->count()>0)





@csrf
 
<div class="box_info">


<div class="container">
<div>
<div>




<div class="background-white">


<form action="{{ route('post.survey.personinfo') }}" class="signup_form" method="post">
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
		  
		  
		  <button type="submit" class="btn btn-danger mt-4">Save</button>
		  
		 
		  
      
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