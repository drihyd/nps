@extends('frontend.template_v1')
@section('title', $Pagetitle)
@section('content')

<div class="formify_right_fullwidth align-items-center justify-content-center">

<!-- <a href="{{route('session.logout')}}" class="pull-right" style="margin-left:20px;">
<img src="{{URL::to('assets/images/svg-icon/logout.svg')}}" class="img-fluid" alt="apps"><span>Logout</span><i class="feather "></i>
</a> -->




@include('frontend.common_pages.nav')


<div class="formify_box_checkbox background-white">
@include('frontend.common_pages.survey_description')

<div class="tab-content" id="myTabContent">








 
<div class="box_info">




    <h3>{{$Pagetitle}}</h3>   
  
    <div id="controls">
  	 <button id="recordButton" class="btn btn-outline-danger  mt-3">Record</button>
  	 <button id="pauseButton" disabled class="btn btn-outline-danger  mt-3">Pause</button>
  	 <button id="stopButton" disabled class="btn btn-outline-danger  mt-3">Stop</button>
    </div>
    <div id="formats">Format: start recording to see sample rate</div>
  	<p><strong>Recordings:</strong></p>
  	<ol id="recordingsList"></ol>
   
 
		  
      
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