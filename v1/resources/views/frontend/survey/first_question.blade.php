@extends('frontend.template_v1')
@section('title', 'Survey Step-1')
@section('content')




	
	
       
			
			
<div class=" justify-content-center">



@include('frontend.common_pages.nav')

<div class="formify_box formify_box_checkbox background-white">
@include('frontend.common_pages.survey_description')
<br>
<div class="tab-content" id="myTabContent">

@if($Questions->count()>0)

<form action="{{ route('surveyone.post') }}" class="signup_form" method="post">

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
	
	@foreach($Questions[0]->qoptions as $key=>$value)
	<input type="radio" name="first_questin_range" class="btn btn-scale btn-scale-asc-2" value="{{$value->qoptionid}}">{{$value->qpvalue}}
	@endforeach


@elseif($Questions[0]->qinput_type=="checkbox")

<div class="row">

@foreach($Questions[0]->qoptions as $key=>$value)
<div class="col-md-12">
<input required type="checkbox" name="first_questin_range[]" class="btn btn-scale btn-scale-asc-2" value="{{$value->qoptionid}}">{{$value->qpvalue}}
</div>
@endforeach

</div>

@elseif($Questions[0]->qinput_type=="dropdown")

	@foreach($Questions[0]->qoptions as $key=>$value)
	<input required type="radio" name="first_questin_range" class="btn btn-scale btn-scale-asc-2" value="{{$value->qoptionid}}">{{$value->qpvalue}}
	@endforeach

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
	
	

@else		  
@endif	
</div></div>



<button type="submit" class="btn thm_btn next_tab text-transform-inherit mt-5">Next</button>

</div>



<input type="hidden" name="organization_id" value="{{$Questions[0]->qorgid??0}}"/>
<input type="hidden" name="question_id" value="{{$Questions[0]->qid??0}}"/>
<input type="hidden" name="survey_id" value="{{$Questions[0]->qsurvey_id??0}}"/>

</form>
@else
	
<div class="row">
<div class="col-md-12 text-center">
	<h4 class="text text-success">Thank you for completing our survey!</h4>
	
	<a href="{{url('user/responses')}}" class="btn btn-success  mt-3">Go to Survey users</a>
	</div>
</div>
@endif

</div>

</div>

<!-- <ul class="nav nav-tabs form_tab" id="myTab" role="tablist">
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
</ul> -->

</div>
    
   


@endsection

@push('scripts')


@endpush