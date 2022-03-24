@extends('frontend.template_v1')
@section('title', $Pagetitle)
@section('content')

<div class="formify_right_fullwidth align-items-center justify-content-center">




@include('frontend.common_pages.nav')


<div class="formify_box_checkbox background-white">
@include('frontend.common_pages.survey_description')

<div class="tab-content" id="myTabContent">








 
<div class="box_info">




    <h3>{{$Pagetitle}}</h3>   
  
    <div id="controls">
  	 <button id="recordButton" class="btn btn-outline-danger  mt-3">Start Record</button>
  	 <button id="pauseButton" disabled class="btn btn-outline-danger  mt-3">Pause</button>
  	 <button id="stopButton" disabled class="btn btn-outline-danger  mt-3">Stop</button>
    </div>
    <div id="formats">Format: start recording to see sample rate</div>
  	<p><strong>Recordings:</strong></p>
  	<ol id="recordingsList"></ol>
   
 
 
 
<div class="row">
<div class="col-md-12 text-center">
<h5 class="text text-success">Please click here to redirect your dashboard after complete voice record.</h5>

@if(auth()->user())
	@if(auth()->user()->role==2)		
	<a href="{{url(Config::get('constants.admin').'/dashboard')}}" class="btn btn-outline-danger  mt-3">Back to home</a>	
	@elseif(auth()->user()->role==3)		
	<a href="{{url(Config::get('constants.hod').'/dashboard')}}" class="btn btn-outline-danger  mt-3">Back to home</a>
	@else		
	<a href="{{url(Config::get('constants.user').'/dashboard')}}" class="btn btn-outline-danger  mt-3">Back to home</a>	
	@endif

@else

@endif


</div>
</div>
 
 
		  
      
</div>

</div>

</form>


</div>


</div> 
 

   


@endsection

@push('scripts')


<script>


var person_id_="{{Session::get('person_id')}}";
var posturl_voicefile="{{route('post.voice.message.file')}}";
</script>


<script src="{{URL::to('assets/js/voice_js/recorder.js')}}"></script>
<script src="{{URL::to('assets/js/voice_js/app.js')}}"></script>






@endpush