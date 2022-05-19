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

<div class="container pl-sm-0 pt-sm-5">




<div class="survey-radio-btns-group">


@if($Questions[0]->qinput_type=="radio")
	


<div class="box_info">
    <img src="{{env('APP_URL')}}/assets/icons/sad.svg" alt="manage smile" class="slider_smile text-center pb-3">
<input type="range" list="tickmarks" min="0" max="10" name="first_questin_range" value="" class="slider" id="myRange">
<input type="hidden"  name="is_pick_slider" value="1">
<datalist id="tickmarks">
@foreach($Questions[0]->qoptions as $key=>$value)
<option value="{{$value->qoptionid}}" label="{{$value->qpvalue}}"></option>
<!--<input type="radio" name="first_questin_range" class="btn btn-scale btn-scale-asc-2" value="{{$value->qoptionid}}">{{$value->qpvalue}}-->
@endforeach
</datalist>
 <div class="smiley-emojis">
     <!-- <ul class="list-inline">
         
         <li><img src="{{env('APP_URL')}}/assets/icons/sad.svg" class="img-fluid sad-img" style="width:45px"></li>
         <li><img src="{{env('APP_URL')}}/assets/icons/moderate.svg" class="img-fluid neutral-img" style="width:45px"></li>
         <li><img src="{{env('APP_URL')}}/assets/icons/happy.svg" class="img-fluid happy-img" style="width:45px"></li>
     </ul> -->
 </div>
</div>

@else		  
@endif	
</div>





<button type="submit" class="btn thm_btn next_tab text-transform-inherit mt-5"><i class="fa fa-microphone"></i> Record Feedback</button>









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

<script type="text/javascript">
    var slider = document.getElementById("myRange");
var output = $('.slider_smile');
//range slider
slider.oninput = function(){
    if(this.value == 0){
        output.attr('src','{{env("APP_URL")}}/assets/icons/sad.svg');
        output.css('left', '0%');
    }
    else if(this.value == 1){
        output.attr('src','{{env("APP_URL")}}/assets/icons/sad.svg');
        output.css('left', '7%');
    } else if(this.value == 2){
        output.attr('src','{{env("APP_URL")}}/assets/icons/sad.svg'); 
        output.css('left', '17%');

    } else if(this.value == 3){
        output.attr('src','{{env("APP_URL")}}/assets/icons/sad.svg'); 
        output.css('left', '27%');

    } else if(this.value == 4){
        output.attr('src','{{env("APP_URL")}}/assets/icons/sad.svg'); 
        output.css('left', '37%');

    } else if(this.value == 5){
        output.attr('src','{{env("APP_URL")}}/assets/icons/sad.svg'); 
        output.css('left', '47%');

    }
    else if(this.value == 6){
        output.attr('src','{{env("APP_URL")}}/assets/icons/sad.svg'); 
        output.css('left', '57%');

    }
    else if(this.value == 7){
        output.attr('src','{{env("APP_URL")}}/assets/icons/moderate.svg'); 
        output.css('left', '67%');

    }
    else if(this.value == 8){
        output.attr('src','{{env("APP_URL")}}/assets/icons/moderate.svg'); 
        output.css('left', '77%');

    }
    else if(this.value == 9){
        output.attr('src','{{env("APP_URL")}}/assets/icons/happy.svg'); 
        output.css('left', '87%');

    }
    else if(this.value == 10){
        output.attr('src','{{env("APP_URL")}}/assets/icons/happy.svg'); 
        output.css('left', '97%');

    }
}
</script>




@endpush