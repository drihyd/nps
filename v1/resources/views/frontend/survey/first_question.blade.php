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
<form action="{{ route('surveyone.post', [ 'id'=>1 ]) }}" class="signup_form">

@csrf
 
<div class="box_info">
<input type="range" list="tickmarks" name="first_questin_range">

<datalist id="tickmarks">
<option value="0" label="0"></option>
<option value="1" label="1"></option>
<option value="2" label="2"></option>
<option value="3" label="3"></option>
<option value="4" label="4"></option>
<option value="5" label="5"></option>
<option value="6" label="6"></option>
<option value="7" label="7"></option>
<option value="8" label="8"></option>
<option value="9" label="9"></option>
<option value="10" label="10"></option>
</datalist>
</div>

<button type="submit" class="btn thm_btn next_tab text-transform-inherit">Next</button>
</form>

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