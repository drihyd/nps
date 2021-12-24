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
	<p>To improve your experiences, can you please help us by answering these simple questions in the survey.</p>
@endif
<br>
<div class="tab-content" id="myTabContent">

@if($Questions->count()>0)

@if(auth()->user())
	@if(auth()->user()->role==2)
	<form action="{{ route('surveyone.post.'.Config::get('constants.admin')) }}" class="signup_form" method="post">
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
 
<div class="box_info">


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
</div>
 
 
 
@elseif($Questions[0]->qinput_type=="checkbox")

<div class="row">

@foreach($Questions[0]->qoptions as $key=>$value)
<div class="col-md-12">
<input required type="checkbox" name="first_questin_range[]" class="btn btn-scale btn-scale-asc-2" value="{{$value->qoptionid}}">{{$value->qpvalue}}
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





	@foreach($departments as $key=>$value)
	<div class="ml-3 mt-3">
		<label>{{str_replace("*teamname*",$value->qpvalue??'',$Questions[0]->qlabel??'')}}</label><br>
	
		<input type="hidden" name="first_questin_range"  value="{{$value->qoptionid}}">
		
		<textarea name="answerdbyperson[{{$value->qoptionid}}]" class="form form-control" required></textarea>
	</div>
	@endforeach
	
	
		<div class="ml-3 mt-3">
		<label>Any other (optional)</label><br>
	
		<input type="hidden" name="first_questin_range"  value="21">
		
		<textarea name="answerdbyperson[21]" class="form form-control"></textarea>
	</div>
	
	
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
		
	<a href="{{url(Config::get('constants.admin').'/dashboard')}}" class="btn btn-success  mt-3">Back to home</a>
	
	@else
		
	<a href="{{url(Config::get('constants.user').'/dashboard')}}" class="btn btn-success  mt-3">Back to home</a>
	
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


@endpush