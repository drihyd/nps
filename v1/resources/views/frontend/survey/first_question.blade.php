@extends('frontend.template_v1')
@section('title', 'Survey Step-1')
@section('content')




	
	
       
			
			
<div class="formify_right_fullwidth d-flex align-items-center justify-content-center">
<div class="formify_box formify_box_checkbox background-white">
<div class="formify_header">
<h4 class="form_title">f</h4>
<p>To improve your experiences, can you please help us by answering these simple questions in the survey</p>
<div class="border ml-0"></div>
</div><br>
<div class="tab-content" id="myTabContent">
<div class="tab-pane fade show active" id="One" role="tabpanel" aria-labelledby="One-tab">

<h6><b>How likely are you to reccomend Omni Hospitals to your friend?</b></h6>
<form action="#" class="signup_form">
<div class="box_info">
<input type="range" list="tickmarks">

<datalist id="tickmarks">
<option value="0" label="0"></option>
<option value="10" label="1"></option>
<option value="20" label="2"></option>
<option value="30" label="3"></option>
<option value="40" label="4"></option>
<option value="50" label="5"></option>
<option value="60" label="6"></option>
<option value="70" label="7"></option>
<option value="80" label="8"></option>
<option value="90" label="9"></option>
<option value="100" label="10"></option>
</datalist>
</div>
</form>
<a href="{{URL('survey/')}}"><button class="btn thm_btn next_tab text-transform-inherit">Next</button></a>
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
</div>
    
   


@endsection

@push('scripts')


@endpush