@extends('frontend.template_v1')
@section('title', 'Survey Step-1')
@section('content')




	
	
       
			
			
<div class="formify_right_fullwidth align-items-center justify-content-center">

<!-- <a href="{{route('session.logout')}}" class="pull-right" style="margin-left:20px;">
<img src="{{URL::to('assets/images/svg-icon/logout.svg')}}" class="img-fluid" alt="apps"><span>Logout</span><i class="feather "></i>
</a> -->


<div class="survey-profilebar">
	<div class="dropdown text-right mt-4 mr-5">
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
	        <!-- <li class="media dropdown-item">
	            <a href="#" class="profile-icon"><img src="{{URL::to('assets/images/svg-icon/user.svg')}}" class="img-fluid" alt="user">My Profile</a>
	        </li>   -->                                                    
	        <li class="media dropdown-item">
	            <a href="{{route('session.logout')}}" class="profile-icon"><img src="{{URL::to('assets/images/svg-icon/logout.svg')}}" class="img-fluid" alt="logout">Logout</a>
	        </li>
	    </ul>
	  </div>
	</div>
</div>

<div class="formify_box formify_box_checkbox background-white">

<br>
<div class="tab-content" id="myTabContent">

@if($Surveys->count()>0)


<h6><b>Start following any survey</b></h6>


@csrf
 
<div class="box_info">


<div class="container">
<div class="row">
<div class="col-xs-12">

<div class="survey-radio-btns-group">


<div class="formify_box formify_box_checkbox background-white">







      
                    
                                <div class="button-list">
								
								@foreach($Surveys as $key=>$value)
								
                                  
                                    <a href="{{URL('user/survey/start/'.Crypt::encryptString($value->id))}}">
									
									
									<button type="button" class="btn btn-rounded btn-outline-danger">{{$value->title}}</button>
									
									</a>
                                   
									
									
									@endforeach
									
                                </div>
                        

 


  </div> 
 

 
</div>
<hr/> 
</div>




</div>



@else
	<p>Please create survey.</p>
@endif

</div>

</div>

<ul class="nav nav-tabs form_tab" id="myTab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="One-tab" data-toggle="tab" href="#One" role="tab"
aria-controls="One" aria-selected="true"></a>
</li>
<li class="nav-item">
<a class="nav-link" id="Two-tab" data-toggle="tab" href="#Two" role="tab"
aria-controls="Two" aria-selected="false"></a>
</li>
<li class="nav-item">
<a class="nav-link" id="Three-tab" data-toggle="tab" href="#Three" role="tab"
aria-controls="Three" aria-selected="false"></a>
</li>
</ul>

</div>
    
   


@endsection

@push('scripts')


@endpush