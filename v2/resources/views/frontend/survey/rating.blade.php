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
<form action="{{ route('takerating') }}" class="signup_form" method="post">
@else
<form action="{{ route('offline.surveyone.post') }}" class="signup_form" method="post">
@endif



@csrf
 
<div class="box_info">
<p class="page-header">{{str_replace("*companyname*",Session::get('comapny_name'),$Questions[0]->qlabel??'')}}</p>

<div class="container pl-sm-0">




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
         <li><img src="{{env('APP_URL')}}/assets/icons/sad.svg" class="img-fluid sad-img" style="width:45px"></li>
         <li><img src="{{env('APP_URL')}}/assets/icons/moderate.svg" class="img-fluid neutral-img" style="width:45px"></li>
         <li><img src="{{env('APP_URL')}}/assets/icons/happy.svg" class="img-fluid happy-img" style="width:45px"></li>
     </ul>
 </div>
</div>

@else		  
@endif	
</div>





<button type="submit" class="btn thm_btn next_tab text-transform-inherit mt-5"><i class="fa fa-microphone"></i>Take Voice Conversation</button>









<input type="hidden"  name="is_pick_slider" value="1">
<input type="hidden" name="organization_id" value="{{$Questions[0]->qorgid??0}}"/>
<input type="hidden" name="question_id" value="{{$Questions[0]->qid??0}}"/>
<input type="hidden" name="survey_id" value="{{Session::get('survey_id')??0,}}"/>

</form>
@else
	

@endif

</div>

</div>


</div>
    
   


@endsection

@push('scripts')






@endpush