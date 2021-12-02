@extends('frontend.template_v1')
@section('title', 'Survey Step-1')
@section('content')




	
	
       
			
			
<div class="formify_right_fullwidth d-flex align-items-center justify-content-center">
<div class="formify_box formify_box_checkbox background-white">
<div class="formify_header">
<h4 class="form_title"></h4>
<p>To improve your experiences, can you please help us by answering these simple questions in the survey</p>
<div class="border ml-0"></div>
</div><br>
<div class="tab-content" id="myTabContent">


@if($Questions->count()>0)

<form action="{{ route('surveyone.post', [ 'id'=>1 ]) }}" class="signup_form" method="post">

<h6><b>{{$Questions[0]->qlabel??''}}</b></h6>


@csrf
 
<div class="box_info">


<div class="container">
<div class="row">
<div class="col-xs-12">
<p class="page-header">{{$Questions[0]->qsublabel??''}}</p>
@if($Questions[0]->qinput_type=="radio")	  
@foreach($Questions[0]->qoptions as $key=>$value)
<input type="radio" name="first_questin_range" class="btn btn-scale btn-scale-asc-2" value="{{$value->qoptionid}}">{{$value->qpvalue}}
@endforeach
@else		  
@endif	
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