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
<div class="formify_header">
<h4 class="form_title"></h4>
<p>To improve your experiences, can you please help us by answering these simple questions in the survey</p>
<div class="border ml-0"></div>
</div><br>
<div class="tab-content" id="myTabContent">


@if($Questions->count()>0)

<form action="{{ route('surveyone.post') }}" class="signup_form" method="post">

<h6><b>{{$Questions[0]->qlabel??''}}</b></h6>


@csrf
 
<div class="box_info">


<div class="container">
<div class="row">
<div class="col-xs-12">
<p class="page-header">{{$Questions[0]->qsublabel??''}}</p>
<div class="survey-radio-btns-group">


@if($Questions[0]->qinput_type=="radio")
	
@foreach($Questions[0]->qoptions as $key=>$value)
<input type="radio" name="first_questin_range" class="btn btn-scale btn-scale-asc-2" value="{{$value->qoptionid}}">{{$value->qpvalue}}
@endforeach
@elseif($Questions[0]->qinput_type=="dropdown")
@foreach($Questions[0]->qoptions as $key=>$value)
<input type="radio" name="first_questin_range" class="btn btn-scale btn-scale-asc-2" value="{{$value->qoptionid}}">{{$value->qpvalue}}
@endforeach
@elseif($Questions[0]->qinput_type=="textarea")	
@foreach($Questions[0]->qoptions as $key=>$value)
<label>{{$value->qpvalue}}</label>
<textarea name="first_questin_range" class="btn btn-scale btn-scale-asc-2" value="{{$value->qoptionid}}"></textarea>
@endforeach

@else		  
@endif	
</div>
<hr/> 
</div>




</div>

<button type="submit" class="btn thm_btn next_tab text-transform-inherit">Next</button>


<input type="hidden" name="organization_id" value="{{$Questions[0]->qorgid??0}}"/>
<input type="hidden" name="question_id" value="{{$Questions[0]->qid??0}}"/>
<input type="hidden" name="survey_id" value="{{$Questions[0]->qsurvey_id??0}}"/>
</form>
@else
	<p>Questions are not mapped to this survey. Please contact to support team.</p>
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