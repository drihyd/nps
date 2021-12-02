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

<h6><b>{{$Questions[0]->label??''}}</b></h6>


@csrf
 
<div class="box_info">


<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <p class="page-header">{{$Questions[0]->sublabel??''}}</p>
     
        <input type="radio" name="first_questin_range" class="btn btn-scale btn-scale-asc-1"  value=1>1
        <input type="radio" name="first_questin_range" class="btn btn-scale btn-scale-asc-2"   value=2>2
        <input type="radio" name="first_questin_range" class="btn btn-scale btn-scale-asc-3"  value=3>3
        <input type="radio" name="first_questin_range" class="btn btn-scale btn-scale-asc-4"  value=4>4
        <input type="radio" name="first_questin_range" class="btn btn-scale btn-scale-asc-5" value=5>5
        <input type="radio" name="first_questin_range" class="btn btn-scale btn-scale-asc-6" value=6>6
        <input type="radio" name="first_questin_range" class="btn btn-scale btn-scale-asc-7"  value=7>7
        <input type="radio" name="first_questin_range" class="btn btn-scale btn-scale-asc-8"  value=8>8
        <input type="radio" name="first_questin_range" class="btn btn-scale btn-scale-asc-9"  value=9>9
        <input type="radio" name="first_questin_range" class="btn btn-scale btn-scale-asc-10" value=10>10
        <hr/>


 
  </div>




</div>

<button type="submit" class="btn thm_btn next_tab text-transform-inherit">Next</button>
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