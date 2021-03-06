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


@if(auth()->user())
@include('frontend.common_pages.survey_description')
@else
	
@endif
<br>
<div class="tab-content" id="myTabContent">

@if($Questions->count()>0)

@if(auth()->user())
	
	@if(auth()->user()->role==2)
	<form action="{{ route('surveyone.post.'.Config::get('constants.admin')) }}" class="signup_form" method="post">
	@elseif(auth()->user()->role==3)
	<form action="{{ route('surveyone.post.'.Config::get('constants.hod')) }}" class="signup_form" method="post">
	@elseif(auth()->user()->role==5)
	<form action="{{ route('surveyone.post.'.Config::get('constants.operantionalhead')) }}" class="signup_form" method="post">
	@else
	<form action="{{ route('surveyone.post.'.Config::get('constants.user')) }}" class="signup_form" method="post">
	@endif
@else
<form action="{{ route('offline.surveyone.post') }}" class="signup_form" method="post">
@endif

@php
$departments=$departments??'';

@endphp

@if($departments)
<h6><b>



</b></h6>


@else
	
{{$Questions[0]->qlabel??''}}

@endif




@csrf
 
<div class="box_info ml-3 mt-3">


<div class="container pl-sm-0">
<div class="">
<div class="">

<p class="page-header">{{str_replace("*companyname*",Session::get('comapny_name'),$Questions[0]->qsublabel??'')}}</p>
<div class="survey-radio-btns-group">


@if($Questions[0]->qinput_type=="radio")
	


<div class="box_info">
<input type="range" list="tickmarks" min="0" max="10" name="first_questin_range">
<input type="hidden"  name="is_pick_slider" value="1">
<datalist id="tickmarks">
@foreach($Questions[0]->qoptions as $key=>$value)
<option value="{{$value->qoptionid}}" label="{{$value->qpvalue}}"></option>
<!--<input type="radio" name="first_questin_range" class="btn btn-scale btn-scale-asc-2" value="{{$value->qoptionid}}">{{$value->qpvalue}}-->
@endforeach
</datalist>
 <div class="smiley-emojis">
     <ul class="list-inline">
         <!--<li>&#128528;</li>-->
         <!--<li>&#128516;</li>-->
         <!--<li>&#128512;</li>-->
         <li><img src="https://deepredink.in/demos/nps/v1/assets/img/smileys/sad.jpeg" class="img-fluid sad-img"></li>
         <li><img src="https://deepredink.in/demos/nps/v1/assets/img/smileys/neutral.jpeg" class="img-fluid neutral-img"></li>
         <li><img src="https://deepredink.in/demos/nps/v1/assets/img/smileys/happy.jpeg" class="img-fluid happy-img"></li>
     </ul>
 </div>
</div>
 
 
@elseif($Questions[0]->qinput_type=="checkbox")

<div class="row">

@foreach($Questions[0]->qoptions as $key=>$value)
<div class="col-md-12">
<input required id="departments" type="checkbox" name="first_questin_range[]" class="btn btn-scale btn-scale-asc-2" value="{{$value->qoptionid}}">{{$value->qpvalue}}
</div>
@endforeach

</div>
<input type="hidden"  name="is_pick_slider" value="0">
@elseif($Questions[0]->qinput_type=="dropdown")

	@foreach($Questions[0]->qoptions as $key=>$value)
	<input required type="radio" name="first_questin_range" class="btn btn-scale btn-scale-asc-2" value="{{$value->qoptionid}}">{{$value->qpvalue}}
	@endforeach
<input type="hidden"  name="is_pick_slider" value="0">
@elseif($Questions[0]->qinput_type=="textarea")	




<!--- Display Activity -->

@php

if($departments){
	
	$departments=$departments;
	
}
else{
	$departments=[];
}

@endphp

	@foreach($departments as $key=>$value)
	<div>
	
	
	@if($value->qoptionid==21 || $value->qoptionid==154)		
	{{$value->qpvalue??''}}	(Optional)	
	@else
		<label >{{str_replace("*teamname*",$value->qpvalue??'',$Questions[0]->qlabel??'')}}</label>	
	@endif
		
		

		
		@foreach($value->activities as $akey=>$avalue)
<div class="mt-3">
<input   id="option_checkboxes" type="checkbox" name="first_activities[{{$avalue->activityid??''}}]" class="btn btn-scale btn-scale-asc-2" value="{{$avalue->activity_name}}">{{$avalue->activity_name}}
</div>
@endforeach


@if(isset($value->activities) && $value->activities->count()>0)
	<div class="mt-3">
<input  type="checkbox" id="option_checkboxes" name="first_activities[{{$avalue->activityid??''}}]" class="btn btn-scale btn-scale-asc-2" value="Any Other">Any Other
</div>	

@endif
		
	
		<input type="hidden" name="first_questin_range"  value="{{$value->qoptionid}}">


	@if($value->qoptionid==21 || $value->qoptionid==154)		
	<textarea name="answerdbyperson[{{$value->qoptionid}}]" class="form form-control" id="answerdbyperson_checkboxes"></textarea>	


<a href="{{route('take.voice.messaage')}}" >
Take Voice Conversation:

  <button type="button" class="btn btn-warning btn-sm mb-2 mt-4 ml-2">  
  <i class="fa fa-microphone"></i>  
  </button>
 </a>

	@else
		<textarea required name="answerdbyperson[{{$value->qoptionid}}]" class="form form-control" id="answerdbyperson_checkboxes" @if(isset($value->activities) && $value->activities->count()>0)  @else required @endif></textarea>
	@endif
		
		
	
	
	</div>
	@endforeach
	
	<!--
		<div class="mt-3">
		<label>Any other (optional)</label><br>
	
		<input type="hidden" name="first_questin_range"  value="21">
		
		<textarea name="answerdbyperson[21]" class="form form-control"></textarea>
	</div>
	-->
	
	
<input type="hidden"  name="is_pick_slider" value="0">
@else		  
@endif	
</div></div>



<button type="submit" class="btn thm_btn next_tab text-transform-inherit mt-5">Next</button>







</div>



<input type="hidden" name="organization_id" value="{{$Questions[0]->qorgid??0}}"/>
<input type="hidden" name="question_id" value="{{$Questions[0]->qid??0}}"/>
<input type="hidden" name="survey_id" value="{{Session::get('survey_id')??0,}}"/>

</form>
@else
	
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
@endif

</div>

</div>


</div>
    
   


@endsection

@push('scripts')



<script type="text/javascript">




	$(document).ready(function(){
    $('#option_checkboxes').change(function(){
		
		
        if($(this).prop('checked') === true){			
			$('#answerdbyperson_checkboxes').attr('required', true);	

        }else{			
			$('#answerdbyperson_checkboxes').attr('required', false); 			
            
        }
    });
});
	
	



</script>




@endpush