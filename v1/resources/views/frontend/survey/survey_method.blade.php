@extends('frontend.template_v1')
@section('title', 'Survey Step-1')
@section('content')




	
	
       
			
			
<div class="justify-content-center">




@include('frontend.common_pages.nav')
	


<div class="formify_box formify_box_checkbox background-white">
@include('frontend.common_pages.survey_description')
<br>
<div class="tab-content" id="myTabContent">



@if($Surveys->count()>0)





@csrf
 
<div class="box_info">


<div class="container">
<div class="row">
<div class="col-xs-12">

<div class="">


<div class="background-white">
                    
    <div class="button-list">
        <a href="{{URL('user/takesurvey/'.Crypt::encryptString($Surveys[0]->id))}}">
		<button type="button" class="btn btn-rounded btn-outline-danger">Manual Survey</button>
		</a>
    </div>
  </div> 
</div>
</div>




</div>



@else
	<p>Please create survey.</p>
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